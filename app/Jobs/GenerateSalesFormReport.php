<?php

namespace App\Jobs;

use App\Models\Application;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class GenerateSalesFormReport implements ShouldQueue
{
    use Queueable;

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            Log::info('GenerateSalesFormReport job started.');

            $directory = storage_path('app/reports');

            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }

            $date = now()->format('Y-m-d-H-i-s');

            $filePath = storage_path("app/reports/sales-form-report-{$date}.csv");

            $writer = SimpleExcelWriter::create($filePath)->addHeader([
                'Application Number',
                'Product',
                'Loan Amount',
                'ROI',
                'Customer Name',
                'Branch',
                'Status',
                'Date Of Login'
            ]);

            Application::query()
                ->with(['product', 'customer', 'branch'])
                ->orderBy('created_at', 'desc')
                ->lazy(5000)
                ->each(function ($application) use ($writer) {
                    $writer->addRow([
                        'Application Number' => $application->application_number,
                        'Product' => $application->product->name ?? 'N/A',
                        'Loan Amount' => $application->loan_amount,
                        'ROI' => $application->roi,
                        'Customer Name' => $application->customer->full_name ?? 'N/A',
                        'Branch' => $application->branch->name ?? 'N/A',
                        'Status' => $application->status,
                        'Date Of Login' => $application->created_at->format('Y-m-d H:i:s'),
                    ]);
                });

            $writer->close();

            // We will send this report via email to concerned stakeholders

            Log::info('Sales form report generated successfully at ' . $filePath);
        } catch (\Exception $e) {
            Log::error('Error generating sales form report: ' . $e->getMessage());

            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    }
}

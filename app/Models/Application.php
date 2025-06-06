<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'applications';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'application_number',
        'product_id',
        'branch_id',
        'loan_amount',
        'roi',
        'sales_person_id',
        'created_by',
        'updated_by',
        'other_data',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'id' => 'string',
        'application_number' => 'string',
        'product_id' => 'string',
        'branch_id' => 'string',
        'loan_amount' => 'float',
        'roi' => 'float',
        'sales_person_id' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'other_data' => 'array',
        'status' => 'string',
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'application_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(MasterProduct::class, 'product_id', 'id');
    }

    public function branch()
    {
        return $this->belongsTo(MasterBranch::class, 'branch_id', 'id');
    }
}

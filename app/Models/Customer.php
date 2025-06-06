<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MasterCustomerType;

class Customer extends Model
{
    protected $table = 'customers';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'customer_type_id',
        'application_id',
        'firt_name',
        'last_name',
        'email',
        'mobile',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'id' => 'string',
        'customer_type_id' => 'integer',
        'application_id' => 'string',
        'firt_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'mobile' => 'string',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id', 'id');
    }

    public function customerType()
    {
        return $this->belongsTo(MasterCustomerType::class, 'customer_type_id', 'id');
    }

    public function getFullNameAttribute()
    {
        return trim("{$this->firt_name} {$this->last_name}");
    }
}

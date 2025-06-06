<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterCustomerType extends Model
{
    protected $table = 'master_customer_types';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'slug',
        'name',
        'is_active',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'id' => 'string',
        'slug' => 'string',
        'name' => 'string',
        'is_active' => 'boolean',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterProduct extends Model
{
    protected $table = 'master_products';

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

    const HOME_LOAN = '29f0ab62-cb6b-4c8b-be48-0a80eb32f8d3';
    const LAP_HFC = 'a473eb41-809f-421c-8b1f-25eef56f8073';
    const VEHICLE_LOAN = '7688371b-37f4-4b6e-9d6d-76e5e8a2a977';
    const LAP_FINSERVE = '597d1a28-1c00-43e8-9a5c-d18bdf4abaed';
}

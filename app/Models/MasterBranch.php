<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterBranch extends Model
{
    protected $table = 'master_branches';

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

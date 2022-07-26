<?php

namespace App\Models;

use App\Traits\Models\UnixTimestamps;
use App\Traits\Models\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, UuidTrait, UnixTimestamps, SoftDeletes;
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts = [
        'credential' => 'json'
    ];
}

<?php

namespace App\Models;

use App\Traits\Models\UnixTimestamps;
use App\Traits\Models\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
    use HasFactory, UuidTrait, UnixTimestamps, SoftDeletes;
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts = [
        'credential' => 'json',
        'authentication' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}

<?php

namespace App\Models;

use App\Traits\Models\UnixTimestamps;
use App\Traits\Models\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mutation extends Model
{
    use HasFactory, UuidTrait, UnixTimestamps, SoftDeletes;
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];
    protected $hidden = ['date', 'deleted_at'];
    protected $casts = [
        'amount' => 'decimal:2',
        'is_manual' => 'boolean',
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}

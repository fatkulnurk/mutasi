<?php

namespace App\Traits\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

trait LogoTrait
{
    protected function logoUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (!blank($this->logo)) {
                    if (Storage::exists($this->logo)) {
                        return Storage::url($this->logo);
                    }
                }

                return asset('images/default.png');
            }
        );
    }
}
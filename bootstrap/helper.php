<?php

use Illuminate\Support\Str;

if (!function_exists('create_slug_with_random')) {
    function create_slug_with_random($string)
    {
        return str(
            str(Str::random(3) . '-' . $string)->slug()
        )->limit(125, '');
    }
}

if (!function_exists('get_iteration_number')) {
    function get_iteration_number($model, $iteration)
    {
        return ($model->currentPage() * $model->perPage()) - $model->perPage() + $iteration;
    }
}

if (!function_exists('get_client_ip_public')) {
    function get_client_ip_public(): ?string
    {
        return request()->ip();
    }
}

if (!function_exists('to_utc')) {
    function to_utc($dateTime, $toTimestamp = false, $withFlag = 'UTC')
    {
        $carbon = \Illuminate\Support\Carbon::parse($dateTime)->setTimezone('UTC');

        if ($toTimestamp) {
            return $carbon->timestamp;
        }

        return $carbon->toDateTimeString() . ' ' . $withFlag;
    }
}

if (!function_exists('to_wib')) {
    function to_wib($dateTime, $toTimestamp = false, $withFlag = 'WIB')
    {
        if (blank($dateTime)) {
            return '';
        }
        $carbon = \Illuminate\Support\Carbon::parse($dateTime)->setTimezone('Asia/Jakarta');

        if ($toTimestamp) {
            return $carbon->timestamp;
        }

        return $carbon->toDateTimeString() . ' ' . $withFlag;
    }
}

if (!function_exists('to_rupiah')) {
    function to_rupiah($amount, $withSymbol = true)
    {
        $result = number_format($amount, 0, ',', '.');

        return $withSymbol ? 'Rp' . $result : $result;
    }
}

if (!function_exists('transaction_cc_type_to_string')) {
    function transaction_cc_type_to_string($type)
    {
        return 'Whatsapp';
    }
}

if (!function_exists('user_balance')) {
    function user_balance($userId)
    {
        $balance = \App\Models\Balance::select('balance')
            ->where('user_id', $userId)
            ->orderByDesc('created_at')
            ->first();

        return $balance->balance ?? 0;
    }
}

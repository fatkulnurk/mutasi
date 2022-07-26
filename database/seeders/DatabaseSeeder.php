<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin Ganteng',
            'email' => 'admin@dibumi.com',
            'password' => Hash::make('lang1tgelap^_^')
        ]);

        $services = [
            [
                'name' => 'Bank Central Asia',
                'description' => 'via ibank.klikbca.com',
                'credential' => [
                    "username" => "Masukan username internet banking anda",
                    "password" => "Masukan password internet banking anda"
                ],
                'code' => 'BCA'
            ],
            [
                'name' => 'OVO Robot 1',
                'description' => 'Robot crawler OVO V1',
                'credential' => [
                    "phone_number" => "masukan nomor telepon yang terdaftar pada aplikasi OVO.",
                ],
                'is_required_otp' => true,
                'code' => 'OVO'
            ],
            [
                'name' => 'OVO Robot 2',
                'description' => 'Robot crawler OVO V2',
                'credential' => [
                    "phone_number" => "masukan nomor telepon yang terdaftar pada aplikasi OVO.",
                ],
                'is_required_otp' => true,
                'code' => 'OVO_2'
            ],
            [
                'name' => 'Gopay',
                'description' => 'Robot Gopay menggunakan Aplikasi Gojek',
                'credential' => [
                    "phone_number" => "masukan nomor telepon yang terdaftar pada aplikasi Gopay."
                ],
                'is_required_otp' => true,
                'code' => 'GOPAY'
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        $packages = [
            [
                'name' => '1 Menit',
                'description' => 'Di Update setiap 1 menit',
                'fee' => 2000,
                'interval' => 60
            ],
            [
                'name' => '3 Menit',
                'description' => 'Di Update setiap 3 menit',
                'fee' => 1500,
                'interval' => 180
            ],
            [
                'name' => '5 Menit',
                'description' => 'Di Update setiap 5 menit',
                'fee' => 1000,
                'interval' => 300
            ],
            [
                'name' => '10 Menit',
                'description' => 'Di Update setiap 10 menit',
                'fee' => 500,
                'interval' => 600
            ],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}

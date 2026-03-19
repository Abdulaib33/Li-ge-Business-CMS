<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'business_name' => 'Liège Business Studio',
            'phone' => '+32 499 12 34 56',
            'email' => 'contact@liegebusinessstudio.test',
            'address' => 'Liège, Belgium',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    }
}
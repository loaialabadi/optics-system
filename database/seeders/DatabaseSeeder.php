<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        // استدعاء Seeders هنا
        $this->call([
            AdminUserSeeder::class,
        ]);
    }
}

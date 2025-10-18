<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // تعريف المستخدمين الافتراضيين لكل رول
        $users = [
            [
                'name' => 'System Admin',
                'email' => 'admin@example.com',
                'password' => '123456',
                'role' => 'admin',
            ],
            [
                'name' => 'Branch Manager',
                'email' => 'branch@example.com',
                'password' => '123456',
                'role' => 'branch',
            ],
            [
                'name' => 'Workshop Manager',
                'email' => 'workshop@example.com',
                'password' => '123456',
                'role' => 'workshop',
            ],
        ];

        foreach ($users as $user) {
            // تحقق من عدم وجود مستخدم بنفس الايميل
            if (!User::where('email', $user['email'])->exists()) {
                User::create([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => Hash::make($user['password']),
                    'role' => $user['role'],
                    'is_active' => true,
                ]);
            }
        }
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'DPMPTSP Provinsi Kepulauan Riau',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('jika12345'),
        ]);

        \App\Models\User::create([
            'name' => 'Operator',
            'email' => 'operator@gmail.com',
            'password' => bcrypt('jika12345'),
        ]);

        // Create permissions
        Permission::firstOrCreate(['name' => 'read-admin']);
        Permission::firstOrCreate(['name' => 'read-operator']);
        // Create roles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $operator = Role::firstOrCreate(['name' => 'operator']);
        // Give permission to certain role
        $admin->givePermissionTo(['read-admin']);
        $operator->givePermissionTo(['read-operator']);
        // Assign role to user
        User::find(1)->assignRole(['admin']);
        User::find(2)->assignRole(['operator']);


        $this->call([
            JenisIzinSeeder::class,
            SektorSeeder::class,
            IzinSeeder::class,
        ]);
        
    }
}

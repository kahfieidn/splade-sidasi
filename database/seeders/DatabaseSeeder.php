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
            'name' => 'Admin DPMPTSP Provinsi Kepulauan Riau',
            'email' => 'admin@kepri.pro',
            'password' => bcrypt('jika12345'),
        ]);

        \App\Models\User::create([
            'name' => 'DPMPTSP Kabupaten Bintan',
            'email' => 'bintan@kepri.pro',
            'password' => bcrypt('jika12345'),
        ]);

        \App\Models\User::create([
            'name' => 'DPMPTSP Kabupaten Kepulauan Anambas',
            'email' => 'anambas@kepri.pro',
            'password' => bcrypt('jika12345'),
        ]);

        \App\Models\User::create([
            'name' => 'DPMPTSP Kabupaten Lingga',
            'email' => 'lingga@kepri.pro',
            'password' => bcrypt('jika12345'),
        ]);

        \App\Models\User::create([
            'name' => 'DPMPTSP Kabupaten Natuna',
            'email' => 'natuna@kepri.pro',
            'password' => bcrypt('jika12345'),
        ]);

        \App\Models\User::create([
            'name' => 'DPMPTSP Kota Batam',
            'email' => 'batam@kepri.pro',
            'password' => bcrypt('jika12345'),
        ]);

        \App\Models\User::create([
            'name' => 'DPMPTSP Kota Tanjungpinang',
            'email' => 'tanjungpinang@kepri.pro',
            'password' => bcrypt('jika12345'),
        ]);

        \App\Models\User::create([
            'name' => 'DPMPTSP Provinsi Kepulauan Riau',
            'email' => 'kepri@kepri.pro',
            'password' => bcrypt('jika12345'),
        ]);

        // Create permissions
        Permission::firstOrCreate(['name' => 'read-admin']);
        Permission::firstOrCreate(['name' => 'read-operator']);
        // Create roles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $bintan = Role::firstOrCreate(['name' => 'operator']);
        $karimun = Role::firstOrCreate(['name' => 'operator']);
        $anambas = Role::firstOrCreate(['name' => 'operator']);
        $lingga = Role::firstOrCreate(['name' => 'operator']);
        $natuna = Role::firstOrCreate(['name' => 'operator']);
        $batam = Role::firstOrCreate(['name' => 'operator']);
        $tanjungpinang = Role::firstOrCreate(['name' => 'operator']);
        $kepri = Role::firstOrCreate(['name' => 'operator']);
        // Give permission to certain role
        $admin->givePermissionTo(['read-admin']);
        $bintan->givePermissionTo(['read-operator']);
        $karimun->givePermissionTo(['read-operator']);
        $anambas->givePermissionTo(['read-operator']);
        $lingga->givePermissionTo(['read-operator']);
        $natuna->givePermissionTo(['read-operator']);
        $batam->givePermissionTo(['read-operator']);
        $tanjungpinang->givePermissionTo(['read-operator']);
        $kepri->givePermissionTo(['read-operator']);
        // Assign role to user
        User::find(1)->assignRole(['admin']);
        User::find(2)->assignRole(['operator']);
        User::find(3)->assignRole(['operator']);
        User::find(4)->assignRole(['operator']);
        User::find(5)->assignRole(['operator']);
        User::find(6)->assignRole(['operator']);
        User::find(7)->assignRole(['operator']);
        User::find(8)->assignRole(['operator']);

        $this->call([
            JenisIzinSeeder::class,
            SektorSeeder::class,
            IzinSeeder::class,
        ]);
        
    }
}

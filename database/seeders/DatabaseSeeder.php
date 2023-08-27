<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Link;
use App\Models\Memeber;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Blog::factory()
        ->count(10)
        ->create();

        Link::factory()
        ->count(3)
        ->create();

        Memeber::create([
            'name' => 'Name',
            'about' => 'About',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $Admin = User::create([
            'email' => 'admin@gmail.com',
            'name' => 'Admin',
            'password' => Hash::make('1234567890'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Role::create([
            'name' => 'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Role::create([
            'name' => 'member',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Role::create([
            'name' => 'subscriber',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Role::create([
            'name' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $Admin->assignRole('admin');

        Permission::create(['name'=>'show admin panel']);
        Permission::create(['name'=>'links']);
        Permission::create(['name'=>'blogs']);
        Permission::create(['name'=>'data']);
        Permission::create(['name'=>'ban users']);
        Permission::create(['name'=>'edit permissions']);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'nik' => '007',
            'name' => 'Super Admin',
            'email' => 'info@cendekiamuda.sch.id',
            'phone' => '+6285872195295',
            'birthplace' => 'Bandung',
            'dob' => Carbon::create(2000, 6, 20),
            'education' => 'SMA/SMK',
            'tmt' => Carbon::create(2019, 11, 28),
            'unit_id' => 6,
            'password' => Hash::make('password')
        ])->assignRole('super-admin');

        $user2 = User::create([
            'nik' => '2209123',
            'name' => 'Mochamad Khosy N F',
            'email' => 'mochamad.khosy@cendekiamuda.sch.id',
            'phone' => '+6285872195295',
            'birthplace' => 'Bandung',
            'dob' => Carbon::create(2000, 6, 20),
            'education' => 'SMA/SMK',
            'tmt' => Carbon::create(2019, 11, 28),
            'unit_id' => 6,
            'password' => Hash::make('password')
        ])->assignRole('staff');
    }
}

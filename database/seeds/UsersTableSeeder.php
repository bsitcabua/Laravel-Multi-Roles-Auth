<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payload = [
            [
                'first_name'    => 'Super',
                'last_name'     => 'Admin',
                'contact_no'    => '09322996631',
                'email'         => 'admin@gmail.com',
                'password'      => Hash::make('admin'),
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'first_name'    => 'EM',
                'last_name'     => 'Cabua',
                'contact_no'    => '09322996632',
                'email'         => 'bsitcabua@gmail.com',
                'password'      => Hash::make('bsitcabua'),
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
        ];

        DB::table('users')->insert($payload);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('users')->insert([
            array(
                'ma' => generateRandomString(5),
                'ho_ten' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'phone' => '0928817228',
                'dia_chi' => 'Thái Bình',
                'hinh_anh' => '',
                'vai_tro' => 1,
                'remember_token' => 'mj3uTuIm9frFWZagAAt27eVc7pXI0b2Yox3UgnSdXJzlHO1iJ6rxhMDaDkBD',
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ]);
    }
}

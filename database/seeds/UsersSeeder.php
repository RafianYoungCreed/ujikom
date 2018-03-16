<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $adminRole = new Role();
        $adminRole->name="admin";
        $adminRole->display_name="Admin";
        $adminRole->save();

        $memberRole = new Role();
        $memberRole->name="Karyawan";
        $memberRole->display_name="Karyawan";
        $memberRole->save();

        $admin = new User();
        $admin->name="Admin Larapus";
        $admin->email="admin@gmail.com";
        $admin->password=bcrypt('rahasia');
        $admin->save();
        $admin->attachRole($adminRole);

        $member = new User();
        $member->name="Karyawan";
        $member->email="Karyawan@gmail.com";
        $member->password=bcrypt('rahasia');
        $member->save();
        $member->attachRole($memberRole);
	}
}

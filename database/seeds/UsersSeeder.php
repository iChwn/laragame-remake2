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
// Membuat role Super admin
        $superadminRole = new Role();
        $superadminRole->name = "super";
        $superadminRole->display_name = "Super Admin";
        $superadminRole->save();
// Membuat role admin
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin";
        $adminRole->save();
// Membuat role member
        $memberRole = new Role();
        $memberRole->name = "member";
        $memberRole->display_name = "Member";
        $memberRole->save();
// Membuat sample super admin
        $superadmin = new User();
        $superadmin->name = 'Super Admin';
        $superadmin->email = 'super@gmail.com';
        $superadmin->password = bcrypt('rahasia');
        $superadmin->is_verified = 1;
        $superadmin->save();
        $superadmin->attachRole($superadminRole);
// Membuat sample admin
        $admin = new User();
        $admin->name = 'Admin Laragame';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('rahasia');
        $admin->is_verified = 1;
        $admin->save();
        $admin->attachRole($adminRole);
// Membuat sample member
        $member = new User();
        $member->name = "Sample Member";
        $member->email = 'member@gmail.com';
        $member->password = bcrypt('rahasia');
        $member->save();
        $member->attachRole($memberRole);
    }
}

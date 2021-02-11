<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $depotRole = Role::where('name', 'depot')->first();
        $reglementRole = Role::where('name', 'reglement')->first();

        $admin = User::create([
            'username' => 'admin' ,
            'password' => bcrypt('admin')
        ]);
        $depot = User::create([
            'username' => 'depot' ,
            'password' => bcrypt('depot')
        ]);
        $reglement = User::create([
            'username' => 'reglement' ,
            'password' => bcrypt('reglement')
        ]);

        $admin->roles()->attach($adminRole);
        $depot->roles()->attach($depotRole);
        $reglement->roles()->attach($reglementRole);
    }
}

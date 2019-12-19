<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        DB::table('role_user')->truncate(); 

       $admin= User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin@gmail.com')
        ]);
        $user= User::create([
            'name'=>'user',
            'email'=>'user@gmail.com',
            'password'=>bcrypt('user@gmail.com')
        ]);
        
        $auteur= User::create([
            'name'=>'auteur',
            'email'=>'auteur@gmail.com',
            'password'=>bcrypt('auteur@gmail.com')
        ]);
     
        
        //on recuper les roles
        $adminRole = Role::where('name','admin')->first();
        $auteurRole = Role::where('name','auteur')->first();
        $userRole = Role::where('name','utilisateur')->first();

        // dd($adminRole, $auteurRole,$userRole);

        //on attache les roles 
        $admin->roles()->attach($adminRole);
        $auteur->roles()->attach($auteurRole);
        $user->roles()->attach($userRole);
        
    }
}

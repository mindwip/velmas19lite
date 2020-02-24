<?php

use Illuminate\Database\Seeder;

//Models:
use App\User;

class UsersTableSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //Default Admin:
        $data = [
            'name' => 'Default', 
            'surname' => 'Manager', 
            'email' => 'manager@default.com', 
            'password' => bcrypt('12345678'),
            'isAdmin' => 1,
            'role' => 1,
            'state' => 1,
            'remember_token' => Str::random(10)
        ];
        $user = User::create($data);
    }
}

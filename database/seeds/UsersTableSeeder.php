<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
 
        $users = [
        	['huyencao', '12345678', 'caohuyeenf1997@gmail.com','1'],
            ['NguyenThiXuan', '12345678', 'nguyenxuan@gmail.com','3'],
        ];
 
        foreach ($users as $user) {
            App\Models\User::create([
                'username' => $user[0],
                'password' => $user[1],
                'email' => $user[2],
                'role' => $user[3]
            ]);
        }
 
        Schema::enableForeignKeyConstraints();
    }
}

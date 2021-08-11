<?php

namespace Database\Seeders;

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
        $data = [
            [
                'name' => 'Автор не известен',
                'email' => 'unknown@g.g',
                'password' => bcrypt(\Illuminate\Support\Str::random(16)),
            ],
            [
                'name' => 'Автор',
                'email' => 'author@g.g',
                'password' => bcrypt(123123),
            ]
        ];
        \Illuminate\Support\Facades\DB::table('users')->insert($data);
    }

}

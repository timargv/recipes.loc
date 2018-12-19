<?php

use App\User;
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
        //
        User::create([
            'name' => 'timargv',
            'email' => 'tima.rgv@mail.ru',
            'first_name' => 'Тимур',
            'last_name' => 'Рагимханов',
            'email_verified_at' => now(),
            'password' => '$2y$10$d0A1VUw1MjQpMAfqZGGmOOtdH2vGVKImA1JesK1CUqFGfpMncrTfa',
            'remember_token' => str_random(10)
        ]);
        User::create([
                'name' => 'user1',
                'email' => 'user@mail.ru',
                'first_name' => 'Вика',
                'last_name' => 'Рагимханова',
                'email_verified_at' => now(),
                'password' => '$2y$10$d0A1VUw1MjQpMAfqZGGmOOtdH2vGVKImA1JesK1CUqFGfpMncrTfa',
                'remember_token' => str_random(10)
            ]);

        DB::table('followables')->insert([
            ['user_id' => '1', 'followable_id' => '2', 'followable_type' => 'App\User', 'relation' => 'follow', 'deleted_at' => null, 'created_at' => '2018-12-17 19:08:31', 'updated_at' => null],
            ['user_id' => '1', 'followable_id' => '3', 'followable_type' => 'App\User', 'relation' => 'follow', 'deleted_at' => null, 'created_at' => '2018-12-17 19:08:31', 'updated_at' => null],
            ['user_id' => '1', 'followable_id' => '4', 'followable_type' => 'App\User', 'relation' => 'follow', 'deleted_at' => null, 'created_at' => '2018-12-17 19:08:31', 'updated_at' => null],
            ['user_id' => '2', 'followable_id' => '2', 'followable_type' => 'App\User', 'relation' => 'follow', 'deleted_at' => null, 'created_at' => '2018-12-17 19:08:31', 'updated_at' => null],
            ['user_id' => '2', 'followable_id' => '3', 'followable_type' => 'App\User', 'relation' => 'follow', 'deleted_at' => null, 'created_at' => '2018-12-17 19:08:31', 'updated_at' => null],
            ['user_id' => '2', 'followable_id' => '4', 'followable_type' => 'App\User', 'relation' => 'follow', 'deleted_at' => null, 'created_at' => '2018-12-17 19:08:31', 'updated_at' => null]
        ]);

        factory(User::class, 50)->create();
    }
}

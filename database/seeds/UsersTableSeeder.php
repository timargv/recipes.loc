<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
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
            ['user_id' => '1', 'followable_id' => '6', 'followable_type' => 'App\User', 'relation' => 'follow', 'deleted_at' => null, 'created_at' => '2018-12-17 19:08:31', 'updated_at' => null],
            ['user_id' => '1', 'followable_id' => '7', 'followable_type' => 'App\User', 'relation' => 'follow', 'deleted_at' => null, 'created_at' => '2018-12-17 19:08:31', 'updated_at' => null],
            ['user_id' => '2', 'followable_id' => '5', 'followable_type' => 'App\User', 'relation' => 'follow', 'deleted_at' => null, 'created_at' => '2018-12-17 19:08:31', 'updated_at' => null],
            ['user_id' => '2', 'followable_id' => '3', 'followable_type' => 'App\User', 'relation' => 'follow', 'deleted_at' => null, 'created_at' => '2018-12-17 19:08:31', 'updated_at' => null],
            ['user_id' => '2', 'followable_id' => '4', 'followable_type' => 'App\User', 'relation' => 'follow', 'deleted_at' => null, 'created_at' => '2018-12-17 19:08:31', 'updated_at' => null]
        ]);

        DB::table('walls')->insert([
            ['user_id' => '1', 'id' => '2', 'title' => $faker->title, 'description' => $faker->text(258), 'created_at' => '2018-12-17 19:08:31', 'updated_at' => '2018-12-20 11:45:23'],
            ['user_id' => '1', 'id' => '3', 'title' => $faker->title, 'description' => $faker->text(400), 'created_at' => '2018-12-17 19:08:32', 'updated_at' => '2018-12-20 11:45:24'],
            ['user_id' => '1', 'id' => '4', 'title' => $faker->title, 'description' => $faker->text(158), 'created_at' => '2018-12-17 19:08:33', 'updated_at' => '2018-12-20 11:45:25'],
            ['user_id' => '1', 'id' => '8', 'title' => $faker->title, 'description' => $faker->text(158), 'created_at' => '2018-12-17 19:08:34', 'updated_at' => '2018-12-20 11:45:25'],
            ['user_id' => '1', 'id' => '9', 'title' => $faker->title, 'description' => $faker->text(158), 'created_at' => '2018-12-17 19:08:35', 'updated_at' => '2018-12-20 11:45:25'],
            ['user_id' => '1', 'id' => '10', 'title' => $faker->title, 'description' => $faker->text(158), 'created_at' => '2018-12-17 19:08:36', 'updated_at' => '2018-12-20 11:45:25'],
            ['user_id' => '1', 'id' => '11', 'title' => $faker->title, 'description' => $faker->text(158), 'created_at' => '2018-12-17 19:08:37', 'updated_at' => '2018-12-20 11:45:25'],
            ['user_id' => '1', 'id' => '12', 'title' => $faker->title, 'description' => $faker->text(158), 'created_at' => '2018-12-17 19:08:38', 'updated_at' => '2018-12-20 11:45:25'],
            ['user_id' => '1', 'id' => '13', 'title' => $faker->title, 'description' => $faker->text(158), 'created_at' => '2018-12-17 19:08:39', 'updated_at' => '2018-12-20 11:45:25'],
            ['user_id' => '2', 'id' => '14', 'title' => $faker->title, 'description' => $faker->text(187), 'created_at' => '2018-12-17 19:08:40', 'updated_at' => '2018-12-20 11:45:26'],
            ['user_id' => '2', 'id' => '5', 'title' => $faker->title, 'description' => $faker->text(220), 'created_at' => '2018-12-17 19:08:41', 'updated_at' => '2018-12-20 11:45:27'],
            ['user_id' => '2', 'id' => '6', 'title' => $faker->title, 'description' => $faker->text(220), 'created_at' => '2018-12-17 19:08:42', 'updated_at' => '2018-12-20 11:45:27'],
            ['user_id' => '2', 'id' => '7', 'title' => $faker->title, 'description' => $faker->text(350), 'created_at' => '2018-12-17 19:08:43', 'updated_at' => '2018-12-20 11:45:28']
        ]);


        factory(User::class, 50)->create();
    }
}

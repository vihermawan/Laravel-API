<?php

use App\Entities\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name'     => 'Administrator',
        //     'email'    => 'admin@app.id',
        //     'password' => bcrypt('12345678'),
        // ]);

        $data = [
            ['admin','admin@gmail.com', bcrypt('12345678')],
            ['vicky','vicky@gmail.com', bcrypt('12345678')],
            ['zain','zain@gmail.com', bcrypt('12345678')],           
            ['icin','icin@gmail.com', bcrypt('12345678')],
            ['penandatangan','penandatangan@gmail.com', bcrypt('12345678')],
        ];

        for ($i=0; $i < count($data); $i++) {
            $name = $data[$i][0];
            $email = $data[$i][1];
            $password = $data[$i][2];     
            $created_at = Carbon::now();
            $updated_at = Carbon::now();

            DB::table('users')->insert([
                'name' => $name,
                'email' => $email,
                'password' => $password,     
                'created_at' => $created_at,
                'updated_at' => $updated_at,
            ]);
        }

    }
}

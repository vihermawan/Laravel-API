<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call('KategoriSeeder');

        // $this->call('UsersSeeder');
        // $this->call('KategoriSeeder');
        // $this->call('UsersRoleSeeder');
        // $this->call('PanitiaSeeder');
        // $this->call('PesertaSeeder');
        // $this->call('PenandatanganSeeder');
        $this->call('DetailEventSeeder');
        $this->call('EventSeeder');
        // $this->call('BiodataPenandatanganSeeder');
        // $this->call('PesertaEventSeeder');
        // $this->call('SertifikatSeeder');
        // $this->call('PenandatanganSertifikatSeeder');
    }
}

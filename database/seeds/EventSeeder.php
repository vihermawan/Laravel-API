<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [1,1,'UGMTalks','Universitas Gadjah Mada'],
            [3,2,'Siraman Qolbu','Universitas Gadjah Mada'],
        ];

        for ($i=0; $i < count($data); $i++) {
            $id_status = $data[$i][0];
            $id_detail_event = $data[$i][1];
            $nama_event = $data[$i][2];
            $organisasi = $data[$i][3];
            $created_at = Carbon::now();
            $updated_at = Carbon::now();

            DB::table('event')->insert([
                'id_status' => $id_status, 
                'id_detail_event' => $id_detail_event,
                'nama_event' => $nama_event,   
                'organisasi' => $organisasi, 
                'created_at' => $created_at,
                'updated_at' => $updated_at,
            ]);
        }
    }
}

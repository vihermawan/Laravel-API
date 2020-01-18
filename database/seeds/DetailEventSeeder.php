<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
class DetailEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [1,'UGMTalks merupakan event tahunan.....','Terbuka','2019-10-11','2019-10-12','07:00','15:00',100,'Auditorium Pasca Sarjana','Indoor','UGMTalks.jpg','UGMTalks.mp4'],
            [1,'Siraman Qolbu bersama ustadz......','Tertutup','2019-12-15','2019-12-15','19:30','21:00',100,'Masjid Kampus UGM','Indoor','SQ.jpg','SiramanQolbu.mp4'],
        ];

        for ($i=0; $i < count($data); $i++) {
            $id_kategori = $data[$i][0];
            $deskripsi_event = $data[$i][1];
            $audien = $data[$i][2];
            $open_registration = $data[$i][3];
            $end_registration = $data[$i][4];
            $time_start = $data[$i][5];
            $time_end = $data[$i][6];
            $limit_participant = $data[$i][7];
            $lokasi = $data[$i][8];
            $venue = $data[$i][9];
            $picture = $data[$i][10];
            $video = $data[$i][11];
            $created_at = Carbon::now();
            $updated_at = Carbon::now();

            DB::table('detail_event')->insert([
                'id_kategori' => $id_kategori,   
                'deskripsi_event' => $deskripsi_event, 
                'audien' => $audien, 
                'open_regristation' => $open_registration, 
                'end_registration' => $end_registration, 
                'time_start' => $time_start, 
                'time_end' => $time_end, 
                'limit_participant' => $limit_participant, 
                'lokasi' => $lokasi, 
                'venue' => $venue, 
                'picture' => $picture, 
                'video' => $video, 
                'created_at' => $created_at,
                'updated_at' => $updated_at,
            ]);
        }
    }
}

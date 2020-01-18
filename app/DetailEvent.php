<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class DetailEvent extends Model
{
    protected $table = 'detail_event';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id_detail_event';

    protected $fillable = [
        'id_kategori', 'deskripsi_event','audien','open_registation','end_registration','time_start',
        'time_end','limit_participant','lokasi','venue','picture','video'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function kategori(){
        return $this->belongsTo(Kategori::class,'id_kategori');
    }
    
}
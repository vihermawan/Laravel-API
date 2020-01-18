<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DetailEvent;
class Event extends Model
{
    protected $table = 'event';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id_event';

    protected $fillable = [
        'id_detail_event','id_status', 'nama_event', 'organisasi',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function infoevent()
    {
        return $this->hasOne(DetailEvent::class,'id_detail_event');
    }
    public function peserta_event(){
        return $this->hasMany(PesertaEvent::class,'id_peserta_event');
    }
}
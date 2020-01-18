<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $primaryKey='id_kategori';
    public $timestamps = false;
    protected $table = 'kategori';
    protected $fillable = ['nama_kategori'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = "petugas";
    protected $primaryKey = "id";
    protected $fillable = ["nama_petugas","no_karyawan","tanggal_lahir","kelamin"];
}

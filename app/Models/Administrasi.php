<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrasi extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    public function pasien()
    {
        return $this->belongsTo('\App\Models\Pasien');
    }
    public function dokter()
    {
        return $this->belongsTo('\App\Models\Dokter');
    }
    
    protected $dates = ['tanggal'];
    
}

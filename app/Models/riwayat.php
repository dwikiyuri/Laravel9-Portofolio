<?php

namespace App\Models;

use Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class riwayat extends Model
{
    use HasFactory;
    protected $table = "riwayat";
    protected $fillable = ['judul','tipe','tanggalmulai','tanggalakhir','info1','info2','info3','isi','still'];

    protected $appends = ['tanggalmulai_indo', 'tanggalakhir_indo'];

    public function getTanggalmulaiIndoAttribute()
    {
        return Carbon::parse($this->attributes['tanggalmulai'])->translatedFormat('d F Y');
    }

    public function getTanggalakhirIndoAttribute()
    {
        return Carbon::parse($this->attributes['tanggalakhir'])->translatedFormat('d F Y');
    }
}

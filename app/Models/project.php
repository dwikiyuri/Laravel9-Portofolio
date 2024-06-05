<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
    protected $table = "project";
    protected $fillable = ['nama_project', 'fileproject', 'link_github', 'category_id','link_demo','keterangan'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

// Menambahkan relasi one-to-many antara Category dan Article. 
// Setiap kategori dapat memiliki banyak article, sehingga kita menggunakan metode hasMany() untuk mendefinisikan relasi ini. 
// Metode articles() akan mengembalikan semua artikel yang terkait dengan kategori tertentu.

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function article(){
        return $this->hasOne(Article::class);
    }

    public function author(){
        return $this->belongsTo(Author::class);
    }
}

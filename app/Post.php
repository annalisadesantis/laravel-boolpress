<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'text', 'slug', 'author', 'category_id'];

    // collego il model di categorie
    public function category() {
        return $this->belongsTo('App\Category');
    }
}

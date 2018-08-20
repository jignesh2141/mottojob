<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title', 'slug', 'description','lang', 'meta_keywords', 'meta_description'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function getCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'category','id');
    }
}

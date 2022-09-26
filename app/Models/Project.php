<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Image;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'project_tag');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}

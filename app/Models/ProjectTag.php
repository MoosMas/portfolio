<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTag extends Model
{
    use HasFactory;
    protected $table = 'project_tag';

    public function tags()
    {
        return $this->hasOne(Tag::class, 'tag_id');
    }
}

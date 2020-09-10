<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['id', 'category'];

    protected $hidden = [];

    public function document()
    {
        return $this->hasMany(Document::class, 'category_id');
    }
}

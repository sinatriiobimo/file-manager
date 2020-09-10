<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['filename', 'description', 'slug', 'category_id', 'file'];
    protected $hidden = [];

    public function category() 
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getFileAttribute($value) {
        return url('storage/' . $value);
    }
}

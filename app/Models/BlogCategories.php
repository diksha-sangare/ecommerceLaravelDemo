<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategories extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog', 'category'
    ];
    protected $with = ['blog','category'];


     public function blog()
    {
        return $this->belongsTo(Blogs::class, 'blog');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    protected $table = 'channels';

    protected $fillable = [
        'category_id',
        'name',
        'title',
        'status',
        'image',
        'video_link',
        'video_link_type',
        'is_favorite',
        'is_popular',
        'in_slider',
        'like',
        'view',
        'created_by'
    ];


//    joining category table
    public function category(){
        return $this->belongsTo(Category::class, 'category_id','id');
    }

//    joining users table
    public function user(){
        return $this->belongsTo(User::class, 'created_by','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //    add table name here like categories
    protected $table = 'categories';

//    add all column name of this table (without id & timestamp)
    protected $fillable = [
    'name',
    'description',
    'status',
    'image',
    'created_by',
    ];

    public function channel(){
        return $this->hasMany(Channel::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'auther',
        'price',
        'quantity',
        'description',
        'category_id',
        'book_img',
        'auther_img',
    ];
}
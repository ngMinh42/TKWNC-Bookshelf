<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Định nghĩa các thuộc tính có thể gán giá trị hàng loạt (mass assignable)
    protected $fillable = [
        'title',
        'author',
        'price',
        'description',
    ];
}

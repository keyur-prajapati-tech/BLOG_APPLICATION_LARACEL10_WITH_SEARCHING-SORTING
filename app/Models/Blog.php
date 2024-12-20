<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = "blogs";

    protected $fillable = ['blog_name','blog_type','blog_shortDesc','blog_description','blog_image','blog_creator','blog_cdate'];
}

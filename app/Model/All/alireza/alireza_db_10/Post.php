<?php

namespace App\Model\All\alireza\alireza_db_10;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
protected $connection="alireza_db_10";
protected $table="posts";

    protected $fillable = ["title", "user_id"];
}

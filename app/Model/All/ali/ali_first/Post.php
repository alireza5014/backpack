<?php

namespace App\Model\All\ali\ali_first;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
protected $connection="ali_first";

    protected $fillable = ["title", "user_id"];
}

<?php

namespace App\Model\All\ali\ali_db1;

use Illuminate\Database\Eloquent\Model;

class Mohammad extends Model
{
protected $connection="ali_db1";
protected $table="mohammads";

    protected $fillable = ["title", "user_id"];
}

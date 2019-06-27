<?php

namespace App\Model\All\alireza\alireza_db2;

use Illuminate\Database\Eloquent\Model;

class Zahra extends Model
{
protected $connection="alireza_db2";
protected $table="zahras";

    protected $fillable = ["title", "user_id"];
}

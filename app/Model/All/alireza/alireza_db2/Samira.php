<?php

namespace App\Model\All\alireza\alireza_db2;

use Illuminate\Database\Eloquent\Model;

class Samira extends Model
{
protected $connection="alireza_db2";
protected $table="samiras";

    protected $fillable = ["title", "user_id"];
}

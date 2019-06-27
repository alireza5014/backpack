<?php

namespace App\Model\All\ali\ali_mamad;

use Illuminate\Database\Eloquent\Model;

class Omid extends Model
{
protected $connection="ali_mamad";
protected $table="omids";

    protected $fillable = ["title", "user_id"];
}

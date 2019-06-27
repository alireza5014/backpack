<?php

namespace App\Model\All\ali\ali_db1;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
protected $connection="ali_db1";

    protected $fillable = ["title", "user_id"];
}

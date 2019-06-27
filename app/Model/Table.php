<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
   protected $fillable=['database_id','name','type','collation','description'];

    public function database()
    {
        return $this->belongsTo(Table::class);
    }
}

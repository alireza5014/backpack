<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $fillable = ['database_id', 'table_id', 'title', 'link','method', 'method'];

    public function database()
    {
        return $this->belongsTo(Database::class);
    }


    public function table()
    {
        return $this->belongsTo(Table::class);
    }

}

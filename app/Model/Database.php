<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Database extends Model
{
    protected $fillable = ['user_id', 'host', 'name', 'charset', 'collection', 'description'];


    public function tables()
    {
        return $this->hasMany(Table::class);
    }

    public function urls()
    {
        return $this->hasMany(Url::class);
    }
}

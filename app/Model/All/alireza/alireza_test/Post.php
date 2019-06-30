<?php
        namespace App\Model\All\alireza\alireza_test;
        use Illuminate\Database\Eloquent\Model;
        
        class Post extends Model
        {
            protected $connection = "alireza_test";
            protected $table = "posts";

            protected $fillable = ["id", "title", "name"];
        }

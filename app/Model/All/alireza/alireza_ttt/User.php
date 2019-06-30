<?php
        namespace App\Model\All\alireza\alireza_ttt;
        use Illuminate\Database\Eloquent\Model;
        
        class User extends Model
        {
        protected $connection="alireza_ttt";
        protected $table="users";
        
            protected $fillable = ["id","fname","lname","email","mobile","password","address","created_at","updated_at"]; 
            
            } 
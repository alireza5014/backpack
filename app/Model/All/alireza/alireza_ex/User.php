<?php
        namespace App\Model\All\alireza\alireza_ex;
        use Illuminate\Database\Eloquent\Model;
        
        class User extends Model
        {
        protected $connection="alireza_ex";
        protected $table="users";
        
            protected $fillable = ["id:autoincrement","fname","lname","email","mobile","password","address","created_at","updated_at"]; 
            
            } 
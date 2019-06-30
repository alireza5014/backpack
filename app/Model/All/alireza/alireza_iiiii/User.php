<?php
        namespace App\Model\All\alireza\alireza_iiiii;
        use Illuminate\Database\Eloquent\Model;
        
        class User extends Model
        {
        protected $connection="alireza_iiiii";
        protected $table="users";
        
            protected $fillable = ["id:autoincrement","fname","lname","email","mobile","password","address","created_at","updated_at"]; 
            
            } 
<?php
        namespace App\Model\All\alireza\alireza_ssee;
        use Illuminate\Database\Eloquent\Model;
        
        class User extends Model
        {
        protected $connection="alireza_ssee";
        protected $table="users";
        
            protected $fillable = ["id","fname","lname","email","mobile","password","address"]; 
            
            } 
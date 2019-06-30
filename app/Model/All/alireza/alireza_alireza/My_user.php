<?php
        namespace App\Model\All\alireza\alireza_alireza;
        use Illuminate\Database\Eloquent\Model;
        
        class My_user extends Model
        {
        protected $connection="alireza_alireza";
        protected $table="my_users";
        
            protected $fillable = ["id","fname","lname","email","mobile","password","address"]; 
            
            } 
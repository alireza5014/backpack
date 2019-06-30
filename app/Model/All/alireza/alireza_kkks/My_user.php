<?php
        namespace App\Model\All\alireza\alireza_kkks;
        use Illuminate\Database\Eloquent\Model;
        
        class My_user extends Model
        {
        protected $connection="alireza_kkks";
        protected $table="my_users";
        
            protected $fillable = ["id","fname","lname","email","mobile","password","address"]; 
            
            } 
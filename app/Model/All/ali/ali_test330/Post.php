<?php
        namespace App\Model\All\ali\ali_test330;
        
        use Illuminate\Database\Eloquent\Model;
        
        class Post extends Model
        {
        protected $connection="ali_test330";
        protected $table="posts";
        
            protected $fillable = ["id","user_id","active"];
        }
        
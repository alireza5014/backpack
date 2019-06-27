<?php
        namespace App\Model\All\ali\ali_test330;
        
        use Illuminate\Database\Eloquent\Model;
        
        class Blog extends Model
        {
        protected $connection="ali_test330";
        protected $table="blogs";
        
            protected $fillable = ["id","name","body"];
        }
        
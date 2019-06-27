<?php


namespace App\classes;


class Content
{


    public $database;
    public $table;

    public function table($table)
    {
        $this->table = $table;
        return $this;
    }


    public function database($database)
    {
        $this->database = $database;
        return $this;
    }

    public function getRouteContent()
    {

        $singular_uc_table_name = Inflect::singularize(ucfirst($this->table));

     return   $api_content = '<?php
 
Route::group(["prefix" => "", "namespace" => "All\\' . getUsername() . '\\' . $this->database . '"], function () {

    Route::get("{username}/{database_name}/' . $this->table . '/list", "' . $singular_uc_table_name . 'Controller@list");
    Route::post("{username}/{database_name}/' . $this->table . '/create", "' . $singular_uc_table_name . 'Controller@create");
    Route::post("{username}/{database_name}/' . $this->table . '/modify", "' . $singular_uc_table_name . 'Controller@modify");
    Route::post("{username}/{database_name}/' . $this->table . '/delete", "' . $singular_uc_table_name . 'Controller@delete");


});


';
    }
    public  function getModelContent($columns = [])
    {
        $singular_uc_table_name = Inflect::singularize(ucfirst($this->table));

        $fillable = $this->getModelFillable($columns);
        $model_content = '<?php
        namespace App\Model\All\\' . getUsername() . "\\" . $this->database . ';
        
        use Illuminate\Database\Eloquent\Model;
        
        class ' . $singular_uc_table_name . ' extends Model
        {
        protected $connection="' . $this->database . '";
        protected $table="' . $this->table . '";
        
            protected $fillable = [' . $fillable . '];
        }
        ';


        return $model_content;
    }

    public function getControllerContent($columns = [])
    {

                $fillable = $this->getControllerFillable($columns);

        $singular_uc_table_name = Inflect::singularize(ucfirst($this->table));

     return   $controller_content = '<?php

namespace App\Http\Controllers\All\\' . getUsername() . "\\" . $this->database . ';

use App\Model\All\\' . getUsername() . "\\" . $this->database . "\\" . Inflect::singularize(ucfirst($this->table)) . ';
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class ' . $singular_uc_table_name . 'Controller extends Controller
{


   public $username;
    public $database_name;

    public function __construct(Request $request)
    {
        $this->username = $request->route()->parameter("username");;
        $this->database_name = $request->route()->parameter("database_name");;
        getConnection(0, $this->database_name);

    }
    public function list()
    {

        $code = 200;
        $error = [];
        try {
            $data = ' . $singular_uc_table_name . '::paginate(20);
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "list of ' . $singular_uc_table_name . '", $data, $error);
    }

    public function create(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = ' . $singular_uc_table_name . '::create(
                [
                    '.$fillable.'
                ]
            );
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "create  ' . $singular_uc_table_name . ' success fully", $data, $error);
    }

    public function modify(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = ' . $singular_uc_table_name . '::where("id", $request->id)->update(
                [
                         '.$fillable.'

                ]
            );
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "modify  ' . $singular_uc_table_name . ' success fully", $data, $error);
    }

    public function delete(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = ' . $singular_uc_table_name . '::where("id", $request->id)->delete();
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "modify  ' . $singular_uc_table_name . ' success fully", $data, $error);
    }
}
';
    }

    private function getModelFillable($columns)
    {
        $fillable = '"';
        for ($i = 0; $i < sizeof($columns); $i++) {
            $x = (sizeof($columns) == $i + 1) ? '"' : '","';

            $fillable .= $columns[$i] . $x;

        }

        return $fillable;
    }

    private function getControllerFillable($columns)
    {

        $fillable = '"';
        for ($i = 0; $i < sizeof($columns); $i++) {
            $x = (sizeof($columns) == $i + 1) ? '"=> $request->'.$columns[$i].'' : '"=> $request->'.$columns[$i].',"';

            $fillable .= $columns[$i] . $x;

        }

        return $fillable;
    }
}

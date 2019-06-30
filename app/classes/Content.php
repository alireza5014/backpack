<?php


namespace App\classes;


class Content
{


    public $database;
    public $table;
    public $singular_uc_table_name;
    public $singular_table_name;

    public $api_content = "";
    public $path;


    public function __construct($database, $table)
    {
        $this->table = $table;
        $this->database = $database;

        $this->singular_uc_table_name = Inflect::singularize(ucfirst($this->table));
        $this->singular_table_name = Inflect::singularize($this->table);


        $this->path = getUsername() . "/" . $this->database . "/" . $this->singular_uc_table_name;

    }


    public function getRouteContent()
    {


        return $api_content = '<?php
 
Route::group(["prefix" => "", "namespace" => "All\\' . getUsername() . '\\' . $this->database . '"], function () {

    Route::get("{username}/{database_name}/' . $this->singular_table_name . '/list", "' . $this->singular_uc_table_name . 'Controller@list");
    Route::post("{username}/{database_name}/' . $this->singular_table_name . '/create", "' . $this->singular_uc_table_name . 'Controller@create");
    Route::post("{username}/{database_name}/' . $this->singular_table_name . '/modify", "' . $this->singular_uc_table_name . 'Controller@modify");
    Route::post("{username}/{database_name}/' . $this->singular_table_name . '/delete", "' . $this->singular_uc_table_name . 'Controller@delete");


});


';
    }


    public function setRouteContent($routes, $make_file = false)
    {

        $this->api_content .= '<?php
 
        Route::group(["prefix" => "", "namespace" => "All\\' . getUsername() . '\\' . $this->database . '"], function () {';

        foreach ($routes as $route => $method) {
            $this->api_content .= 'Route::' . $method . '("{username}/{database_name}/' . $this->singular_table_name . '/' . $route . '", "' . $this->singular_uc_table_name . 'Controller@' . $route . '");  ';
            $this->api_content .= "\n";
        }

        $this->api_content .= "});";
        if ($make_file) {
            makeFile(base_path("routes/" . $this->path . ".php"), $this->api_content);
        }
        return $this->api_content;

    }

    public function setModelContent($columns = [], $make_file = false)
    {

        $fillable = $this->getModelFillable($columns);
        $model_content = '<?php
        namespace App\Model\All\\' . getUsername() . "\\" . $this->database . ';
        use Illuminate\Database\Eloquent\Model;
        
        class ' . $this->singular_uc_table_name . ' extends Model
        {
        protected $connection="' . $this->database . '";
        protected $table="' . $this->table . '";
        
            protected $fillable = [' . $fillable . ']; 
            
            } ';


        if ($make_file) {

            makeFile(app_path("Model/All/" . $this->path . ".php"), $model_content);


        }
        return $model_content;
    }

    public function setControllerContent($columns = [], $make_file = false)
    {

        $fillable = $this->getControllerFillable($columns);

        $controller_content = '<?php

namespace App\Http\Controllers\All\\' . getUsername() . "\\" . $this->database . ';

use App\Model\All\\' . getUsername() . "\\" . $this->database . "\\" . $this->singular_uc_table_name . ';
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class ' . $this->singular_uc_table_name . 'Controller extends Controller
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
            $data = ' . $this->singular_uc_table_name . '::paginate(20);
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "list of ' . $this->singular_uc_table_name . '", $data, $error);
    }

    public function create(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = ' . $this->singular_uc_table_name . '::create(
                [
                    ' . $fillable . '
                ]
            );
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "create  ' . $this->singular_uc_table_name . ' success fully", $data, $error);
    }

    public function modify(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = ' . $this->singular_uc_table_name . '::where("id", $request->id)->update(
                [
                         ' . $fillable . '

                ]
            );
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "modify  ' . $this->singular_uc_table_name . ' success fully", $data, $error);
    }

    public function delete(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = ' . $this->singular_uc_table_name . '::where("id", $request->id)->delete();
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "modify  ' . $this->singular_uc_table_name . ' success fully", $data, $error);
    }
}
';


        if ($make_file) {
            makeFile(app_path("Http/Controllers/All/" . $this->path . "Controller.php"), $controller_content);

        }

        return $controller_content;
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
            $x = (sizeof($columns) == $i + 1) ? '"=> $request->' . $columns[$i] . '' : '"=> $request->' . $columns[$i] . ',"';

            $fillable .= $columns[$i] . $x;

        }

        return $fillable;
    }
}

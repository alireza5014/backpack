<?php

namespace App\Http\Controllers\All\alireza\alireza_aaa;

use App\Model\All\alireza\alireza_aaa\Abbb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class AbbbController extends Controller
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
            $data = Abbb::paginate(20);
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "list of Abbb", $data, $error);
    }

    public function create(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = Abbb::create(
                [
                    "r"=> $request->r,"asdfads"=> $request->asdfads
                ]
            );
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "create  Abbb success fully", $data, $error);
    }

    public function modify(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = Abbb::where("id", $request->id)->update(
                [
                         "r"=> $request->r,"asdfads"=> $request->asdfads

                ]
            );
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "modify  Abbb success fully", $data, $error);
    }

    public function delete(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = Abbb::where("id", $request->id)->delete();
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "modify  Abbb success fully", $data, $error);
    }
}

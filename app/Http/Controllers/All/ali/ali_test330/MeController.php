<?php

namespace App\Http\Controllers\All\ali\ali_test330;

use App\Model\All\ali\ali_test330\Me;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class MeController extends Controller
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
            $data = Me::paginate(20);
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "list of Me", $data, $error);
    }

    public function create(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = Me::create(
                [
                    "hhh"=> $request->hhh,"name"=> $request->name
                ]
            );
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "create  Me success fully", $data, $error);
    }

    public function modify(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = Me::where("id", $request->id)->update(
                [
                         "hhh"=> $request->hhh,"name"=> $request->name

                ]
            );
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "modify  Me success fully", $data, $error);
    }

    public function delete(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = Me::where("id", $request->id)->delete();
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "modify  Me success fully", $data, $error);
    }
}

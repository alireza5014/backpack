<?php

namespace App\Http\Controllers\All\ali\ali_first;

use App\Model\All\ali\ali_first\Jhjh;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class JhjhController extends Controller
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
            $data = Jhjh::paginate(20);
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "list of Jhjh", $data, $error);
    }

    public function create(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = Jhjh::create(
                [
                    "title" => $request->title,
                    "user_id" => $request->user_id,
                ]
            );
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "create  Jhjh success fully", $data, $error);
    }

    public function modify(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = Jhjh::where("id", $request->id)->update(
                [
                    "title" => $request->title,
                    "user_id" => $request->user_id,
                ]
            );
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "modify  Jhjh success fully", $data, $error);
    }

    public function delete(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = Jhjh::where("id", $request->id)->delete();
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "modify  Jhjh success fully", $data, $error);
    }
}

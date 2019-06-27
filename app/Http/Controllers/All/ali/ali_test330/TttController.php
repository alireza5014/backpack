<?php

namespace App\Http\Controllers\All\ali\ali_test330;

use App\Model\All\ali\ali_test330\Ttt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class TttController extends Controller
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
            $data = Ttt::paginate(20);
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "list of Ttt", $data, $error);
    }

    public function create(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = Ttt::create(
                [
                    "id" => $request->id, "username" => $request->username, "password" => $request->password
                ]
            );
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "create  Ttt success fully", $data, $error);
    }

    public function modify(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = Ttt::where("id", $request->id)->update(
                [
                    "id" => $request->id,
                    "username" => $request->username,
                    "password" => $request->password

                ]
            );
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "modify  Ttt success fully", $data, $error);
    }

    public function delete(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = Ttt::where("id", $request->id)->delete();
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "modify  Ttt success fully", $data, $error);
    }
}

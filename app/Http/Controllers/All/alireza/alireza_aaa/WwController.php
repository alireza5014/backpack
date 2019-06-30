<?php

namespace App\Http\Controllers\All\alireza\alireza_aaa;

use App\Model\All\alireza\alireza_aaa\Ww;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class WwController extends Controller
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
            $data = Ww::paginate(20);
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "list of Ww", $data, $error);
    }

    public function create(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = Ww::create(
                [
                    "ii"=> $request->ii,"bb"=> $request->bb,"gg"=> $request->gg
                ]
            );
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "create  Ww success fully", $data, $error);
    }

    public function modify(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = Ww::where("id", $request->id)->update(
                [
                         "ii"=> $request->ii,"bb"=> $request->bb,"gg"=> $request->gg

                ]
            );
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "modify  Ww success fully", $data, $error);
    }

    public function delete(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = Ww::where("id", $request->id)->delete();
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "modify  Ww success fully", $data, $error);
    }
}

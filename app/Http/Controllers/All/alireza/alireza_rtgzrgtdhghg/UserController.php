<?php

namespace App\Http\Controllers\All\alireza\alireza_rtgzrgtdhghg;

use App\Model\All\alireza\alireza_rtgzrgtdhghg\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class UserController extends Controller
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
            $data = User::paginate(20);
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "list of User", $data, $error);
    }

    public function create(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = User::create(
                [
                    "fname"=> $request->fname,"lname"=> $request->lname,"email"=> $request->email,"mobile"=> $request->mobile,"password"=> $request->password,"address"=> $request->address,"created_at"=> $request->created_at,"updated_at"=> $request->updated_at
                ]
            );
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "create  User success fully", $data, $error);
    }

    public function modify(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = User::where("id", $request->id)->update(
                [
                         "fname"=> $request->fname,"lname"=> $request->lname,"email"=> $request->email,"mobile"=> $request->mobile,"password"=> $request->password,"address"=> $request->address,"created_at"=> $request->created_at,"updated_at"=> $request->updated_at

                ]
            );
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "modify  User success fully", $data, $error);
    }

    public function delete(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = User::where("id", $request->id)->delete();
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "modify  User success fully", $data, $error);
    }
}

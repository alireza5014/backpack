<?php

namespace App\Http\Controllers\All\alireza\alireza_ttts;

use App\Model\All\alireza\alireza_ttts\My_user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class My_userController extends Controller
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
            $data = My_user::paginate(20);
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "list of My_user", $data, $error);
    }

    public function create(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = My_user::create(
                [
                    "id"=> $request->id,"fname"=> $request->fname,"lname"=> $request->lname,"email"=> $request->email,"mobile"=> $request->mobile,"password"=> $request->password,"address"=> $request->address
                ]
            );
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "create  My_user success fully", $data, $error);
    }

    public function modify(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = My_user::where("id", $request->id)->update(
                [
                         "id"=> $request->id,"fname"=> $request->fname,"lname"=> $request->lname,"email"=> $request->email,"mobile"=> $request->mobile,"password"=> $request->password,"address"=> $request->address

                ]
            );
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "modify  My_user success fully", $data, $error);
    }

    public function delete(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = My_user::where("id", $request->id)->delete();
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "modify  My_user success fully", $data, $error);
    }
}

<?php

namespace App\Http\Controllers\All\alireza\alireza_yard\Zahra;

use App\Model\All\alireza\alireza_yard\Zahra\Zahra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class ZahraController extends Controller
{
    public function list()
    {

        $code = 200;
        $error = [];
        try {
            $data = Zahra::paginate(20);
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "list of Zahra", $data, $error);
    }

    public function create(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = Zahra::create(
                [
                    "title" => $request->title,
                    "user_id" => $request->user_id,
                ]
            );
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "create  Zahra success fully", $data, $error);
    }

    public function modify(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = Zahra::where("id", $request->id)->update(
                [
                    "title" => $request->title,
                    "user_id" => $request->user_id,
                ]
            );
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "modify  Zahra success fully", $data, $error);
    }

    public function delete(Request $request)
    {

        $code = 200;
        $error = [];
        try {
            $data = Zahra::where("id", $request->id)->delete();
        } catch (Exception $exception) {
            $code = 400;
            $error = $exception->getMessage();
        }
        return app_response($code, "modify  Zahra success fully", $data, $error);
    }
}

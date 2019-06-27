<?php

namespace App\Http\Controllers\User;

use App\Model\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class ProjectController extends Controller
{
    public function list(Request $request)
    {
        $data = Project::paginate(20);

        return web_response($request, 'user.project', $data);
    }


    public function info(Request $request)
    {
        $data = Project::paginate(20);
        return web_response($request, 'user.project', $data);
    }

    public function create(Request $request)
    {
     try{
         Project::create([
             'user_id'=>getUserId(),
             'title'=>$request->title,
             'description'=>$request->description,
         ]);
     }
     catch (Exception $exception){
         return   makeException($exception, __FILE__, __FUNCTION__, __LINE__);

     }

        return back()->with('success', "پروژه با موفقیت ثبت شد");

    }
    public function modify(Request $request)
    {
        try{
            Project::where('id',$request->id)
                ->where('user_id',getUserId())
                ->update([
                'title'=>$request->title,
                'description'=>$request->description,
            ]);
        }
        catch (Exception $exception){
            return   makeException($exception, __FILE__, __FUNCTION__, __LINE__);

        }

        return back()->with('success', "پروژه با موفقیت ویرایش شد");

    }
}

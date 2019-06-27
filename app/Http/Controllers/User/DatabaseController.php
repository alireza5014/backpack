<?php

namespace App\Http\Controllers\User;

use App\Model\Database;
use App\Model\Table;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Mockery\Exception;

class DatabaseController extends Controller
{
    public function list(Request $request)
    {


         //  return DB::select('describe users');

        $data = Database::where('user_id', getUserId())->paginate(20);

        return web_response($request, 'user.database', $data);
    }


    public function create(Request $request, Table $table)
    {
        try {
            $db_name = auth('user')->user()->username . "_" . $request->name;
            $db = Database::create(
                [
                    'user_id' => getUserId(),
                    'name' => $db_name,
                    'collection' => $request->collection,
                    'charset' => $request->charset,
                    'description' => $request->description,]);

            $table->name = 'users';
            $table->collation = $request->collection;
            $table->type = 'InnoDB';
            $db->tables()->save($table);


            Artisan::call('mysql:create_db', ['name' => $db_name, 'charset' => $request->charset, 'collation' => $request->collection]);

            Schema::connection(getConnection($db->id))->create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('fname');
                $table->string('lname');
                $table->string('email')->unique();
                $table->string('password');
                $table->string('address');
                $table->timestamps();


            });

        } catch (Exception $exception) {
            return makeException($exception, __FILE__, __FUNCTION__, __LINE__);

        }

        return back()->with('success', "پروژه با موفقیت ثبت شد");

    }

    public function modify(Request $request)
    {
        try {
            Database::where('id', $request->id)
                ->where('user_id', getUserId())
                ->update([
//                    'name' => $request->name,
                    'collection' => $request->collection,
                    'charset' => $request->charset,
                    'description' => $request->description,
                ]);


        } catch (Exception $exception) {
            return makeException($exception, __FILE__, __FUNCTION__, __LINE__);

        }

        return back()->with('success', "پروژه با موفقیت ویرایش شد");

    }
}

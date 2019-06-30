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
            $db_name = getUsername() . "_" . $request->name;
            $db = Database::create(
                [
                    'user_id' => getUserId(),
                    'name' => $db_name,
                    'collection' => $request->collection,
                    'charset' => $request->charset,
                    'description' => $request->description,]);

            $table = Table::create([
                'database_id' => $db->id,
                'name' => "users",
                'type' => 'InnoDB',
                'collation' => $request->collection,
            ]);


            if ($table) {
                Artisan::call('mysql:create_db',
                    [
                        'name' => $db_name,
                        'charset' => $request->charset,
                        'collation' => $request->collection
                    ]
                );
                Artisan::call('mysql:create_table',
                    [
                        'name' => 'users',
                        'table_id' => $table->id,
                        'charset' => $request->charset,
                        'collation' => $request->collection,
                        'database_id' => $db->id,
                        'database_name' => $db->name,
                        'create_model' => true,

                        'columns_name' => [ 'fname', 'lname', 'email', 'mobile', 'password', 'address','created_at','updated_at'],
                        'columns_type' => [ 'varchar', 'varchar', 'varchar', 'varchar', 'varchar', 'varchar', 'timestamp', 'timestamp'],
                        'columns_length' => [50, 50, 50, 12, 100, 500,50,50],
                    ]);


            }


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

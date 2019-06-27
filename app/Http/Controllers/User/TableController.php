<?php

namespace App\Http\Controllers\User;

use App\classes\Content;
use App\classes\DatabaseConnection;
use App\classes\Inflect;
use App\Model\Database;
use App\Model\Table;
use App\Model\Url;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;

class TableController extends Controller
{
    public function list(Request $request)
    {


        $data = [];
        $columns = [];
        $structures = [];
        $table = Input::get('table', 0);
        $render_default = $table == '0' ? 'home' : 'browse';
        $render = Input::get('render', $render_default);
        $database_id = Input::get('database_id', 0);


        //   $data=  User::on(getConnection())->get();
//

        $tables = Database::with('tables')->where('user_id', getUserId())->find($database_id);

        if ($tables && $database_id)
//            $tables =  $this->listTables();

            if (Schema::connection(getConnection($database_id))->hasTable($table)) {

                $data = DB::connection(getConnection())->table($table)->get();
                $columns = Schema::connection(getConnection())->getColumnListing($table);
                $structures = Db::connection(getConnection())->select(DB::raw("SHOW COLUMNS FROM   $table "));

            }

//
//        $data = Table::where('database_id',$database_id)->get();


        if ($request->ajax()) {

            try {
                return view('user.table.render.' . $render, compact('data', 'columns', 'tables', 'table', 'database_id', 'structures'))->render();
            } catch (\Throwable $e) {
            }

        }
        return view('user.table.list', compact('data', 'columns', 'tables', 'table', 'database_id', 'render', 'structures'));


    }

    public function listTables()
    {

        return array_map('current', DB::connection(getConnection())->select('SHOW TABLES'));

    }


    public function new()
    {
        $database_id = Input::get('database_id', 0);
        $database_name = Input::get('database_name', 0);

        return view('user.table.new', compact('database_id', 'database_name'));

    }

    public function create(Request $request)
    {


// return ['name'=>$request->column_name,'type'=>$request->column_type,'length'=>$request->length];
        if (Schema::connection(getConnection($request->database_id))->hasTable($request->name)) {
            return back()->with('error', "جدول " . $request->name . " قبلا ساخته شده است");

        }
        $table = Table::create([
            'database_id' => $request->database_id,
            'name' => $request->name,
            'type' => 'InnoDB',
            'collation' => $request->collation,
        ]);

        $table_id = $table->id;
        $table_name = Inflect::singularize($request->name);

        Artisan::call('mysql:create_table',
            ['name' => $request->name,
                'charset' => $request->charset,
                'collation' => $request->collection,
                'database_id' => $request->database_id,
                'database_name' => $request->database_name,
                'create_model' => true,
                'columns_name' =>$request->column_name,
                'columns_type' =>$request->column_type,
                'columns_length' =>$request->column_length,
            ]);
        Url::create(
            [
                'database_id' => $request->database_id,
                'table_id' => $table_id,
                'title' => $request->name . " LIST",

                'link' => "api/" . auth('user')->user()->username . "/" . $request->database_name . "/" . $table_name . "/list",
                'method' => "GET",
            ]
        );
        Url::create(

            [
                'database_id' => $request->database_id,

                'table_id' => $table_id,
                'title' => $request->name . " CREATE",

                'link' => "api/" . auth('user')->user()->username . "/" . $request->database_name . "/" . $table_name . "/create",

                'method' => "POST",

            ]
        );
        Url::create(
            [
                'database_id' => $request->database_id,

                'table_id' => $table_id,
                'title' => $request->name . " MODIFY",

                'link' => "api/" . auth('user')->user()->username . "/" . $request->database_name . "/" . $table_name . "/modify",

                'method' => "POST",

            ]
        );
        Url::create(
            [
                'database_id' => $request->database_id,

                'table_id' => $table_id,
                'title' => $request->name . " DELETE",

                'link' => "api/" . auth('user')->user()->username . "/" . $request->database_name . "/" . $table_name . "/delete",

                'method' => "POST",

            ]

        );


        return back()->with('success', "جدول " . $request->name . " با موفقیت ثبت شد");
    }

    public function modify()
    {

    }
}

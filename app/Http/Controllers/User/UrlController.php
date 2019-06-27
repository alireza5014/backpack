<?php

namespace App\Http\Controllers\User;

use App\Model\Database;
use App\Model\Url;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class UrlController extends Controller
{
    public function list(Request $request)
    {
        $database_id = Input::get('database_id', 0);

        $data = Database::where('user_id', getUserId())->with(['urls' => function ($q) {
            $q->with('table');
        }])->find($database_id);


        $tables = Database::with('tables')->where('user_id', getUserId())->find($database_id);

        if ($request->ajax()) {

            return view('user.url.render.table', compact('data'))->render();

        }
        return view('user.url.list', compact('data', 'tables', 'database_id'));

    }
}

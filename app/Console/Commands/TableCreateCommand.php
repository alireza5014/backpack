<?php

namespace App\Console\Commands;

use App\classes\Content;
use App\classes\Inflect;
use App\Model\Url;
use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TableCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mysql:create_table {name?} {table_id?} {charset?} {collation?} {database_id?} {database_name?} {create_model=false} {columns_name?} {columns_type?} {columns_length?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new mysql database schema based on the database config file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {


        $tableName = $this->argument('name') ?: config("database.connections.mysql.database");
        $tableId = $this->argument('table_id') ?: 0;
        $charset = $this->argument('charset') ?: config("database.connections.mysql.charset", 'utf8mb4');
        $collation = $this->argument('collation') ?: config("database.connections.mysql.collation", 'utf8mb4_unicode_ci');
        $database_id = $this->argument('database_id');
        $database_name = $this->argument('database_name');
        $engine = 'InnoDB';
        $columns_name = $this->argument('columns_name');
        $columns_type = $this->argument('columns_type');
        $columns_length = $this->argument('columns_length');
        $create_model = $this->argument('create_model');


        Schema::connection(getConnection($database_id))->create($tableName, function (Blueprint $table) use ($charset, $collation, $engine, $columns_name, $columns_type, $columns_length) {
            $table->increments('id');

            for ($i = 0; $i < sizeof($columns_name); $i++) {
                 switch ($columns_type[$i]) {


                    case 'int':
                        if ($columns_name[$i] != 'id')
                            $table->integer($columns_name[$i]);
                        break;


                    case 'varchar':
                        $table->string($columns_name[$i], $columns_length[$i])->nullable();
                        break;

                    case 'text':
                        $table->text($columns_name[$i])->nullable();
                        break;

                    case 'timestamp':

                        $table->timestamp($columns_name[$i], 0)->nullable();

                        break;
                }


            }


            $table->engine = $engine;
            $table->charset = $charset;
            $table->collation = $collation;
        });


        $content = new Content($database_name, $tableName);
        $model_content = $content->setModelContent($columns_name, true);
        $controller_content = $content->setControllerContent($columns_name, true);


        $routes = ['list' => 'GET', 'create' => 'POST', 'modify' => 'POST', 'delete' => 'POST'];
        $api_content = $content->setRouteContent($routes, true);


        $table_name = Inflect::singularize($tableName);
        $routes = ['list' => 'GET', 'create' => 'POST', 'modify' => 'POST', 'delete' => 'POST'];
        foreach ($routes as $route => $method) {
            Url::create(
                [
                    'database_id' => $database_id,
                    'table_id' => $tableId,
                    'title' => $table_name . " " . $route,

                    'link' => "api/" . getUsername() . "/" . $database_name . "/" . $table_name . "/" . $route,
                    'method' => $method,
                ]
            );
        }

    }
}

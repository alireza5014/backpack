<?php

namespace App\Console\Commands;

use App\classes\Content;
use App\classes\Inflect;
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
    protected $signature = 'mysql:create_table {name?} {charset?} {collation?} {database_id?} {database_name?} {create_model=false} {columns_name?} {columns_type?} {columns_length?}';

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
        $charset = $this->argument('charset') ?: config("database.connections.mysql.charset", 'utf8mb4');
        $collation = $this->argument('collation') ?: config("database.connections.mysql.collation", 'utf8mb4_unicode_ci');
        $database_id = $this->argument('database_id');
        $database_name = $this->argument('database_name');
        $engine = 'InnoDB';
        $columns_name = $this->argument('columns_name');
        $columns_type = $this->argument('columns_type');
        $columns_length = $this->argument('columns_length');
        $create_model = $this->argument('create_model');


        Schema::connection(getConnection($database_id))->create($tableName, function (Blueprint $table) use ($charset, $collation, $engine, $columns_name,$columns_type,$columns_length) {

            for ($i = 0; $i < sizeof($columns_name); $i++) {
                switch ($columns_type[$i]) {
                    case 'int':
                        $table->integer($columns_name[$i]);


                        break;

                    case 'varchar':
                        $table->string($columns_name[$i],$columns_length[$i]);
                        break;

                    case 'text':
                        $table->text($columns_name[$i]);
                        break;
                }


            }


            $table->engine = $engine;
            $table->charset = $charset;
            $table->collation = $collation;
        });


        $path = getUsername() . "/" . $database_name . "/" . Inflect::singularize(ucfirst($tableName));

        $content = new Content();
        $model_content = $content->database($database_name)->table($tableName)->getModelContent($columns_name);
        $controller_content = $content->database($database_name)->table($tableName)->getControllerContent($columns_name);

        $api_content = $content->database($database_name)->table($tableName)->getRouteContent();

        makeFile(base_path("routes/" . getUsername() . "/" . $database_name . "/" . $tableName . ".php"), $api_content);

        makeFile(app_path("Model/All/" . $path . ".php"), $model_content);
        makeFile(app_path("Http/Controllers/All/" . $path . "Controller.php"), $controller_content);


    }
}

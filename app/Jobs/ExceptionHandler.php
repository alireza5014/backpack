<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class ExceptionHandler implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $exception, $file, $function, $line, $user_id = "";

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($exception, $file, $function, $line)
    {
        $this->exception = $exception;
        $this->file = $file;
        $this->function = $function;
        $this->line = $line;

        $this->user_id = getUserId();

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::error($this->exception . " FILE: " . $this->file . " FUNCTION " . $this->function . " LINE: " . $this->line . " USERID " . $this->user_id);

    }
}

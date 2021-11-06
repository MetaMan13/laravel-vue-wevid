<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class ClearPublicStorage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:public-clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all files from storage/app/public';

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
     * @return int
     */
    public function handle()
    {
        // Confirm that the user wants to delete all files before deleting
        // if($this->confirm('Are you sure you want to delete all files from storage/app/public ?'))
        // {
        //     $files = new Filesystem();
        //     $files->cleanDirectory('storage/app/public');
        // }
        $files = new Filesystem();
        $files->cleanDirectory('storage/app/public');
    }
}

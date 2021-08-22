<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * Class FillDirectory
 * @package App\Console\Commands
 */
class FillDirectory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'directories:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Первоначальное заполнение справочников';

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
        return 0;
    }
}

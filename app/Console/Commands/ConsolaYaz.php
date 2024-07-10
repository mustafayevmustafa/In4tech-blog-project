<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ConsolaYaz extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:consola-yaz';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        dd('Eto toju pajalista!');
    }
}

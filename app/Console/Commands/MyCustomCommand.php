<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MyCustomCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:my-custom-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'My custom command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $quotes = [
            'Custom quote 1',
            'Custom quote 2',
        ];

        $this->info($quotes[array_rand($quotes)]);
    }
}


//Bu kodla kommand yarat:
//php artisan my:custom-command

//Asagidaki kodu yazib oz yazilarimi listle:
//php artisan app:my-custom-command


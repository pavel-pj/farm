<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Actions\Farm\Farm\Farm;

class FarmCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'farm:life';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Farm application';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $farm=new Farm ;
        $farm->life();

    }
}

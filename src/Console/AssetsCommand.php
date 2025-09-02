<?php

namespace SrcLab\AltLog\Console;

use Illuminate\Console\Command;

class AssetsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'to-log:assets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Re-publish the to-log assets';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->call('vendor:publish', [
            '--tag' => 'to-log-assets',
            '--force' => true,
        ]);
    }
}

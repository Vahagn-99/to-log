<?php

namespace SrcLab\AltLog\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'to-log:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install To log';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->comment('Publishing assets...');
        $this->callSilent('vendor:publish', [
            '--tag' => 'to-log-assets',
        ]);

        $this->comment('Publishing configuration...');
        $this->callSilent('vendor:publish', [
            '--tag' => 'to-log-config',
        ]);

        $this->info('To log installed successfully.');
    }
}

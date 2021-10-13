<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SourceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:source {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates all necessary classes for the current development pattern';

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
        $this->info('Criando Controller');
        Artisan::call("make:controller", ["name" => $this->argument('name') . "Controller"]);
        $this->info('Criando Request');
        foreach($this->requests() as $requests){
            Artisan::call("generate:request", ["name" => $this->argument('name'), "method" => $requests]);
        }
        if (! File::exists(__DIR__ . "/../../../app/Http/Requests/{$this->argument('name')}")) {
            File::makeDirectory(__DIR__ . "/../../../app/Http/Requests/{$this->argument('name')}");
        }
        $this->info('Criando Services');
        foreach ($this->services() as $method) {
            Artisan::call('generate:service', ["name" => $this->argument('name').'Service', "method" => $method]);
        }
        $this->info('Criando Repository');
        Artisan::call("generate:repository", ["name" => $this->argument('name') . "Repository"]);
        $this->info('Criando Model');
        Artisan::call("generate:model", ["name" => $this->argument('name')]);
        if (! File::exists(__DIR__ . "/../../../app/Services/{$this->argument('name')}Services")) {
            File::makeDirectory(__DIR__ . "/../../../app/Services/{$this->argument('name')}Services");
        }
        $this->info('Criando Migration');
        $name = strtolower(Str::plural($this->argument('name')));
        Artisan::call('make:migration', ["name" => "create_{$name}_table"]);
        $this->info('Done!');
    }


    public function requests(){
        return [
            'Create',
            'Update'
        ];
    }


    public function services()
    {
        return [
            'Index',
            'Show',
            'Store',
            'Update',
            'Destroy',
        ];
    }
}

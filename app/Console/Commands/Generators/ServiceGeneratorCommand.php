<?php

namespace App\Console\Commands\Generators;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class ServiceGeneratorCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:service {name} {method}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate service';

    /**
     * O tipo de classe sendo gerada.
     *
     * @var string
     */
    protected $type = 'Model';


    /**
     * Substitui o nome da classe para o stub fornecido.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        $stub = parent::replaceClass($stub, $name);
        return str_replace('GenericService', $this->serviceName(), $stub);
    }


    public function serviceName()
    {
        return $this->argument('method').$this->argument('name');
    }

    /**
     * Obtpem o arquivo stub para o gerador.
     *
     * @return string
     */
    protected function getStub()
    {
        return  __DIR__ . '/Stubs/make-service.stub';
    }

    protected function getNameInput()
    {
        return trim($this->argument('method').$this->argument('name'));
    }

    /**
     * Obtém o namespace padrão para a classe.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . "\Services\\".$this->argument('name')."s";
    }



    /**
     * Obtém os argumentos do comando do console.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the model.'],
            ['method', InputArgument::REQUIRED, 'The name of the method.'],
        ];
    }
}

<?php

namespace App\Console\Commands\Generators;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class RequestGeneratorCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:request {name} {method}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate request';

    /**
     * O tipo de classe sendo gerada.
     *
     * @var string
     */
    protected $type = 'Request';


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
        return str_replace('GenericRequest', $this->requestName(), $stub);
    }


    public function requestName()
    {
        return $this->argument('method')."Request";
    }

    /**
     * Obtpem o arquivo stub para o gerador.
     *
     * @return string
     */
    protected function getStub()
    {
        return  __DIR__ . '/Stubs/make-request.stub';
    }

    protected function getNameInput()
    {
        return trim($this->argument('method')."Request");
    }

    /**
     * Obtém o namespace padrão para a classe.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . "\Http\Requests\\".$this->argument('name');
    }



    /**
     * Obtém os argumentos do comando do console.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the request.'],
            ['method', InputArgument::REQUIRED, 'The name of the method.'],
        ];
    }
}

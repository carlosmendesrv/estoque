<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Setup extends Command
{
    use Asks;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate all you need for test the app';

    /**
     * Put on $list all questions of your function, in execute put the name of method to be called
     * -
     * Will be get all answers and passed for array
     * The execute will be receive this array with all answers ordered
     *
     * @return void
     */
    public function handle()
    {
        $list = [
            [
                'ask_1' => 'Quantos usuários voce deseja criar?',
                'ask_2' => 'Qual a senha padrão para os usuarios?',
                'success_msg' => 'Super Usuário: admin@admin.com | admin123',
                'execute' => 'createUser'
            ],

        ];

        $this->info('Seja bem vindo ao Setup');

        DB::beginTransaction();

        foreach ($list as $l)
        {

            $args = [];
            foreach ($this->getAsks($l) as $ask)
            {
                $ans = $this->ask($ask);
                array_push($args, $ans);
            }

            $methodName = $l['execute'];

            $this->info('Um momento....');

            static::$methodName($args);

            if (array_key_exists('success_msg', $l))
            {
                $this->info($l['success_msg']);
            }
        }
        DB::commit();

        return $this->info('Dados inseridos com sucesso!');
    }

    private function getAsks(array $list)
    {
        $asks = [];
        foreach ($list as $key => $l)
        {
            $exploded = explode('_', $l);

            if (str_starts_with($key, 'ask'))
            {
                array_push($asks, $exploded[0]);
            }
        }

        return $asks;
    }
}

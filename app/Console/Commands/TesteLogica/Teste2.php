<?php

namespace App\Console\Commands\TesteLogica;

use Illuminate\Console\Command;

class Teste2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:teste2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Na usina de Angra dos Reis, os técnicos analisam a perda de massa de um material radioativo. Sabendo-se que este perde 25% da sua massa a cada 30 segundos, criar um algoritmo que imprima o tempo necessário para que a massa desse material seja menor que 0.10.';

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
     * @return mixed
     */
    public function handle()
    {
        echo "Digite a massa total: ";
        $massa = fgets(STDIN);

        $contador = 0;

        while (!($massa < 0.10)) {
            $massa -= $massa * 0.25;
            $contador++;
        }

        $tempo = $contador * 30;

        echo PHP_EOL;
        echo("####################################################") . PHP_EOL;
        echo PHP_EOL;
        echo("A massa será inferior a 0.10 em {$tempo} segundos.") . PHP_EOL;
    }
}

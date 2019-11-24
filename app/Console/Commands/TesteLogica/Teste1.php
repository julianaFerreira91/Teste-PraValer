<?php

namespace App\Console\Commands\TesteLogica;

use Illuminate\Console\Command;

class Teste1 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:teste1';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Faça um algoritmo para ler: a descrição do produto (nome), a quantidade adquirida e o preço unitário. Calcular e escrever o total (total = quantidade adquirida * preço unitário), o desconto e o total a pagar (total a pagar = total - desconto), sabendo-se que:
        - Se quantidade <= 5 o desconto será de 2%
        - Se quantidade > 5 e quantidade <= 10 o desconto será de 3%
        - Se quantidade > 10 o desconto será de 5%';

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
        $desconto = 0;

        echo "Digite o nome do produto: ";
        $produto    = fgets(STDIN);
        echo "Digite a quantidade adquirida: ";
        $quantidade = fgets(STDIN);
        echo "Digite o valor unitário do produto: ";
        $valor_unit = fgets(STDIN);

        $total = $valor_unit * $quantidade;

        if($quantidade <= 5)
        {
            $desconto = 2;
        }
        elseif($quantidade > 5 && $quantidade <= 10)
        {
            $desconto = 3;
        }
        else
        {
            $desconto = 5;
        }

        $total_pagar = $total - ($total * ($desconto / 100));

        echo PHP_EOL;
        echo("####################################################") . PHP_EOL;
        echo PHP_EOL;
        echo("Subtotal: R$ {$total}") . PHP_EOL;
        echo("Desconto: {$desconto}%") . PHP_EOL;
        echo PHP_EOL;
        echo("####################################################") . PHP_EOL;
        echo PHP_EOL;
        echo "Total a Pagar: R$ {$total_pagar}" . PHP_EOL;
    }
}

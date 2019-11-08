<?php

use frontend\models\Calculadora;

class CalculadoraTest extends \Codeception\Test\Unit
{

    public function testMostranumero1()
    {
        $calculadora = new Calculadora(1,1);

    }
}

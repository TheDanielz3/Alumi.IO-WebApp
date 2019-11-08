<?php


namespace frontend\models;


class Calculadora
{
    public $numero1;
    public $numero2;

    /**
     * Calculadora constructor.
     * @param $numero1
     * @param $numero2
     */
    public function __construct($numero1, $numero2)
    {
        $this->numero1 = $numero1;
        $this->numero2 = $numero2;
    }

    public function mostranumero1()
    {
        return $this->numero1;
}
}
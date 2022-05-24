<?php

//namespace SRC;

class Funcoes
{
    /*

    Desenvolva uma função que receba como parâmetro o ano e retorne o século ao qual este ano faz parte. O primeiro século começa no ano 1 e termina no ano 100, o segundo século começa no ano 101 e termina no 200.

	Exemplos para teste:

	Ano 1905 = século 20
	Ano 1700 = século 17

     * */
    public function SeculoAno(int $ano): int {
        if ($ano < 101) {
            return 1;
        }

        $arr = str_split($ano);
        $size = count($arr);

        $lastTwo = "".$arr[$size-2]."".$arr[$size-1];
        $lastTwo = intval($lastTwo);

        $output = "";

        for ($i = 0; $i <= $size - 3; $i++) {
            $output .= $arr[$i];
        }

        if ($lastTwo == 0) {
            return intval($output);
        }

        return intval($output) + 1;
    }









    /*

    Desenvolva uma função que receba como parâmetro um número inteiro e retorne o numero primo imediatamente anterior ao número recebido

    Exemplo para teste:

    Numero = 10 resposta = 7
    Número = 29 resposta = 23

     * */
    public function PrimoAnterior(int $numero): int
    {
        $primo = false;
        $negativo = false;

        if ($numero < 0) {
            $numero = $numero * -1;
            $negativo = true;
        }

        while ($primo == false) {
            if ($this->CheckNumber($numero) == true) {
                $primo = true;
            } else {
                $primo = false;
                $numero = $numero - 1;
            }
        }

        if ($negativo == true) {
            $numero = $numero * -1;
        }

        return $numero;
    }

    public function CheckNumber(int $number): bool
    {
        $divisores = 0;

        for ($count = 2; $count < $number; $count++)
        {
            if ($number % $count == 0) {
                $divisores++;
            }
        }

        if ($divisores > 1) {
            return false;
        }

        return true;
    }










    /*

    Desenvolva uma função que receba como parâmetro um array multidimensional de números inteiros e retorne como resposta o segundo maior número.

    Exemplo para teste:

	Array multidimensional = array (
	array(25,22,18),
	array(10,15,13),
	array(24,5,2),
	array(80,17,15)
	);

	resposta = 25

     * */
    public function SegundoMaior(array $arr): int {
        $merged = call_user_func_array('array_merge', $arr);
        rsort($merged);

        return $merged[1];
    }








    /*
   Desenvolva uma função que receba como parâmetro um array de números inteiros e responda com TRUE or FALSE se é possível obter uma sequencia crescente removendo apenas um elemento do array.

	Exemplos para teste

	Obs.:-  É Importante  realizar todos os testes abaixo para garantir o funcionamento correto.
         -  Sequencias com apenas um elemento são consideradas crescentes

    [1, 3, 2, 1]  false
    [1, 3, 2]  true
    [1, 2, 1, 2]  false
    [3, 6, 5, 8, 10, 20, 15] false
    [1, 1, 2, 3, 4, 4] false
    [1, 4, 10, 4, 2] false
    [10, 1, 2, 3, 4, 5] true
    [1, 1, 1, 2, 3] false
    [0, -2, 5, 6] true
    [1, 2, 3, 4, 5, 3, 5, 6] false
    [40, 50, 60, 10, 20, 30] false
    [1, 1] true
    [1, 2, 5, 3, 5] true
    [1, 2, 5, 5, 5] false
    [10, 1, 2, 3, 4, 5, 6, 1] false
    [1, 2, 3, 4, 3, 6] true
    [1, 2, 3, 4, 99, 5, 6] true
    [123, -17, -5, 1, 2, 3, 12, 43, 45] true
    [3, 5, 67, 98, 3] true

     * */

    public function SequenciaCrescente(array $arr): boolean {
        $tamanho = count($arr);
        for ($i = 0; $i < $tamanho; $i++) {
            $var = $arr;
            unset($var[$i]);
            if ($this->checkArray($var) == false) {
                return false;
            }
        }
        return true;
    }

    public function checkArray(array $arr): boolean {

        if (count(array_unique(array_diff_assoc($arr, array_unique($arr)))) > 0) {
            return false;
        }

        foreach ($arr as $value) {
            $inputArray[] = $value;
        }

        $array1 = $inputArray;
        $array2 = $inputArray;

        rsort($array1);
        sort($array2);

        if ($inputArray == $array1 || $inputArray == $array2) {
            return true;
        }
        return false;
    }
}
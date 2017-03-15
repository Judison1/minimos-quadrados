<?php

namespace App\Http\Controllers;
use Exception;

class CalculoController extends CoreController
{
    /* Vetor contento os domínios */
    protected $x;
     /* Vetor contento as imagens */
    protected $y;

    function __construct(string $x, string $y)
    {
        if(empty($x))
            throw new Exception('Valores de x estão vazios.');
        if(empty($y))
            throw new Exception('Valores de y estão vazios.');
        if(count($y) != count($x))
            throw new Exception('Quantidade de x e y são diferentes.');

        $this->x = $this->getValue($x);
        $this->y = $this->getValue($y);
        $this->sumX = array_sum($this->x);
    }
    /**
     * Calculo para caso linear
     *
     * @return void
     */
    public function linear()
    {
        
        $matriz = array(
            [count($this->x), $this->sumX, array_sum($this->y)],
            [$this->sumX, array_sum($this->powVector($this->x,2)), array_sum($this->multVector($this->x,$this->y))]
        );
        // Resolução do sistema;
        try {
            $ga = $this->gaussianElimination($matriz);
            $re = $this->retroactiveSubstitutions($ga);
            return ['a' => round($re[0],2), 'b' => round($re[1],2)];
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        
    }
    
    /**
     * Calculo para caso Exponecial
     *
     * @return void
     */
    public function exponencial()
    {
        $lny = $this->lnVector($this->y);
        $matriz = array(
            [count($this->x), $this->sumX, array_sum($lny)],
            [$this->sumX, array_sum($this->powVector($this->x,2)), array_sum($this->multVector($this->x,$lny))]
        );
        // var_dump($matriz);
        // Resolução do sistema;
        try {
            $ga = $this->gaussianElimination($matriz);
            $re = $this->retroactiveSubstitutions($ga);

            return ['a' => round(exp($re[0]),2), 'b' => round($re[1],2) ];
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function polinomial(int $grau)
    {
        for ($i=0; $i <= 2 * $grau; $i++) { 
            $sumXn[] = array_sum($this->powVector($this->x, $i));
        }
        for ($i=0; $i <= $grau; $i++) { 
            $a = $i;
            for ($e=0; $e <= $grau; $e++) { 
                $matriz[$i][$e] = $sumXn[$a];
                $a++;
            }
            $matriz[$i][$grau + 1] = array_sum($this->multVector($this->powVector($this->x,$i), $this->y));
        }
        
        try {
            $ga = $this->gaussianElimination($matriz);
            $re = $this->retroactiveSubstitutions($ga);
            foreach ($re as $r) {
                $response[] = round($r,2);
            }
            return $response;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

    }
}
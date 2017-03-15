<?php

namespace App\Http\Controllers;
use Exception;

class CoreController extends Controller
{
    /**
     * potencia de um vetor
     *
     * @return array
     */
   public function powVector(array $vector, int $num)
   {
   	foreach ($vector as $v) {
   		$newVector[] = pow($v,$num);
   	}
    	return $newVector;
   }

   /**
     * produto dos valores de dois vetores
     *
     * @return array
     */
   public function multVector(array $a, array $b)
   {	
		for ($i=0; $i < count($a) and $i < count($b); $i++) { 
    		$vector[] = $a[$i] * $b[$i];
    	}
		return $vector;
   }

   public function lnVector(array $vector)
   {
   	foreach ($vector as $v) {
   		$newVector[] = log($v);
   	}
   	return $newVector;
   }
   /**
     * Opera transformações elementares sobre as equações de um sistema Ax = b até que, depois de n−1 passos, se obtenha um sistema triangular superior.
     *
     * @return array
     */
   public function gaussianElimination(array $a)
   {	
		$n = count($a);
		for ($i=0; $i < $n-1; $i++) { 
			// echo "<hr>i $i <hr>";
			if($a[$i][$i] == 0){
				try {
					$a = $this->swap($a,$i);
				} catch (Exception $e) {
					throw new Exception($e->getMessage());
				}
			}

			for ($e=$i+1; $e < $n; $e++) {
				// echo "<br>e$e <br>";
				$r = $a[$e][$i] / $a[$i][$i];
				for ($o=0; $o < count($a[$e]); $o++){
					// echo "o$o ";
					$a[$e][$o] = $a[$e][$o] - $a[$i][$o] * $r;
				}
			}
		}
		return $a;
   }

   /**
     * resolve o sistema através das seguintes substituições retroativas.
     *
     * @return array
     */
   public function retroactiveSubstitutions(array $a)
   {
   	$n = count($a) - 1;
   	$m = count($a[$n]) - 1;

   	$b[$n] = $a[$n][$m] / $a[$n][$n];

   	for ($i=$n-1; $i >= 0; $i--) { 
   		$soma = 0;
   		for ($e=$i+1; $e >= $n; $e--) { 
   			$soma += $a[$i][$e] * $b[$e]; 
   		}
   		$b[$i] = ($a[$i][$m] - $soma) / $a[$i][$i];
   	}

   	return $b;
   }
	/**
     * Trocar linha da matriz para que o pivô não seja zero.
     *
     * @return array
     */
   public function swap(array $a, $e)
   {
   	for ($i=$e+1; $i < count($a); $i++) { 
   		if($a[$i][$e] != 0){
   			for ($o=0; $o < count($a); $o++) { 
   				$temp = $a[$e][$o];
   				$a[$e][$o] = $a[$i][$o];
   				$a[$i][$o] = $temp;
   			}
   			return $a;
   		} 
   	}
   	throw new Exception("Não foi possível encontrar linha para troca.");	
   }
   public function getValue($value)
	{
		$val = array_map('floatval', explode(';', $value));
		return $val;
	}
}


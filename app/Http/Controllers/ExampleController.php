<?php

namespace App\Http\Controllers;
use App\Http\Controllers\CalculoController;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function linear(Request $request)
    {
        $x = $request;
        $y = [1.2,2.1,3.3,4.5,5.2];
        try {
            $calculo = new CalculoController($x,$y);
            $linear = $calculo->linear();
            $exponencial = $calculo->exponencial();
            $polinomial = $calculo->polinomial(2);
            $vars = array(
                // 'linear' => $linear,
                // 'exponencial' => $exponencial,
                'polinomial' => $polinomial,
            );
            
            return response()->json($vars);
        } catch (Exception $e) {
           
        }
        
    }
    public function FunctionName($value='')
    {
        # code...
    }

}

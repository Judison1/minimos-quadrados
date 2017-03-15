<?php

namespace App\Http\Controllers;
use App\Http\Controllers\CalculoController;
use Illuminate\Http\Request;
class PublicController extends Controller
{
    /**
     * função para calcular para o caso linear
     *
     * @return json
     */
    public function linear(Request $request)
    {
        $x = $request->input('x');
        $y = $request->input('y');
        try {
            $calculo = new CalculoController($x,$y);
            $linear = $calculo->linear();
            $vars = array(
                'return' => 'success',
                'data' => $linear,
            );
            return response()->json($vars);

        } catch (Exception $e) {
            $vars = array(
                'return' => 'error',
                'message' => $e->getMessage(),
            );
           return response()->json($vars);
        }
    }
    public function exponencial(Request $request)
    {
        $x = $request->input('x');
        $y = $request->input('y');
        try {
            $calculo = new CalculoController($x,$y);
            $exponencial = $calculo->exponencial();
            $vars = array(
                'return' => 'success',
                'data' => $exponencial,
            );
            return response()->json($vars);
            
        } catch (Exception $e) {
            $vars = array(
                'return' => 'error',
                'message' => $e->getMessage(),
            );
           return response()->json($vars);
        }
    }

    public function polinomial(Request $request)
    {
        $x = $request->input('x');
        $y = $request->input('y');
        try {
            $calculo = new CalculoController($x,$y);
            $polinomial = $calculo->polinomial(2);
            $vars = array(
                'return' => 'success',
                'data' => $polinomial,
            );
            return response()->json($vars);
            
        } catch (Exception $e) {
            $vars = array(
                'return' => 'error',
                'message' => $e->getMessage(),
            );
           return response()->json($vars);
        }
    }
}

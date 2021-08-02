<?php

namespace App\Http\Controllers;

use App\Vacinas;
use Illuminate\Http\Request;

class VacinasController extends Controller
{

    public function showVaccines()
    {
        return response()->json(Vacinas::all());
    }

    public function updateVaccines($id_fabricante,Request $request)
    {
        if($request->input('estoque') == '0'){
            return response()->json('Entre com um valor <> 0', 200);
        }
        $vacina = Vacinas::findOrFail($id_fabricante);
        $vacina->estoque = $vacina->estoque+$request->input('estoque');
        $vacina->save();
        return response()->json($vacina, 200);
    }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Paciente;
use App\Imunizacao;
use App\Vacinas;
use Illuminate\Http\Request;

class PacienteController extends Controller
{

    public function showPatients()
    {
        return response()->json(Paciente::all());
    }

    public function createPaciente(Request $request)
    {
        $this->validate($request,[
            'nome' => 'required',
            'cpf' => 'required|unique:pacientes',
            'idade' => 'required',
            'telefone' => 'required'
        ]);
        $paciente = Paciente::create($request->all());

        return response()->json($paciente, 201);
    }

    public function updatePaciente($id_paciente,Request $request)
    {
        $this->validate($request,[
            'nome' => 'required',
            'cpf' => 'required|unique:pacientes',
            'idade' => 'required',
            'telefone' => 'required'
        ]);
        $paciente = Paciente::findOrFail($id_paciente);
        $paciente->update($request->all());
        $paciente->save();

        return response()->json($paciente, 200);
    }

    public function deletePaciente($id_paciente)
    {
        $paciente = Paciente::findOrFail($id_paciente)->delete();

        return response('Deletado com sucesso',200);
    }

}

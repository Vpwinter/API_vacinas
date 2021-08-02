<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Paciente;
use App\Imunizacao;
use App\Vacinas;
use Illuminate\Http\Request;

class ImunizacaoController extends Controller
{

    public function listImmunization($id_paciente)
    {
        $imunizacoes = Imunizacao::where('id_paciente',$id_paciente)->get();
        return response()->json($imunizacoes);
    }

    public function showImmunization($id_paciente,$id_dose)
    {
        $imunizacao = Imunizacao::where('id_paciente',$id_paciente)->where('dose_aplicada',$id_dose)->get();
        return response()->json($imunizacao);
    }

    public function scheduleImmunization($id_paciente)
    {
        $agendado = Imunizacao::where('id_paciente',$id_paciente)->first();
        if(!empty($agendado)){
            if($agendado->dose_aplicada == 'todas'){
                return response("Usuário já imunizado!",200);
            }
            return response("Já possui data marcada!",200);
        }

        $paciente = Paciente::findOrFail($id_paciente);

        // #agenda
        $agenda = new Imunizacao;
        $agenda->id_paciente = $paciente->id;
        $agenda->status = 'agendado';
        $agenda->lote = '';
        $agenda->fabricante = '';
        $agenda->dose_aplicada = '1';
        $agenda->data_aplicacao = '';
        $agenda->save();

        $agenda->data_aplicacao = $agenda->created_at->addDays(random_int(1,7))->toDateString();

        $agenda->save();

        return response()->json($agenda, 200);
    }

    public function applyImmunization($id_paciente, $date, Request $request)
    {
        #verifica se ja tomou todas as doses
        $agenda = Imunizacao::where('id_paciente',$id_paciente)->where('status','vacinado')->where('dose_aplicada','todas')->first();
        if($agenda){
            return response("Usuário já imunizado!",200);
        }
        #verifica se tem agenda marcada
        $agenda = Imunizacao::where('id_paciente',$id_paciente)->where('status','agendado')->first();
        if(empty($agenda)){
            return response()->json('Por favor, agende um horario', 200);
        }
        #verifica se paciente veio na data certa
        $agendado = $agenda->data_aplicacao;
        $atual = Carbon::now()->toDateString();
        if($date && ($atual<$agendado)){
            return response("Usuário veio vacinar antes da data marcada!",200);
        }

        // atualiza quantidade em estoque da vacina
        $vacina = Vacinas::where('estoque','>','0')->inRandomOrder()->first();
        $vacina->estoque = $vacina->estoque - 1;
        $vacina->save();
        // define fabricante,lote e marca como vacinado
        $agenda->lote = $request->input('lote');
        $agenda->fabricante = $vacina->fabricante;
        $agenda->status = 'vacinado';
        $agenda->save();

        $proxDose = new Imunizacao;
        $proxDose->id_paciente = $agenda->id_paciente;
        $proxDose->fabricante = $agenda->fabricante;
        $proxDose->lote = '';
        // Caso seja a primeira dose
        // agenda prox se tiver que tomar mais uma OU
        if($vacina->doses_necessarias == '2' && $agenda->dose_aplicada == '1'){
            $proxDose->dose_aplicada = '2';
            $proxDose->status = 'agendado';
            $proxDose->data_aplicacao = $agenda->updated_at->addDays($vacina->dias)->toDateString();

        // marca como imunizado
        }else{
            $proxDose->dose_aplicada = 'todas';
            $proxDose->status = 'vacinado';
            $proxDose->data_aplicacao = date("Y-m-d H:i:s");
        }
        $proxDose->save();

        return response()->json($proxDose, 200);
    }

    public function changeScheduleImmunization($id_paciente, Request $request)
    {
        #ARRUMAR COMPARAÇÃO DE DATAS
        $agenda = Imunizacao::where('id_paciente',$id_paciente)->first();
        if($agenda->dose_aplicada == 'todas'){
            return response("Paciente não precisa tomar mais nenhuma dose!",200);
        }
        $agendado = $agenda->data_aplicacao;
        $atual = $request->input('data');
        if($atual<$agendado){
            return response("Data deve ser após $agendado!",200);
        }
        if($atual==$agendado){
            return response("Esta já é a data de sua aplicação!",200);
        }
        $agenda->data_aplicacao = $atual;
        $agenda->save();


        return response()->json($agenda, 200);
    }

}

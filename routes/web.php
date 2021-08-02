<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    #CRUD PACIENTE
    $router->get('pacientes',  ['uses' => 'PacienteController@showPatients']);
    $router->post('paciente',  ['uses' => 'PacienteController@createPaciente']);
    $router->put('paciente/{id_paciente}',  ['uses' => 'PacienteController@updatePaciente']);
    $router->delete('paciente/{id_paciente}',  ['uses' => 'PacienteController@deletePaciente']);

    #IMUNIZACAO
    $router->get('paciente/{id_paciente}/imunizacoes',  ['uses' => 'ImunizacaoController@listImmunization']);
    $router->get('paciente/{id_paciente}/imunizacoes/{id_dose}',  ['uses' => 'ImunizacaoController@showImmunization']);
    $router->post('paciente/{id_paciente}/agendar',  ['uses' => 'ImunizacaoController@scheduleImmunization']);
    $router->put('paciente/{id_paciente}/vacinar/{date}',  ['uses' => 'ImunizacaoController@applyImmunization']);
    $router->put('paciente/{id_paciente}/agendar',  ['uses' => 'ImunizacaoController@changeScheduleImmunization']);

    #VACINA
    $router->get('vacinas',  ['uses' => 'VacinasController@showVaccines']);
    $router->put('vacina/{id_fabricante}',  ['uses' => 'VacinasController@updateVaccines']);
});

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $result = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados');
        $states = $result->json();

        if(is_null($states)) {
            $states = [
                [
                    'sigla' => 'RO',
                    'nome' => 'Rondônia',
                ],
                [
                    'sigla' => 'AC',
                    'nome' => 'Acre',
                ],
                [
                    'sigla' => 'AM',
                    'nome' => 'Amazonas',
                ],
                [
                    'sigla' => 'RR',
                    'nome' => 'Roraima',
                ],
                [
                    'sigla' => 'PA',
                    'nome' => 'Pará',
                ],
                [
                    'sigla' => 'AP',
                    'nome' => 'Amapá',
                ],
                [
                    'sigla' => 'TO',
                    'nome' => 'Tocantins',
                ],
                [
                    'sigla' => 'MA',
                    'nome' => 'Maranhão',
                ],
                [
                    'sigla' => 'PI',
                    'nome' => 'Piauí',
                ],
                [
                    'sigla' => 'CE',
                    'nome' => 'Ceará',
                ],
                [
                    'sigla' => 'RN',
                    'nome' => 'Rio Grande do Norte',
                ],
                [
                    'sigla' => 'PB',
                    'nome' => 'Paraíba',
                ],
                [
                    'sigla' => 'PE',
                    'nome' => 'Pernambuco',
                ],
                [
                    'sigla' => 'AL',
                    'nome' => 'Alagoas',
                ],
                [
                    'sigla' => 'SE',
                    'nome' => 'Sergipe',
                ],
                [
                    'sigla' => 'BA',
                    'nome' => 'Bahia',
                ],
                [
                    'sigla' => 'MG',
                    'nome' => 'Minas Gerais',
                ],
                [
                    'sigla' => 'ES',
                    'nome' => 'Espírito Santo',
                ],
                [
                    'sigla' => 'RJ',
                    'nome' => 'Rio de Janeiro',
                ],
                [
                    'sigla' => 'SP',
                    'nome' => 'São Paulo',
                ],
                [
                    'sigla' => 'PR',
                    'nome' => 'Paraná',
                ],
                [
                    'sigla' => 'SC',
                    'nome' => 'Santa Catarina',
                ],
                [
                    'sigla' => 'RS',
                    'nome' => 'Rio Grande do Sul',
                ],
                [
                    'sigla' => 'MS',
                    'nome' => 'Mato Grosso do Sul',
                ],
                [
                    'sigla' => 'MT',
                    'nome' => 'Mato Grosso',
                ],
                [
                    'sigla' => 'GO',
                    'nome' => 'Goiás',
                ],
                [
                    'sigla' => 'DF',
                    'nome' => 'Distrito Federal',
                ]
            ];
        }

        foreach($states as $state) {
            DB::table('states')->insert(
                ['name' => $state['nome'],'initials' => $state['sigla'], 'created_at' => Carbon::now()]
            );
        }
    }
}

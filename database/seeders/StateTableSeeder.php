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
                0 =>
                    ['id' => 11,
                        'sigla' => 'RO',
                        'nome' => 'Rondônia',
                    ],
                1 =>
                    [
                        'id' => 12,
                        'sigla' => 'AC',
                        'nome' => 'Acre',
                    ],
                2 =>
                    [
                        'id' => 13,
                        'sigla' => 'AM',
                        'nome' => 'Amazonas',
                    ],
                3 =>
                    [
                        'id' => 14,
                        'sigla' => 'RR',
                        'nome' => 'Roraima',
                    ],
                4 =>
                    [
                        'id' => 15,
                        'sigla' => 'PA',
                        'nome' => 'Pará',
                    ],
                5 =>
                    [
                        'id' => 16,
                        'sigla' => 'AP',
                        'nome' => 'Amapá',
                    ],
                6 =>
                    [
                        'id' => 17,
                        'sigla' => 'TO',
                        'nome' => 'Tocantins',
                    ],
                7 =>
                    [
                        'id' => 21,
                        'sigla' => 'MA',
                        'nome' => 'Maranhão',
                    ],
                8 =>
                    [
                        'id' => 22,
                        'sigla' => 'PI',
                        'nome' => 'Piauí',
                    ],
                9 =>
                    [
                        'id' => 23,
                        'sigla' => 'CE',
                        'nome' => 'Ceará',
                    ],
                10 =>
                    [
                        'id' => 24,
                        'sigla' => 'RN',
                        'nome' => 'Rio Grande do Norte',
                    ],
                11 =>
                    [
                        'id' => 25,
                        'sigla' => 'PB',
                        'nome' => 'Paraíba',
                    ],
                12 =>
                    [
                        'id' => 26,
                        'sigla' => 'PE',
                        'nome' => 'Pernambuco',
                    ],
                13 =>
                    [
                        'id' => 27,
                        'sigla' => 'AL',
                        'nome' => 'Alagoas',
                    ],
                14 =>
                    [
                        'id' => 28,
                        'sigla' => 'SE',
                        'nome' => 'Sergipe',
                    ],
                15 =>
                    [
                        'id' => 29,
                        'sigla' => 'BA',
                        'nome' => 'Bahia',
                    ],
                16 =>
                    [
                        'id' => 31,
                        'sigla' => 'MG',
                        'nome' => 'Minas Gerais',
                    ],
                17 =>
                    [
                        'id' => 32,
                        'sigla' => 'ES',
                        'nome' => 'Espírito Santo',
                    ],
                18 =>
                    [
                        'id' => 33,
                        'sigla' => 'RJ',
                        'nome' => 'Rio de Janeiro',
                    ],
                19 =>
                    [
                        'id' => 35,
                        'sigla' => 'SP',
                        'nome' => 'São Paulo',
                    ],
                20 =>
                    [
                        'id' => 41,
                        'sigla' => 'PR',
                        'nome' => 'Paraná',
                    ],
                21 =>
                    [
                        'id' => 42,
                        'sigla' => 'SC',
                        'nome' => 'Santa Catarina',
                    ],
                22 =>
                    [
                        'id' => 43,
                        'sigla' => 'RS',
                        'nome' => 'Rio Grande do Sul',
                    ],
                23 =>
                    [
                        'id' => 50,
                        'sigla' => 'MS',
                        'nome' => 'Mato Grosso do Sul',
                    ],
                24 =>
                    [
                        'id' => 51,
                        'sigla' => 'MT',
                        'nome' => 'Mato Grosso',
                    ],
                25 =>
                    [
                        'id' => 52,
                        'sigla' => 'GO',
                        'nome' => 'Goiás',
                    ],
                26 =>
                    [
                        'id' => 53,
                        'sigla' => 'DF',
                        'nome' => 'Distrito Federal',
                    ]
            ];
        }

        foreach($states as $state) {
            DB::table('states')->insert(
                ['id' => $state['id'], 'name' => $state['nome'],'initials' => $state['sigla'], 'created_at' => Carbon::now()]
                );
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Bairro;
use App\Models\Municipio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $municipios = [
            'Luanda' => [
                'Maianga',
                'Ingombota',
                'Rangel',
                'Samba',
                'Palanca',
            ],
            'Belas' => [
                'Talatona',
                'Kilamba',
                'Camama',
                'Fomento',
                'Capalanga',
            ],
            'Cacuaco' => [
                'Cacuaco-sede',
                'Cabolombo',
                'Maianga do Cacuaco',
                'Cassenda',
                'Dombolo',
            ],
            'Cazenga' => [
                'Cazenga-sede',
                'Kikolo',
                'Saúde',
                'Golfe',
                'Zango',
            ],
            'Viana' => [
                'Zango 1',
                'Zango 2',
                'Zango 3',
                'Calumbo',
                'Musseque',
            ],
            'Quiçama' => [
                'Barra do Dande',
                'Massangano',
                'Mucusso',
                'Sambulu',
                'Mengo',
            ],
            'Icolo e Bengo' => [
                'Catete',
                'Muchixe',
                'Quicabo',
                'Bom Jesus',
                'Icolo e Bengo-sede',
            ],
        ];

        foreach ($municipios as $nome => $bairros) {
            $municipio = Municipio::create(['name' => $nome]);

            foreach ($bairros as $bairroNome) {
                Bairro::create([
                    'name' => $bairroNome,
                    'municipio_id' => $municipio->id,
                ]);
            }
        }
    }
}

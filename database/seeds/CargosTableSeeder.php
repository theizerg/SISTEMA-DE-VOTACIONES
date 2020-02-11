<?php

use Illuminate\Database\Seeder;
use App\Models\Cargos;

class CargosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cargo = new Cargos;
        $cargo->nb_cargo = 'PRESIDENTE';
        $cargo->save();

        $cargo = new Cargos;
        $cargo->nb_cargo = 'VICE-PRESIDENTE';
        $cargo->save();

        $cargo = new Cargos;
        $cargo->nb_cargo = 'TESORERO(A)';
        $cargo->save();

        $cargo = new Cargos;
        $cargo->nb_cargo = 'SUB-TESORERO(A)';
        $cargo->save();

        $cargo = new Cargos;
        $cargo->nb_cargo = 'SECRETARIO(A) DE ACTAS';
        $cargo->save();

        $cargo = new Cargos;
        $cargo->nb_cargo = 'SUB-SECRETARIO(A) DE ACTAS';
        $cargo->save();

        $cargo = new Cargos;
        $cargo->nb_cargo = 'SECRETARIO(A) DE RELACIONES INSTITUCIONALES';
        $cargo->save();

        $cargo = new Cargos;
        $cargo->nb_cargo = 'REPRESENTANTE PERSONAL OBRERO';
        $cargo->save();

        


    }
}

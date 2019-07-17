<?php

use Illuminate\Database\Seeder;

class BarbersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        for ($i = 0; $i < 3; $i++){
            if ($i == 0){
                $nombre = "Barberia 1";
            }elseif ($i == 1){
                $nombre = "Barberia 2";
            }elseif ($i == 2){
                $nombre = "Barberia 3";
            }
            $barberia = \App\Barber::create ([
                'nombre' => $nombre,
            ]);
        }

    }
}

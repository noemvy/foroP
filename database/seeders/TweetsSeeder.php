<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TweetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tweets')->insert([
            'name' => 'Edwin Mina',
            'handle' => '@amongus',
            'image' => 'https://i.pinimg.com/originals/d6/ba/8a/d6ba8a198590e27b842ad5ebc89da07c.jpg',
            'tweet' => "EL CAMION DE BASURA NO PASA Y YA HAY UN PATACONSITO",
            'file' => 'https://www.ecologistasenaccion.org/wp-content/uploads/adjuntos-spip/jpg/basura-2.jpg',
            'is_file' => true,
            'likes' => '50',
            'comments' => '30',
            'date' => '2023-03-03',
            'tag' => 'Delincuencia',
            'location' => 'Capira, La Pita',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('tweets')->insert([
            'name' => 'Maria Pérez',
            'handle' => '@mariaP',
            'image' => 'https://i.pinimg.com/564x/4a/93/ae/4a93ae0e9fbf96e68a84b4fad16ef748.jpg',
            'tweet' => "He reportado los constantes problemas de luz y las instituciones encargadas no se hacen responsable, hasta cuando lo mismo.",
            'file' => 'https://www.debate.com.mx/img/2021/08/28/la_regixn_del_xvora_sufrix_problemas_por_falta_de_luz_1_crop1630198802213.jpeg?__scale=w:1200,h:675,t:2',
            'is_file' => true,
            'likes' => '35',
            'comments' => '54',
            'date' => '2023-04-14',
            'tag' => 'Luz',
            'location' => 'Loma de Guadalupe',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


        DB::table('tweets')->insert([
            'name' => 'Noemi Vasquez',
            'handle' => '@yoongo',
            'image' => 'https://i.pinimg.com/736x/c9/32/c5/c932c5b831a067a33030af2c0c7dea82.jpg',
            'tweet' => "NO HAY AGUA 😡😡😡",
            'file' => 'https://caracol.com.co/resizer/v2/BCTMA32AXJCKTB5KLXFJEPEY7M.jpeg?auth=9c4cfe8e6ec2a1e1b5b654590565203a935e61874d6803f9c9cb83efc91fd096&width=650&height=488&quality=70&smart=true',
            'is_file' => true,
            'likes' => '90',
            'comments' => '54',
            'date' => '2023-07-07',
            'tag' => 'Agua',
            'location' => 'La Pesa',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('tweets')->insert([
            'name' => 'Rosario Cabrera',
            'handle' => '@rosstay',
            'image' => 'https://i.pinimg.com/564x/28/03/5f/28035f5832d7c5f1d466d5d932113fe0.jpg',
            'tweet' => "Las calles no dan más, la representante no hace nada por la comunidad, los carros no pueden ni pasar.",
            'file' => 'https://www.panamaamerica.com.pa/sites/default/files/imagenes/2022/03/17/estado-calles_1.jpg',
            'is_file' => true,
            'likes' => '35',
            'comments' => '54',
            'date' => '2023-04-14',
            'tag' => 'Calles',
            'location' => 'La Chorrera. El Trapichito',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('tweets')->insert([
            'name' => 'Roy Coronado',
            'handle' => '@royc',
            'image' => 'https://i.pinimg.com/564x/bc/59/ae/bc59ae01d38c2847848064dfc3519a78.jpg',
            'tweet' => "Hasta cuando la delincuencia, no se puede salir ni a la esquina por las pandillas en el barrio, ¿donde estan los policías?",
            'file' => 'https://www.panamaamerica.com.pa/sites/default/files/imagenes/2016/03/10/delincuencia_en_el_distrito_de_san_miguelito_0.jpg',
            'is_file' => true,
            'likes' => '50',
            'comments' => '30',
            'date' => '2023-03-03',
            'tag' => 'Delincuencia',
            'location' => 'Capira, La Pita',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);



    }
}

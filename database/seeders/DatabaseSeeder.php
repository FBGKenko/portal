<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Configuracion;
use App\Models\Empresa;
use App\Models\Permiso;
use App\Models\Usuario;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $noEmpresas = 50;
        $noMinMaxSeguidosPorEmpresa = [0, 20];
        for ($i=0; $i < $noEmpresas; $i++) { 
            //TIP: Has para childs, for para padres
            //Declarar dueños con configuracion
            $dueño = Usuario::factory()->has(Configuracion::factory())->has(Permiso::factory())->create();  //Return Model object
            
            //Generar un numero de seguidores random entre un rango
            $noSeguidoresPorEmpresa = rand($noMinMaxSeguidosPorEmpresa[0], $noMinMaxSeguidosPorEmpresa[1]);

            //Declarar seguidores con configuracion y para usar como factory
            $seguidores = Usuario::factory($noSeguidoresPorEmpresa)->has(Configuracion::factory())->has(Permiso::factory()); //Return factory object

            //Declara la empresa
            Empresa::factory()->for(
                $dueño
            )->has(
                $seguidores
            )->create();
            
        }
        
        //Nuestros usuarios
        $dueñoIngenia = Usuario::factory()->has(Configuracion::factory())->has(Permiso::factory())->create([
            "correo" => 'jesus.ruiz@ingeniasi.com',
            "nombres" => 'Jesus Belizario',
            "apellidos" => 'Ruiz Murillo',
            "tipo" => 'Dueño'
        ]);

        Usuario::factory()->has(Configuracion::factory())->has(Permiso::factory())->create([
            "correo" => 'ana.alvarez@ingeniasi.com',
            "nombres" => 'Ana Cecilia',
            "apellidos" => 'Alvarez Ortega',
            "tipo" => 'Cliente',
            "origen" => 'IngeniaSI'
        ]);

        Usuario::factory()->has(Configuracion::factory())->has(Permiso::factory())->create([
            "correo" => 'cuahutemoc.aguilar@ingeniasi.com',
            "nombres" => 'Cuautemoc',
            "apellidos" => 'Aguilar',
            "tipo" => 'Cliente',
        ]);

        Usuario::factory()->has(Configuracion::factory())->has(Permiso::factory())->create([
            "correo" => 'emilio.mendoza@ingeniasi.com',
            "nombres" => 'Carlos Emilio',
            "apellidos" => 'Mendoza Sarmiento',
            "tipo" => 'Cliente',
            "origen" => 'IngeniaSI'
        ]);

        Empresa::factory()->for(
            $dueñoIngenia
        )->has(
            $seguidores
        )->create([
            'razonSocial' => 'IngeniaSI',
            'usuario_id' => $dueñoIngenia->id
        ]);


    }
}

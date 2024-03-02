<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\catalogoDato;
use App\Models\Configuracion;
use App\Models\Empresa;
use App\Models\grupoDato;
use App\Models\Permiso;
use App\Models\seguimiento;
use App\Models\servicio;
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
        $noEmpresas = 10;
        $noMinMaxSeguidosPorEmpresa = [0, 10];
        for ($i=0; $i < $noEmpresas; $i++) {

            $dueño = Usuario::factory()->create([
                "tipo" => 'Dueño',
                'origen' => 'Registro nuevo'
            ]);
            $Empresa = Empresa::factory()->for(
                $dueño
            )->create();
            $noSeguidoresPorEmpresa = rand($noMinMaxSeguidosPorEmpresa[0], $noMinMaxSeguidosPorEmpresa[1]);
            $seguidores = Usuario::factory($noSeguidoresPorEmpresa)->create();
            echo 'Id Dueño: ' . $dueño->id . ",EMPRESA CAMBIO \n";
            foreach ($seguidores as $seguidor) {
                echo 'Id Dueño: ' . $dueño->id . ', Id seguidor: ' . $seguidor->id . "\n";
                $relacion = new seguimiento([
                    'usuario_id' => $seguidor->id,
                    'empresa_id' => $Empresa->id
                ]);
                $relacion->save();
            }
        }

        //Nuestros usuarios
        $dueñoIngenia = Usuario::factory()->create([
            "correo" => 'jesus.ruiz@ingeniasi.com',
            "nombres" => 'Jesus Belizario',
            "apellidos" => 'Ruiz Murillo',
            "tipo" => 'Dueño'
        ]);

        Usuario::factory()->create([
            "correo" => 'ana.alvarez@ingeniasi.com',
            "nombres" => 'Ana Cecilia',
            "apellidos" => 'Alvarez Ortega',
            "tipo" => 'Cliente',
            "origen" => 'IngeniaSI'
        ]);
        Usuario::factory()->create([
            "correo" => 'hector.galvan@ingeniasi.com',
            "nombres" => 'Hector',
            "apellidos" => 'Galvan',
            "tipo" => 'Cliente',
            "origen" => 'IngeniaSI'
        ]);

        Usuario::factory()->create([
            "correo" => 'cuahutemoc.aguilar@ingeniasi.com',
            "nombres" => 'Cuautemoc',
            "apellidos" => 'Aguilar',
            "tipo" => 'Cliente',
        ]);

        Usuario::factory()->create([
            "correo" => 'emilio.mendoza@ingeniasi.com',
            "nombres" => 'Carlos Emilio',
            "apellidos" => 'Mendoza Sarmiento',
            "tipo" => 'Cliente',
            "origen" => 'IngeniaSI'
        ]);

        Empresa::factory()->for(
            $dueñoIngenia
        )->create([
            'razonSocial' => 'IngeniaSI',
            'usuario_id' => $dueñoIngenia->id
        ]);

        $categoriaGeneral = grupoDato::create([
            'nombre' => 'Datos Generales'
        ]);

        $categoriaDomicilio = grupoDato::create([
            'nombre' => 'Datos de Domicilio'
        ]);

        $categoriaBancaria = grupoDato::create([
            'nombre' => 'Datos Bancarios'
        ]);



        $datoNuevo = catalogoDato::create([
            'grupo_dato_id' => $categoriaGeneral->id,
            'campoValor' => 'nombres',
            'tipoDato' => 'string',
        ]);
        $datoNuevo = catalogoDato::create([
            'grupo_dato_id' => $categoriaGeneral->id,
            'campoValor' => 'apellidos',
            'tipoDato' => 'string',
        ]);
        $datoNuevo = catalogoDato::create([
            'grupo_dato_id' => $categoriaGeneral->id,
            'campoValor' => 'telefono',
            'tipoDato' => 'string',
        ]);
        $datoNuevo = catalogoDato::create([
            'grupo_dato_id' => $categoriaGeneral->id,
            'campoValor' => 'correo',
            'tipoDato' => 'string',
        ]);
        $datoNuevo = catalogoDato::create([
            'grupo_dato_id' => $categoriaGeneral->id,
            'campoValor' => 'genero',
            'tipoDato' => 'string',
        ]);
        $datoNuevo = catalogoDato::create([
            'grupo_dato_id' => $categoriaGeneral->id,
            'campoValor' => 'cumpleanios',
            'tipoDato' => 'dateTime',
            'opcional' => true
        ]);

        $datoNuevo = catalogoDato::create([
            'grupo_dato_id' => $categoriaDomicilio->id,
            'campoValor' => 'calle',
            'tipoDato' => 'string',
        ]);
        $datoNuevo = catalogoDato::create([
            'grupo_dato_id' => $categoriaDomicilio->id,
            'campoValor' => 'numero exterior',
            'tipoDato' => 'int',
        ]);
        $datoNuevo = catalogoDato::create([
            'grupo_dato_id' => $categoriaDomicilio->id,
            'campoValor' => 'referencia',
            'tipoDato' => 'string',
            'opcional' => true
        ]);
        $datoNuevo = catalogoDato::create([
            'grupo_dato_id' => $categoriaDomicilio->id,
            'campoValor' => 'colonia',
            'tipoDato' => 'string',
        ]);
        $datoNuevo = catalogoDato::create([
            'grupo_dato_id' => $categoriaDomicilio->id,
            'campoValor' => 'codigo postal',
            'tipoDato' => 'int',
        ]);
        $datoNuevo = catalogoDato::create([
            'grupo_dato_id' => $categoriaDomicilio->id,
            'campoValor' => 'ciudad',
            'tipoDato' => 'string',
        ]);
        $datoNuevo = catalogoDato::create([
            'grupo_dato_id' => $categoriaDomicilio->id,
            'campoValor' => 'estado',
            'tipoDato' => 'string',
        ]);
        $datoNuevo = catalogoDato::create([
            'grupo_dato_id' => $categoriaDomicilio->id,
            'campoValor' => 'pais',
            'tipoDato' => 'string',
        ]);

        $datoNuevo = catalogoDato::create([
            'grupo_dato_id' => $categoriaBancaria->id,
            'campoValor' => 'clave',
            'tipoDato' => 'string',
            'opcional' => true
        ]);
        $datoNuevo = catalogoDato::create([
            'grupo_dato_id' => $categoriaBancaria->id,
            'campoValor' => 'numero de tarjeta',
            'tipoDato' => 'string',
        ]);
        $datoNuevo = catalogoDato::create([
            'grupo_dato_id' => $categoriaBancaria->id,
            'campoValor' => 'banco',
            'tipoDato' => 'string',
        ]);
        $datoNuevo = catalogoDato::create([
            'grupo_dato_id' => $categoriaBancaria->id,
            'campoValor' => 'nombre propietario',
            'tipoDato' => 'string',
            'opcional' => true
        ]);
    }
}

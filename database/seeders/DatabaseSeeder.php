<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\catalogoDato;
use App\Models\Configuracion;
use App\Models\datoGuardado;
use App\Models\Empresa;
use App\Models\grupoDato;
use App\Models\Permiso;
use App\Models\seguimiento;
use App\Models\servicio;
use App\Models\Usuario;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $noEmpresas = 10;
        // $noMinMaxSeguidosPorEmpresa = [0, 10];
        // for ($i=0; $i < $noEmpresas; $i++) {

        //     $dueño = Usuario::factory()->create([
        //         "tipo" => 'Dueño',
        //         'origen' => 'Registro nuevo'
        //     ]);
        //     $Empresa = Empresa::factory()->for(
        //         $dueño
        //     )->create();
        //     $noSeguidoresPorEmpresa = rand($noMinMaxSeguidosPorEmpresa[0], $noMinMaxSeguidosPorEmpresa[1]);
        //     $seguidores = Usuario::factory($noSeguidoresPorEmpresa)->create();
        //     echo 'Id Dueño: ' . $dueño->id . ",EMPRESA CAMBIO \n";
        //     foreach ($seguidores as $seguidor) {
        //         echo 'Id Dueño: ' . $dueño->id . ', Id seguidor: ' . $seguidor->id . "\n";
        //         $relacion = new seguimiento([
        //             'usuario_id' => $seguidor->id,
        //             'empresa_id' => $Empresa->id
        //         ]);
        //         $relacion->save();
        //     }
        // }

        //Nuestros usuarios
        $dueñoIngenia = Usuario::factory()->create([
            "correo" => 'jesus.ruiz@ingeniasi.com',
            "nombres" => 'Jesus Belizario',
            "apellidos" => 'Ruiz Murillo',
            "tipo" => 'Dueño'
        ]);

        $usuario = Usuario::factory()->create([
            "correo" => 'emilio.mendoza@ingeniasi.com',
            "nombres" => 'Carlos Emilio',
            "apellidos" => 'Mendoza Sarmiento',
            "tipo" => 'Cliente',
            "origen" => 'IngeniaSI'
        ]);
        Log::info($dueñoIngenia);
        Log::info($usuario);

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

        $datoNombres = catalogoDato::create([
            'grupo_dato_id' => $categoriaGeneral->id,
            'campoValor' => 'nombres',
            'tipoDato' => 'string',
        ]);
        $datoApellidos = catalogoDato::create([
            'grupo_dato_id' => $categoriaGeneral->id,
            'campoValor' => 'apellidos',
            'tipoDato' => 'string',
        ]);
        $datoTelefono = catalogoDato::create([
            'grupo_dato_id' => $categoriaGeneral->id,
            'campoValor' => 'telefono',
            'tipoDato' => 'string',
        ]);
        $datoCorreo = catalogoDato::create([
            'grupo_dato_id' => $categoriaGeneral->id,
            'campoValor' => 'correo',
            'tipoDato' => 'string',
        ]);
        $datoGenero = catalogoDato::create([
            'grupo_dato_id' => $categoriaGeneral->id,
            'campoValor' => 'genero',
            'tipoDato' => 'string',
        ]);
        $datoCumpleanios = catalogoDato::create([
            'grupo_dato_id' => $categoriaGeneral->id,
            'campoValor' => 'cumpleanios',
            'tipoDato' => 'dateTime',
            'opcional' => true
        ]);

        $datoCalle = catalogoDato::create([
            'grupo_dato_id' => $categoriaDomicilio->id,
            'campoValor' => 'calle',
            'tipoDato' => 'string',
        ]);
        $datoNumeroExterior = catalogoDato::create([
            'grupo_dato_id' => $categoriaDomicilio->id,
            'campoValor' => 'numero exterior',
            'tipoDato' => 'int',
        ]);
        $datoReferencia = catalogoDato::create([
            'grupo_dato_id' => $categoriaDomicilio->id,
            'campoValor' => 'referencia',
            'tipoDato' => 'string',
            'opcional' => true
        ]);
        $datoColonia = catalogoDato::create([
            'grupo_dato_id' => $categoriaDomicilio->id,
            'campoValor' => 'colonia',
            'tipoDato' => 'string',
        ]);
        $datoCodigoPostal = catalogoDato::create([
            'grupo_dato_id' => $categoriaDomicilio->id,
            'campoValor' => 'codigo postal',
            'tipoDato' => 'int',
        ]);
        $datoCiudad = catalogoDato::create([
            'grupo_dato_id' => $categoriaDomicilio->id,
            'campoValor' => 'ciudad',
            'tipoDato' => 'string',
        ]);
        $datoEstado = catalogoDato::create([
            'grupo_dato_id' => $categoriaDomicilio->id,
            'campoValor' => 'estado',
            'tipoDato' => 'string',
        ]);
        $datoPais = catalogoDato::create([
            'grupo_dato_id' => $categoriaDomicilio->id,
            'campoValor' => 'pais',
            'tipoDato' => 'string',
        ]);

        $datoClave = catalogoDato::create([
            'grupo_dato_id' => $categoriaBancaria->id,
            'campoValor' => 'clave',
            'tipoDato' => 'string',
            'opcional' => true
        ]);
        $datoNumeroTarjeta = catalogoDato::create([
            'grupo_dato_id' => $categoriaBancaria->id,
            'campoValor' => 'numero de tarjeta',
            'tipoDato' => 'string',
        ]);
        $datoBanco = catalogoDato::create([
            'grupo_dato_id' => $categoriaBancaria->id,
            'campoValor' => 'banco',
            'tipoDato' => 'string',
        ]);
        $datoNombrePropietario = catalogoDato::create([
            'grupo_dato_id' => $categoriaBancaria->id,
            'campoValor' => 'nombre propietario',
            'tipoDato' => 'string',
            'opcional' => true
        ]);



        datoGuardado::create([
            'valor' => $dueñoIngenia->nombres,
            'usuario_id' => $dueñoIngenia->id,
            'catalogo_dato_id' => $datoNombres->id
        ]);
        datoGuardado::create([
            'valor' => $dueñoIngenia->apellidos,
            'usuario_id' => $dueñoIngenia->id,
            'catalogo_dato_id' => $datoApellidos->id
        ]);
        datoGuardado::create([
            'valor' => $dueñoIngenia->telefono,
            'usuario_id' => $dueñoIngenia->id,
            'catalogo_dato_id' => $datoTelefono->id
        ]);
        datoGuardado::create([
            'valor' => $dueñoIngenia->correo,
            'usuario_id' => $dueñoIngenia->id,
            'catalogo_dato_id' => $datoCorreo->id
        ]);
        datoGuardado::create([
            'valor' => $dueñoIngenia->cumpleanios,
            'usuario_id' => $dueñoIngenia->id,
            'catalogo_dato_id' => $datoCumpleanios->id
        ]);



        datoGuardado::create([
            'valor' => $usuario->nombres,
            'usuario_id' => $usuario->id,
            'catalogo_dato_id' => $datoNombres->id
        ]);
        datoGuardado::create([
            'valor' => $usuario->apellidos,
            'usuario_id' => $usuario->id,
            'catalogo_dato_id' => $datoApellidos->id
        ]);
        datoGuardado::create([
            'valor' => $usuario->telefono,
            'usuario_id' => $usuario->id,
            'catalogo_dato_id' => $datoTelefono->id
        ]);
        datoGuardado::create([
            'valor' => $usuario->correo,
            'usuario_id' => $usuario->id,
            'catalogo_dato_id' => $datoCorreo->id
        ]);
        datoGuardado::create([
            'valor' => $usuario->cumpleanios,
            'usuario_id' => $usuario->id,
            'catalogo_dato_id' => $datoCumpleanios->id
        ]);
    }
}

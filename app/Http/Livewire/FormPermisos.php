<?php

namespace App\Http\Livewire;

use App\Models\Empresa;
use App\Models\Usuario;
use Livewire\Component;
use Livewire\Livewire;

class FormPermisos extends Component
{
    public $cambio = "";
    public $empresas;
    public $datosPersonales = "";
    public $datosFiscales = "";
    public $datosDomicilio = "";
    public $datosBancarios = "";
    public $comboboxEmpresa = "";
    public $mensaje = "";

    public function cargarPermisos($cambio)
    {
        $this->datosPersonales ="";
        $this->datosFiscales ="";
        $this->datosDomicilio ="";
        $this->datosBancarios ="";
        $this->cambio = $cambio;
        $usuario = Usuario::find(session('usuario')->id);
        if($cambio > 0){
            if($usuario->empresas[$cambio - 1]->pivot->datosPersonales == 1){
                $this->datosPersonales = 'checked';
            }
            if($usuario->empresas[$cambio - 1]->pivot->datosFiscales == 1){
                $this->datosFiscales = 'checked';
            }
            if($usuario->empresas[$cambio - 1]->pivot->datosDomicilio == 1){
                $this->datosDomicilio = 'checked';
            }
            if($usuario->empresas[$cambio - 1]->pivot->datosBancarios == 1){
                $this->datosBancarios = 'checked';
            }
        }
        else{
            $this->datosPersonales ="";
            $this->datosFiscales ="";
            $this->datosDomicilio ="";
            $this->datosBancarios ="";
        }
    }

    public function submit()
    {
        
        $usuario = Usuario::find(session('usuario')->id);
        $this->mensaje = $usuario->empresas[0]->pivot;

        //PENDIENTE COMO OBTENER EL TOKEN MEDIANTE LIVEWIRE Y ENVIARLO POR ESTE REQUEST
        $postdata = http_build_query(
            array(
                'usuario_id' => $usuario->id,
                'empresa_id' => $usuario->empresas[intval($this->cambio) - 1]->id,
                'cbPersonales' =>  $this->datosPersonales,
                'cbFiscales' => $this->datosFiscales,
                'cbDomicilio' => $this->datosDomicilio,
                'cbBancarios' => $this->datosBancarios
            )
        );
        
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-Type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );
        
        $context  = stream_context_create($opts);
        
        $result = file_get_contents(route('permisos.change'), false, $context);
        $this->mensaje = $result;
    }

    public function mount($empresasSiguiendo)
    {
        $this->empresas = $empresasSiguiendo;
    }

    public function render()
    {
        return view('livewire.form-permisos');
    }
}

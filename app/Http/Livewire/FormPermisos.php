<?php

namespace App\Http\Livewire;

use App\Models\Empresa;
use App\Models\Usuario;
use Livewire\Component;

class FormPermisos extends Component
{
    public $cambio = "";
    public $empresas;
    public $datosPersonales ="";
    public $datosFiscales ="";
    public $datosDomicilio ="";
    public $datosBancarios ="";

    public function cargarPermisos($cambio)
    {
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

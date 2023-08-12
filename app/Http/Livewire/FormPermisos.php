<?php

namespace App\Http\Livewire;

use App\Models\Empresa;
use App\Models\Usuario;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Livewire;

class FormPermisos extends Component
{
    public $empresas;
    public $datosPersonales = "";
    public $datosFiscales = "";
    public $datosDomicilio = "";
    public $datosBancarios = "";
    public $comboboxEmpresa = "";
    public $mensaje = "";
    public $token;
    public $index = -1;

    public function mount($empresasSiguiendo)
    {
        $this->empresas = $empresasSiguiendo;
    }

    public function render()
    {
        return view('livewire.form-permisos');
    }

    public function updatedcomboboxEmpresa(){
        $this->datosPersonales ="";
        $this->datosFiscales ="";
        $this->datosDomicilio ="";
        $this->datosBancarios ="";
        $usuario = Usuario::find(session('usuario')->id);
        $this->index = -1;
        for ($i=0; $i < count($usuario->empresas); $i++) {
            if($this->comboboxEmpresa == $usuario->empresas[$i]->id){
                $this->index = $i;
            }
        }

        if($this->index >= 0){
            if($usuario->empresas[$this->index]->pivot->datosPersonales == 1){
                $this->datosPersonales = 'checked';
            }
            if($usuario->empresas[$this->index]->pivot->datosFiscales == 1){
                $this->datosFiscales = 'checked';
            }
            if($usuario->empresas[$this->index]->pivot->datosDomicilio == 1){
                $this->datosDomicilio = 'checked';
            }
            if($usuario->empresas[$this->index]->pivot->datosBancarios == 1){
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
        if($this->index >= 0){
            $usuario = Usuario::find(session('usuario')->id);
            if($this->datosPersonales == 'checked'){
                $usuario->empresas[$this->index]->pivot->datosPersonales = 1;
            }
            else{
                $usuario->empresas[$this->index]->pivot->datosPersonales = 0;
            }
            if($this->datosFiscales == 'checked'){
                $usuario->empresas[$this->index]->pivot->datosFiscales = 1;
            }
            else{
                $usuario->empresas[$this->index]->pivot->datosFiscales = 0;
            }
            if($this->datosDomicilio == 'checked'){
                $usuario->empresas[$this->index]->pivot->datosDomicilio = 1;
            }
            else{
                $usuario->empresas[$this->index]->pivot->datosDomicilio = 0;
            }
            if($this->datosBancarios == 'checked'){
                $usuario->empresas[$this->index]->pivot->datosBancarios = 1;
            }
            else{
                $usuario->empresas[$this->index]->pivot->datosBancarios = 0;
            }
            $usuario->empresas[$this->index]->pivot->save();
            $this->emit('mensajeExito');
        }
    }
}

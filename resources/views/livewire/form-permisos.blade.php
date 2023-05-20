<div>
    <form action="{{route('permisos.change')}}" class="" method="post" id="formPermisos" wire:model>
        <div class="col-9 mx-auto mt-3 d-flex">
            <span class="fs-4">Permitir a la empresa: </span>
            <select id="cBox" class="form-select w-25 form-select-lg mb-3 mx-3" aria-label=".form-select-lg example" 
            name="empresaSelect" wire:change="cargarPermisos(document.getElementById('cBox').selectedIndex)">
                <option selected>Selecciona una empresa</option>
                @foreach ($empresas as $e)
                    <option value="{{$e->id}}">{{$e->razonSocial}}</option>
                @endforeach
            </select>
            <span class="fs-4"> los siguientes datos</span>
        </div>
        <div class="border p-4 m-2 col-9 mx-auto">
            @csrf
            <Span class="fs-4">Compartir...</Span>
            <div>
                <div class="d-flex justify-content-center">
                    <label class="container col-auto mx-1">Datos personales
                        <input type="checkbox" id="cbDatosPersonal" name="cbDPersonal" {{$datosPersonales}}>
                        <span class="checkmark mt-1"></span>
                    </label>
                    <label class="container col-auto mx-1">Datos fiscales
                        <input type="checkbox" id="cbDatosFiscal" name="cbDFiscal" {{$datosFiscales}}>
                        <span class="checkmark mt-1"></span>
                    </label>
                    <label class="container col-auto mx-1">Datos de domicilio
                        <input type="checkbox" id="cbDatosDomicilio" name="cbDDomicilio" {{$datosDomicilio}}>
                        <span class="checkmark mt-1"></span>
                    </label>
                    <label class="container col-auto mx-1">Datos bancarios
                        <input type="checkbox" id="cbDatosBancario" name="cbDBancario" {{$datosBancarios}}>
                        <span class="checkmark mt-1"></span>
                    </label>
                </div>
            </div>
            <div class="text-center mt-5">
                <input type="submit" class="col-auto btn btn-primary fw-bold border border-dark" id="btnPermisos" value="Cambiar permisos">
            </div>
        </div>
    </form>
</div>

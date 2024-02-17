@extends('plantillas.PlantillaSession')
@section('tituloSession', 'Permisos')
@section('cuerpoSession')
    <main>
        <section class="col-7 mx-auto mt-3">
            <h4 class="fs-3 fw-bold">Administrar mis permisos</h4>
            <h4 class="fw-bold">Seleccione el <span class="fw-bold">negocio</span> para administrar los permisos:</h4>
            {{-- SELECT PARA ESCOGER UN NEGOCIO A GESTIONAR --}}
            <div class="d-flex justify-content-between">
                <select name="" id="" class="form-control mb-3">
                    <option value="">Seleccione un negocio</option>
                </select>
                <button class="btn btn-primary fw-bold">Guardar cambios</button>
            </div>
            {{-- TABLA PARA GESTIONAR LOS PERMISOS --}}
            <table id="gestorPermisosDatos" class="w-100 bg-primary bg-opacity-50 mx-auto mt-3 rounded rounded-3">
                <thead>
                    <tr class="bg-primary bg-opacity-75">
                        <th class="py-3 text-center">
                            <input class="form-check-input fs-3" type="checkbox" value="" id="flexCheckDefault">
                        </th>
                        <th class="py-3 text-center fw-bold">Modulo de datos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-bottom">
                        <td class="py-4 text-center">
                            <input class="form-check-input fs-3" type="checkbox" value="" id="flexCheckDefault">
                        </td>
                        <td class="py-4 text-center fw-bold">Datos generales</td>
                    </tr>
                    <tr class="border-bottom">
                        <td class="py-4 text-center">
                            <input class="form-check-input fs-3" type="checkbox" value="" id="flexCheckDefault">
                        </td>
                        <td class="py-4 text-center fw-bold">Datos domicilio</td>
                    </tr>
                    <tr class="border-bottom">
                        <td class="py-4 text-center">
                            <input class="form-check-input fs-3" type="checkbox" value="" id="flexCheckDefault">
                        </td>
                        <td class="py-4 text-center fw-bold">Datos bancarios</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
@endsection
@push('scripts')
    <script>
        var tabla;
        // INICIARLAR LA TABLA
        $(document).ready(function () {
            tabla = $('#gestorPermisosDatos').DataTable({
                "ordering": false,
                "lengthChange": false,
                "pageLength": 10,
                "dom":"lrtip"
            });
        });

        
    </script>
@endpush

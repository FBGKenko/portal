@extends('plantillas.plantillaMain')
@section('titulo')
    Seguidores
@endsection
@section('cuerpo')
    <header class="clearfix border p-2">
        <x-menu></x-menu>
    </header>
    <main>
        <div class="d-flex justify-content-around">
            <h3><strong>Empresa: </strong>{{$empresa->razonSocial}}</h3>
            @if(count($empresa->usuarios) > 0)
                <h3><strong>Seguidores: </strong>{{count($empresa->usuarios)}}</h3>
            @else
                <h3><strong>Seguidores: </strong>0</h3>
            @endif
        </div>
            <table class="w-75 mx-auto mt-3 rounded rounded-3">
                <tbody>
                    <tr class="bg-success bg-opacity-75">
                        <th class="py-3 text-center">Nombre completo</th>
                        <th class="py-3 text-center">Telefono</th>
                        <th class="py-3 text-center">Correo</th>
                        <th class="py-3 text-center">Fecha de nacimiento</th>
                        <th class="py-3 text-center">Estado</th>
                    </tr>
                    @foreach ($seguidores as $u)
                        @if ($u->datosPrivados == 'N')
                            <tr class="border-bottom bg-success bg-opacity-50">
                                <td class="py-4 text-center fw-bold">{{$u->nombres.' '.$u->apellidos}}</td>
                                <td class="py-4 text-center">{{$u->telefono}}</td>
                                <td class="py-4 text-center">{{$u->correo}}</td>
                                <td class="py-4 text-center">{{$u->cumpleanios}}</td>
                                @if ($u->origen == $empresa->razonSocial)
                                    <td class="py-4 text-center">Cliente registrado</td>
                                @else
                                    <td class="py-4 text-center">Seguidor</td>
                                @endif
                            </tr>    
                        @else
                            @if ($u->origen == $empresa->razonSocial)
                                <tr class="border-bottom bg-danger bg-opacity-50">
                                    <td class="py-3 text-center fw-bold">
                                        <p>{{$u->nombres.' '.$u->apellidos}}</p>
                                        <div class="d-flex justify-content-center">
                                            <i class="fa fa-warning pe-1" style="font-size:18px;color:red"></i>
                                            <p><small>Este cliente solicito no utilizar sus datos</small></p>
                                        </div>
                                    </td>
                                    <td class="py-4 text-center">{{$u->telefono}}</td>
                                    <td class="py-4 text-center">{{$u->correo}}</td>
                                    <td class="py-4 text-center">- - -</td>
                                    <td class="py-4 text-center">Cliente registrado</td>
                                </tr>  
                            @endif
                        @endif
                    @endforeach
                    @if (count($empresa->usuarios) == 0 && count($seguidores) == 0)
                        <tr>
                            <td colspan=99>No tienes ningun seguidor.</td>
                        </tr>
                    @endif  
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{$seguidores->links()}}
        </div>
    </main>
@endsection
@section('scripts')
    <script src="js\principal.js"></script>
    <script>
    function openLeftMenu() {
        document.getElementById("leftMenu").style.display = "block";
    }

    function closeLeftMenu() {
        document.getElementById("leftMenu").style.display = "none";
    }
    </script>
@endsection

    


       

</body>
</html>
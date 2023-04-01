@extends('plantillas.plantillaMain')
@section('titulo')
    Principal
@endsection
@section('cuerpo')
<header class="clearfix border p-2">
    <x-menu></x-menu>
</header>
<main>
    <table class="w-75 bg-success bg-opacity-50 mx-auto mt-3 rounded rounded-3">
        <tbody>
            <tr class="bg-success bg-opacity-75">
            <th class="py-3 text-center">Compañia</th>
            <th class="py-3 text-center">Telefono</th>
            <th class="py-3 text-center">Correo</th>
            <th class="py-3 text-center">Pagina web</th>
            <th class="py-3 text-center">Acción</th>
            </tr>
            @for ($i = 0; $i < count($empresas); $i++)
                <tr class="border-bottom">
                    <td id="linkSeguir{{$i + 1}}" name="{{route('mainFollow')}}" class="py-4 text-center fw-bold">{{$empresas[$i]->razonSocial}}</td>
                    <td id="linkNoSeguir{{$i + 1}}" name="{{route('mainUnFollow')}}" class="py-4 text-center">{{$empresas[$i]->telefonoEmpresa}}</td>
                    <td class="py-4 text-center">{{$empresas[$i]->correoEmpresa}}</td>
                    <td class="py-4 text-center">{{$empresas[$i]->paginaWeb}}</td>
                    @if ($empresas[$i]->status == 'siguiendo')
                        <td class="py-3 text-center">
                            <button id="btnSeguir{{$i + 1}}" class="btn bg-success bg-gradient text-white" value="{{$empresas[$i]->id}}">Siguiendo</button>
                        </td>             
                    @else
                        <td class="py-3 text-center">
                            <button id="btnSeguir{{$i + 1}}" class="btn bg-success bg-opacity-75 bg-gradient text-white" value="{{$empresas[$i]->id}}">Seguir</button>
                        </td>                 
                    @endif
                </tr>   
            @endfor
            @if (count($empresas) == 0)
                <tr>
                    <td colspan=99>No hay empresas registradas.</td>
                </tr>
            @endif  
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{$empresas->links()}}
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


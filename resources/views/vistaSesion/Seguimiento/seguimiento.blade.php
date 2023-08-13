@extends('plantillas.PlantillaSession')
@section('tituloSession', 'Seguimiento')
@section('cuerpoSession')
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
                    <td class="py-3 text-center">
                        <a href="{{route('verEmpresaPerfil', $empresas[$i]->razonSocial)}}">
                            <button id="btnPerfil{{$i + 1}}" class="btn bg-success bg-opacity-75 bg-gradient text-white" value="{{$empresas[$i]->id}}">ver perfil</button>
                        </a>
                        @if ($empresas[$i]->status == 'siguiendo')

                            <button id="btnSeguir{{$i + 1}}" class="btn bg-primary bg-gradient text-white" value="{{$empresas[$i]->id}}">Siguiendo</button>
                        @else
                            <button id="btnSeguir{{$i + 1}}" class="btn bg-success bg-opacity-75 bg-gradient text-white" value="{{$empresas[$i]->id}}">Seguir</button>
                        @endif
                    </td>
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
@section('scriptsSession')
    <script src="/js/principal.js"></script>
@endsection


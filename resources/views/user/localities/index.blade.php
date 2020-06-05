@extends('plantillas.adminApp')
@section('main')
<div class="col-my-5 mt-5 table-bordered">
    <div class="row justify-content-center">
        <br><br>
        <h2 class="">Localidades</h2>
    </div>
    @if(session('saveLocality'))
    <div class="row justify-content-center">
        <div class="alert alert-success">
            {{session('saveLocality')}}
        </div>
    </div>
    @endif
    @if(session('deleteLocality'))
    <div class="row justify-content-center">
        <div class="alert alert-danger">
            {{session('deleteLocality')}}
        </div>
    </div>
    @endif
    @if(session('updateLocality'))
    <div class="row justify-content-center">
        <div class="alert alert-primary">
            {{session('updateLocality')}}
        </div>
    </div>
    @endif
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Clave</th>
                <th scope="col">Numero</th>
                <th scope="col">Nombre de la localidad</th>
                <th scope="col">Municipio</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($localities as $locality)
            <tr>
                <th scope="row">{{$locality->id}}</th>
                <td>{{$locality->keyLocality}}</td>
                <td>{{$locality->nameLocality}}</td>
                <td>{{$locality->municipality->nameMunicipality}}</td>
                <td>
                    <div class="row justify-content-center">
                        <a class="btn btn-primary" href="{{url('/locality/'.$locality->id.'/edit')}}">Editar</a>
                        <form method="post" action="{{url('/locality/'.$locality->id)}}">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Esta seguro que quiere eliminar la localidad?');">Borrar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

    <div class="row">
        <div class="col-sm">
            {{ $localities->links() }}
        </div>
        <div class="col-sm">
            <a class="btn btn-success float-right" href="{{url('/locality/create')}}">Crear Localidad</a>
        </div>
    </div>

</div>
@endsection
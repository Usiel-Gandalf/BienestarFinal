@extends('plantillas.adminApp')
@section('main')
<div class="col-my-5 mt-5 table-bordered">
    <div class="row justify-content-center">
        <br><br>
        <h2 class="">Municipios</h2>
    </div>
    @if(session('saveMunicipality'))
    <div class="row justify-content-center">
        <div class="alert alert-success">
            {{session('saveMunicipality')}}
        </div>
    </div>
    @endif
    @if(session('deleteMunicipality'))
    <div class="row justify-content-center">
        <div class="alert alert-danger">
            {{session('deleteMunicipality')}}
        </div>
    </div>
    @endif
    @if(session('updateMunicipality'))
    <div class="row justify-content-center">
        <div class="alert alert-primary">
            {{session('updateMunicipality')}}
        </div>
    </div>
    @endif
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Clave</th>
                <th scope="col">Nombre del municipio</th>
                <th scope="col">Region</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($municipalities as $municipio)
            <tr>
                <th scope="row">{{$municipio->id}}</th>
                <td>{{$municipio->nameMunicipality}}</td>
                <td>{{$municipio->region->nameRegion}}</td>
                <td>
                    <div class="row justify-content-center">
                        <a class="btn btn-primary" href="{{url('/municipality/'.$municipio->id.'/edit')}}">Editar</a>
                        <form method="post" action="{{url('/municipality/'.$municipio->id)}}">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Esta seguro que quiere eliminar el municipio?');">Borrar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

    <div class="row">
        <div class="col-sm">
            {{ $municipalities->links() }}
        </div>
        <div class="col-sm">
            <a class="btn btn-success float-right" href="{{url('/municipality/create')}}">Crear Municipio</a>
        </div>
    </div>

</div>
@endsection
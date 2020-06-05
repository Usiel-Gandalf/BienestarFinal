@extends('plantillas.adminApp')
@section('main')

<div class="col-my-5 mt-5 table-bordered">
    <div class="row justify-content-center">
        <br><br>
        <h2 class="">Regiones</h2>
    </div>
    @if(session('saveRegion'))
    <div class="row justify-content-center">
        <div class="alert alert-success">
            {{session('saveRegion')}}
        </div>
    </div>
    @endif
    @if(session('deleteRegion'))
    <div class="row justify-content-center">
        <div class="alert alert-danger">
            {{session('deleteRegion')}}
        </div>
    </div>
    @endif
    @if(session('updateRegion'))
    <div class="row justify-content-center">
        <div class="alert alert-primary">
            {{session('updateRegion')}}
        </div>
    </div>
    @endif
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Clave</th>
                <th scope="col">Numero</th>
                <th scope="col">Nombre</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($regions as $region)
            <tr>
                <th scope="row">{{$region->id}}</th>
                <td>{{$region->region}}</td>
                <td>{{$region->nameRegion}}</td>
                <td>
                    <div class="row justify-content-center">
                        <a class="btn btn-primary" href="{{url('/region/'.$region->id.'/edit')}}">Editar</a>
                        <form method="post" action="{{url('/region/'.$region->id)}}">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Esta seguro que quiere eliminar la region?');">Borrar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
    <div class="row">
        <div class="col">
            {{ $regions->links() }}
        </div>
        <div class="col">
            <a class="btn btn-success float-right" href="{{url('/region/create')}}">Crear Region</a>
        </div>
    </div>
</div>
@endsection
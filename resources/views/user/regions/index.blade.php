@extends('plantillas.adminApp')
@section('main')
<div class="row justify-content-md-center mb-4">
    <h1>Regiones</h1>
</div>
<div class="row justify-content-md-center">
    @if(session('notFound'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{session('notFound')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
</div>
<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <form action="{{route('searchRegion')}}" method="get" class="form-inline float-right">
                @csrf
                <div class="form-group">
                    <input id="id" class="form-control mx-1" type="number" name="id" placeholder="Buscar por clave">
                </div>
                <div class="form-group">
                    <input id="numberRegion" class="form-control mx-1" type="number" name="numberRegion" placeholder="Buscar por numero">
                </div>
                <div class="form-group">
                    <input id="nameRegion" class="form-control mx-1" type="text" name="nameRegion" placeholder="Buscar por nombre">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Buscar">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container table-bordered mt-2">
    <div class="row">
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
                            <a class="btn btn-primary mx-1" href="{{url('/region/'.$region->id.'/edit')}}">Editar</a>
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
    </div>
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
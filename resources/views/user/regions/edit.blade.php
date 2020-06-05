@extends('plantillas.adminApp')

@section('main')
<div class="row justify-content-center">
    <h2 class="">Editar region</h2>
</div>
<br>
<div class="col table-bordered">
<form action="{{url('/region/'.$region->id)}}" method="post">
    @csrf
    @method('PATCH')

    @error('id')
        <div class="alert alert-danger">
            Error en la clave, comprobar nuevamente(clave valida, numerico, no vacio).
        </div>
    @enderror
    @error('region')
        <div class="alert alert-danger">
            Error en el numero de la region, comprobar nuevamente(no repetido, numerico, no vacio).
        </div>
    @enderror
    @error('name')
        <div class="alert alert-danger">
            Error en el nombre, comprobar nuevamente(nombre valido, no numeros, no vacio).
        </div>
    @enderror

    <div class="form-group">
        <label for="id">{{'id'}}</label>
        <input type="number" class="form-control" name="id" id="id" value="{{$region->id}}">
    </div>

    <div class="form-group">
        <label for="region">{{'Region'}}</label>
        <input type="number" class="form-control" name="region" id="region" value="{{$region->region}}">
    </div>

    <div class="form-group">
        <label for="name">{{'Nombre'}}</label>
        <input type="text" class="form-control" name="name" id="name" value="{{$region->nameRegion}}">
    </div>

    <div class="row justify-content-center">
        <input type="submit" class="btn btn-success" value="Editar">
        <a href="{{url('/region')}}" class="btn btn-warning">Regresar</a>
    </div>
    <br>
</form>
</div>
@endsection
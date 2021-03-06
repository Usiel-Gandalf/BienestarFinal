@extends('plantillas.adminApp')
@section('main')
<div class="col table-bordered mt-2">
    <div class="row justify-content-center my-2">
        <h2 class="">Editar region</h2>
    </div>
    <form action="{{url('/region/'.$region->id)}}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="id">{{'Clave de la region'}}</label>
            <input type="number" class="form-control" name="id" id="id" value="{{$region->id}}">
        </div>
        @error('id')
        <div class="alert alert-danger">
            Error en la clave, comprobar nuevamente(clave valida, numerico, no vacio).
        </div>
        @enderror

        <div class="form-group">
            <label for="region">{{'Numero de region'}}</label>
            <input type="number" class="form-control" name="region" id="region" value="{{$region->region}}">
        </div>
        @error('region')
        <div class="alert alert-danger">
            Error en el numero de la region, comprobar nuevamente(no repetido, numerico, no vacio).
        </div>
        @enderror

        <div class="form-group">
            <label for="name">{{'Nombre'}}</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$region->nameRegion}}">
        </div>
        @error('name')
        <div class="alert alert-danger">
            Error en el nombre, comprobar nuevamente(nombre valido, no numeros, no vacio).
        </div>
        @enderror

        <div class="row justify-content-center">
            <input type="submit" class="btn btn-success mr-1" value="Editar">
            <a href="{{url('/region')}}" class="btn btn-primary">Regresar</a>
        </div>
        <br>
    </form>
</div>
@endsection
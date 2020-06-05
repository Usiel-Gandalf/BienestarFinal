@extends('plantillas.adminApp')

@section('main')
<div class="row justify-content-center">
    <h2 class="">Registrar region</h2>
</div>
<br>
<div class="col table-bordered">
    
<form action="{{url('/region')}}" method="post" enctype="multipart/form-data">
    @csrf
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
        <input type="number" class="form-control" name="id" id="id" value="{{old('id')}}">
    </div>

    <div class="form-group">
        <label for="region">{{'Numero de la region'}}</label>
        <input type="number" class="form-control" name="region" id="region" value="{{old('region')}}">
    </div>

    <div class="form-group">
        <label for="name">{{'Nombre de la region'}}</label>
        <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
    </div>

    <div class="row justify-content-center">
        <input type="submit" class="btn btn-success" value="Registrar">
        <a href="{{url('/region')}}" class="btn btn-warning">Regresar</a>
    </div>
    <br>
</form>
</div>
@endsection
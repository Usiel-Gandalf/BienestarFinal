@extends('plantillas.adminApp')
@section('main')
<div class="col table-bordered">
    <div class="row justify-content-center my-2">
        <h2 class="">Registrar region</h2>
    </div>
    <form action="{{url('/region')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="id">{{'clave de la region'}}</label>
            <input type="number" class="form-control" name="id" id="id" value="{{old('id')}}">
        </div>
        @error('id')
        <div class="alert alert-danger">
            Error en la clave, comprobar nuevamente(clave valida, numerico, no vacio).
        </div>
        @enderror

        <div class="form-group">
            <label for="region">{{'Numero de region'}}</label>
            <input type="number" class="form-control" name="region" id="region" value="{{old('region')}}">
        </div>
        @error('region')
        <div class="alert alert-danger">
            Error en el numero de la region, comprobar nuevamente(no repetido, numerico, no vacio).
        </div>
        @enderror

        <div class="form-group">
            <label for="name">{{'Nombre de la region'}}</label>
            <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
        </div>
        @error('name')
        <div class="alert alert-danger">
            Error en el nombre, comprobar nuevamente(nombre valido, no numeros, no vacio).
        </div>
        @enderror

        <div class="row justify-content-center">
            <input type="submit" class="btn btn-success mr-1" value="Registrar">
            <a href="{{url('/region')}}" class="btn btn-primary">Regresar</a>
        </div>
        <br>
    </form>
</div>
@endsection
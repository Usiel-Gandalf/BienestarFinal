@extends('plantillas.adminApp')

@section('main')
<div class="row justify-content-center">
    <h2 class="">Registrar Municipio</h2>
</div>
<br>
<div class="col table-bordered">
    
<form action="{{url('/municipality')}}" method="post" enctype="multipart/form-data">
    @csrf
    @error('id')
        <div class="alert alert-danger">
            Error en la clave, comprobar nuevamente(clave valida, numerico, no vacio).
        </div>
    @enderror
    @error('nameMunicipality')
        <div class="alert alert-danger">
            Error en el nombre del municipio, comprobar nuevamente(no repetido, no numerico, no vacio).
        </div>
    @enderror
    @error('idRegion')
        <div class="alert alert-danger">
            Eliga una region para su municipio
        </div>
    @enderror

    <div class="form-group">
        <label for="id">{{'Clave unica del municipio'}}</label>
        <input type="number" class="form-control" name="id" id="id" value="{{old('id')}}">
    </div>

    <div class="form-group">
        <label for="nameMunicipality">{{'Nombre del municipio'}}</label>
        <input type="text" class="form-control" name="nameMunicipality" id="nameMunicipality" value="{{old('nameMunicipality')}}">
    </div>

    <div class="form-group">
        <label for="idRegion"></label>
        <select id="idRegion" name="idRegion">
            <option selected>Selecciona la region perteneciente</option>
            @foreach($regions as $region)
            <option name="{{$region->id}}" value="{{$region->id}}">{{$region->nameRegion}}</option>
            @endforeach
        </select>
    </div>

    <div class="row justify-content-center">
        <input type="submit" class="btn btn-success" value="Registrar">
        <a href="{{url('/municipality')}}" class="btn btn-warning">Regresar</a>
    </div>
    <br>
</form>
</div>
@endsection
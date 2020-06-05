@extends('plantillas.adminApp')

@section('main')
<div class="row justify-content-center">
    <h2 class="">Registrar Localidad</h2>
</div>
<br>
<div class="col table-bordered">
    
<form action="{{url('/locality')}}" method="post" enctype="multipart/form-data">
    @csrf
    @error('id')
        <div class="alert alert-danger">
            Error en la clave, comprobar nuevamente(clave valida, numerico, no vacio).
        </div>
    @enderror
    @error('keyLocality')
        <div class="alert alert-danger">
            Error en la clave de la localidad, revisar nuevamente(numerico, no vacio).
        </div>
    @enderror
    @error('nameLocality')
        <div class="alert alert-danger">
            Error en el nombre de la localidad, revisar nuevamente, (nombre valido, no vacio, no numerico)
        </div>
    @enderror
    @error('idMunicipality')
        <div class="alert alert-danger">
            Seleccione un municipio
        </div>
    @enderror

    <div class="form-group">
        <label for="id">{{'Clave unica de la localidad'}}</label>
        <input type="number" class="form-control" name="id" id="id" value="{{old('id')}}">
    </div>

    <div class="form-group">
        <label for="nameMunicipality">{{'Numero de la localidad'}}</label>
        <input type="number" class="form-control" name="keyLocality" id="keyLocality" value="{{old('keyLocality')}}">
    </div>

    <div class="form-group">
        <label for="nameMunicipality">{{'Nombre de la localidad'}}</label>
        <input type="text" class="form-control" name="nameLocality" id="nameLocality" value="{{old('nameLocality')}}">
    </div>

    <div class="form-group">
        <label for="idMunicipality"></label>
        <select id="idMunicipality" name="idMunicipality">
            <option selected>Selecciona el municipio perteneciente</option>
            @foreach($municipalities as $municipality)
            <option name="{{$municipality->id}}" value="{{$municipality->id}}">{{$municipality->nameMunicipality}}</option>
            @endforeach
        </select>
    </div>

    <div class="row justify-content-center">
        <input type="submit" class="btn btn-success" value="Registrar">
        <a href="{{url('/locality')}}" class="btn btn-warning">Regresar</a>
    </div>
    <br>
</form>
</div>
@endsection
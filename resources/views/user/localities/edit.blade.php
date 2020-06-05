@extends('plantillas.adminApp')

@section('main')
<div class="row justify-content-center">
    <h2 class="">Editar Localidad</h2>
</div>
<br>
<div class="col table-bordered">
<form action="{{url('/locality/'.$locality->id)}}" method="post">
    @csrf
    @method('PATCH')

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
        <input type="number" class="form-control" name="id" id="id" value="{{$locality->id}}">
    </div>

    <div class="form-group">
        <label for="keyLocality">{{'Numero de la localidad'}}</label>
        <input type="number" class="form-control" name="keyLocality" id="keyLocality" value="{{$locality->keyLocality}}">
    </div>

    <div class="form-group">
        <label for="nameLocality">{{'Nombre de la localidad'}}</label>
        <input type="text" class="form-control" name="nameLocality" id="nameLocality" value="{{$locality->nameLocality}}">
    </div>

    <div class="form-group">
        <label for="municipality_id"></label>
        <select id="municipality_id" name="municipality_id">
            <option selected>Selecciona el municipio perteneciente</option>
            @foreach($municipalities as $municipality)
            @if($municipality->id == $locality->municipality_id)
            <option name="{{$municipality->id}}" value="{{$municipality->id}}" selected>{{$municipality->nameMunicipality}}</option>
            @endif
            @if($municipality->id !== $locality->municipality_id)
            <option name="{{$municipality->id}}" value="{{$municipality->id}}">{{$municipality->nameMunicipality}}</option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="row justify-content-center">
        <input type="submit" class="btn btn-success" value="Editar">
        <a href="{{url('/locality')}}" class="btn btn-warning">Regresar</a>
    </div>
    <br>
</form>
</div>
@endsection
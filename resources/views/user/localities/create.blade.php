@extends('plantillas.adminApp')
@section('main')
<div class="col table-bordered">
    <div class="row justify-content-center my-2">
        <h2 class="">Registrar municipio</h2>
    </div>
    <form action="{{url('/locality')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="id">{{'Clave de la localidad'}}</label>
            <input type="number" class="form-control" name="id" id="id" value="{{old('id')}}">
        </div>
        @error('id')
        <div class="alert alert-danger">
            Error en la clave, comprobar nuevamente(clave valida, numerico, no vacio).
        </div>
        @enderror

        <div class="form-group">
            <label for="keyLocality">{{'Numero de la localidad'}}</label>
            <input type="number" class="form-control" name="keyLocality" id="keyLocality" value="{{old('keyLocality')}}">
        </div>
        @error('keyLocality')
        <div class="alert alert-danger">
            Error en la clave de la localidad, revisar nuevamente(numerico, no vacio).
        </div>
        @enderror

        <div class="form-group">
            <label for="nameLocality">{{'Nombre de la localidad'}}</label>
            <input type="text" class="form-control" name="nameLocality" id="nameLocality" value="{{old('nameLocality')}}">
        </div>
        @error('nameLocality')
        <div class="alert alert-danger">
            Error en el nombre de la localidad, revisar nuevamente, (nombre valido, no vacio, no numerico)
        </div>
        @enderror

        <div class="form-group">
            <label for="idMunicipality">{{'Municipio: '}}</label>
            <select id="idMunicipality" name="idMunicipality">
                <option selected>Selecciona el municipio perteneciente</option>
                @foreach($municipalities as $municipality)
                <option name="{{$municipality->id}}" value="{{$municipality->id}}">{{$municipality->nameMunicipality}}</option>
                @endforeach
            </select>
        </div>
        @error('idMunicipality')
        <div class="alert alert-danger">
            Seleccione un municipio
        </div>
        @enderror

        <div class="row justify-content-center">
            <input type="submit" class="btn btn-success mr-1" value="Registrar">
            <a href="{{url('/locality')}}" class="btn btn-primary">Regresar</a>
        </div>
        <br>
    </form>
</div>
@endsection
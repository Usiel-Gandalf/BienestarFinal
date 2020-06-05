@extends('plantillas.adminApp')

@section('main')
<div class="row justify-content-center">
    <h2 class="">Editar Escuela</h2>
</div>
<br>
<div class="col table-bordered">
<form action="{{url('/school/'.$school->id)}}" method="post">
    @csrf
    @method('PATCH')

    @error('idSchool')
        <div class="alert alert-danger">
            Error en la clave, comprobar nuevamente(clave valida, numerico, no vacio).
        </div>
    @enderror
    @error('nameSchool')
        <div class="alert alert-danger">
            Error en el nombre de la escuela, revisar nuevamente, (nombre valido, no vacio, no numerico)
        </div>
    @enderror
    @error('idLocality')
        <div class="alert alert-danger">
            Seleccione una localidad
        </div>
    @enderror

    <div class="form-group">
        <label for="idSchool">{{'Clave unica de la escuela'}}</label>
        <input type="text" class="form-control" name="idSchool" id="idSchool" value="{{$school->idSchool}}">
    </div>

    <div class="form-group">
        <label for="nameSchool">{{'Nombre de la escuela'}}</label>
        <input type="text" class="form-control" name="nameSchool" id="nameSchool" value="{{$school->nameSchool}}">
    </div>

    <div class="form-group">
        <label for="locality_id"></label>
        <select id="locality_id" name="municipality_id">
            <option selected>Selecciona la localidad perteneciente</option>
            @foreach($localities as $locality)
            @if($locality->id == $school->locality_id)
            <option name="{{$locality->id}}" value="{{$locality->id}}" selected>{{$locality->nameLocality}}</option>
            @endif
            @if($locality->id !== $school->locality_id)
            <option name="{{$locality->id}}" value="{{$locality->id}}">{{$locality->nameLocality}}</option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="row justify-content-center">
        <input type="submit" class="btn btn-success" value="Editar">
        <a href="{{url('/school')}}" class="btn btn-warning">Regresar</a>
    </div>
    <br>
</form>
</div>
@endsection
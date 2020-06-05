@extends('plantillas.adminApp')

@section('main')
<div class="row justify-content-center">
    <h2 class="">Editar Municipio</h2>
</div>
<br>
<div class="col table-bordered">
<form action="{{url('/municipality/'.$municipality->id)}}" method="post">
    @csrf
    @method('PATCH')

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
    @error('region_id')
        <div class="alert alert-danger">
            Comprobar la region
        </div>
    @enderror

    <div class="form-group">
        <label for="id">{{'id'}}</label>
        <input type="number" class="form-control" name="id" id="id" value="{{$municipality->id}}">
    </div>

    <div class="form-group">
        <label for="nameMunicipality">{{'Municipio'}}</label>
        <input type="text" class="form-control" name="nameMunicipality" id="nameMunicipality" value="{{$municipality->nameMunicipality}}">
    </div>

    <div class="form-group">
        <label for="region_id"></label>
        <select id="region_id" name="region_id">
            <option selected>Selecciona la region perteneciente</option>
            @foreach($regions as $region)
            @if($region->id == $municipality->region_id)
            <option name="{{$region->id}}" value="{{$region->id}}" selected>{{$region->nameRegion}}</option>
            @endif
            @if($region->id !== $municipality->region_id)
            <option name="{{$region->id}}" value="{{$region->id}}">{{$region->nameRegion}}</option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="row justify-content-center">
        <input type="submit" class="btn btn-success" value="Editar">
        <a href="{{url('/municipality')}}" class="btn btn-warning">Regresar</a>
    </div>
    <br>
</form>
</div>
@endsection
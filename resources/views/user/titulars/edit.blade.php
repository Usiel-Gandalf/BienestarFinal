@extends('plantillas.adminApp')

@section('main')
<div class="main">
    <div class="row justify-content-md-center mb-4">
        <h1>Crear titular</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <form action="{{url('/titular/'.$titular->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="id">{{'Clave del/la titular'}}</label>
                        <input type="text" class="form-control" name="id" id="id" value="{{$titular->id}}">
                        @error('id')
                        <div class="alert alert-danger">
                            revisar nuevamente la clave del/la titular
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="idScholar">{{'Clave del becario que se le tiene asignado'}}</label>
                        <input type="number" class="form-control" name="idScholar" id="idScholar" value="{{$titular->idScholar}}">
                        @error('id')
                        <div class="alert alert-danger">
                            revisar nuevamente la clave del becario asignado
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nameTitular">{{'Nombre del/la titular'}}</label>
                        <input type="text" class="form-control" name="nameTitular" id="nameTitular" value="{{$titular->nameTitular}}">
                        @error('nameTitular')
                        <div class="alert alert-danger">
                            Error en el nombre del/la titular, revisar nuevamente, (nombre valido, no vacio, no numerico)
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="firstSurname">{{'Primer apellido'}}</label>
                        <input type="text" class="form-control" name="firstSurname" id="firstSurname" value="{{$titular->firstSurname}}">
                        @error('firstSurname')
                        <div class="alert alert-danger">
                            Error en el apellido paterno del/la titular, revisar nuevamente, (apellido valido, no vacio, no numerico)
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="secondSurname">{{'Segundo apellido'}}</label>
                        <input type="text" class="form-control" name="secondSurname" id="secondSurname" value="{{$titular->secondSurname}}">
                        @error('secondSurname')
                        <div class="alert alert-danger">
                            Error en el apellido materno del/la titular, revisar nuevamente, (apellido valido, no vacio, no numerico)
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="gender"></label>
                        <select id="gender" name="gender">
                            <option selected>Genero</option>
                            @if($titular->gender == 'F')
                            <option name="F" value="F" selected>Femenino</option>
                            <option name="M" value="M">Masculino</option>
                            @endif
                            @if($titular->gender == 'M')
                            <option name="M" value="M" selected>Masculino</option>
                            <option name="F" value="F">Femenino</option>
                            @endif
                        </select>
                        @error('gender')
                        <div class="alert alert-danger">
                            Seleccione un genero para el becario
                        </div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="birthDate">{{'Fecha de nacimiento(AAAA/MM/DD)'}}</label>
                            <input type="text" class="form-control" name="birthDate" id="birthDate" value="{{$titular->birthDate}}">
                            @error('birthDate')
                            <div class="alert alert-danger">
                                Ingrese la fecha del nacimiento(AAAA/MM/DD)
                            </div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="curp">{{'Curp'}}</label>
                            <input type="text" class="form-control" name="curp" id="curp" value="{{$titular->curp}}">
                            @error('curp')
                            <div class="alert alert-danger">
                                revisar nuevamente la curp
                            </div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <input type="submit" class="btn btn-success mr-1" value="Actualizar">
                        <a href="{{url('/titular')}}" class="btn btn-warning">Regresar</a>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
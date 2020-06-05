@extends('plantillas.adminApp')
@section('main')
<div class="col-my-5 mt-5 table-bordered">
    <div class="row justify-content-center">
        <br><br>
        <h2 class="">Alumnos</h2>
    </div>
    @if(session('saveScholar'))
    <div class="row justify-content-center">
        <div class="alert alert-success">
            {{session('saveScholar')}}
        </div>
    </div>
    @endif
    @if(session('deleteScholar'))
    <div class="row justify-content-center">
        <div class="alert alert-danger">
            {{session('deleteScholar')}}
        </div>
    </div>
    @endif
    @if(session('updateScholar'))
    <div class="row justify-content-center">
        <div class="alert alert-primary">
            {{session('updateScholar')}}
        </div>
    </div>
    @endif
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Curp</th>
                <th scope="col">Nombre del alumno</th>
                <th scope="col">Apellido paterno</th>
                <th scope="col">Apellido materno</th>
                <th scope="col">Genero</th>
                <th scope="col">Fecha de nacimiento</th>
                <th scope="col">clave</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($scholars as $scholar)
            <tr>
                <th scope="row">{{$scholar->curp}}</th>
                <td>{{$scholar->nameScholar}}</td>
                <td>{{$scholar->firstSurname}}</td>
                <td>{{$scholar->secondSurname}}</td>
                <td>{{$scholar->gender}}</td>
                <td>{{$scholar->birthDate}}</td>
                <td>{{$scholar->keyScholar}}</td>
                <td>
                    <div class="row justify-content-center">
                        <a class="btn btn-primary" href="{{url('/scholar/'.$scholar->id.'/edit')}}">Editar</a>
                        <form method="post" action="{{url('/scholar/'.$scholar->id)}}">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Esta seguro que quiere eliminar la escuela?');">Borrar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

    <div class="row">
        <div class="col-sm">
            {{ $scholars->links() }}
        </div>
        <div class="col-sm">
            <a class="btn btn-success float-right" href="{{url('/scholar/create')}}">Crear Becario</a>
        </div>
    </div>

</div>
@endsection
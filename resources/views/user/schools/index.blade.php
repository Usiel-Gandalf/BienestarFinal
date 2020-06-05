@extends('plantillas.adminApp')
@section('main')
<div class="col-my-5 mt-5 table-bordered">
    <div class="row justify-content-center">
        <br><br>
        <h2 class="">Escuelas</h2>
    </div>
    @if(session('saveSchool'))
    <div class="row justify-content-center">
        <div class="alert alert-success">
            {{session('saveSchool')}}
        </div>
    </div>
    @endif
    @if(session('deleteSchool'))
    <div class="row justify-content-center">
        <div class="alert alert-danger">
            {{session('deleteSchool')}}
        </div>
    </div>
    @endif
    @if(session('updateSchool'))
    <div class="row justify-content-center">
        <div class="alert alert-primary">
            {{session('updateSchool')}}
        </div>
    </div>
    @endif
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Clave</th>
                <th scope="col">Nombre de la escuela</th>
                <th scope="col">localidad</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schools as $school)
            <tr>
                <th scope="row">{{$school->idSchool}}</th>
                <td>{{$school->nameSchool}}</td>
                <td>{{ $school->locality->nameLocality }}</td>
                <td>
                    <div class="row justify-content-center">
                        <a class="btn btn-primary" href="{{url('/school/'.$school->id.'/edit')}}">Editar</a>
                        <form method="post" action="{{url('/school/'.$school->id)}}">
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
            {{ $schools->links() }}
        </div>
        <div class="col-sm">
            <a class="btn btn-success float-right" href="{{url('/school/create')}}">Crear Escuela</a>
        </div>
    </div>

</div>
@endsection
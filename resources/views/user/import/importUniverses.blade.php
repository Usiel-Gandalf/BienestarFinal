@extends('plantillas.adminApp')
@section('main')

<div class="row">
    <!-- Scholar -->
    <div class="col-sm">
        <div class="card">
            <h5 class="card-header">Alumno</h5>
            <div class="card-body">
                <h5 class="card-title">Subir y/o actualizar alumnos</h5>
                <p class="card-text">Se actualizaran o agregaran nuevos alumnos sin afectar a los ya existentes,
                    las primeras filas tienen que ser en minuscula y con la nomenclatura de los datos del estudiante.
                </p>
                <div class="col ">
                    <form action="{{route('importScholar')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        @error('scholar')
                        <div class="alert alert-danger">
                            Porfavor seleccione un archivo excel de alumnos
                        </div>
                        @enderror
                        @if(Session::has('scholarAlert'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('scholarAlert')}}
                        </div>
                        @endif
                        <div class="form-control-file">
                            <input type="file" name="scholar" id="scholar" class="btn btn-primary">
                        </div>
                        <br>
                        <div class="form-control-button">
                            <button type="submit" class="btn btn-success">Subir archivo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- EndScholar -->
</div>
@endsection
@extends('plantillas.adminApp')
@section('main')

<div class="main my-5 text-center">
    <h3>EDUCACION BASICA</h3>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Importante!</strong> Esto es solamente para registrar la pura informacion ya sea de los becarios o titulares,
  solo para llevar el control de sus informaciones personales <strong>¡Atencion!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>

<div class="row">
    <!-- Scholar -->
    <div class="col-sm">
        <div class="card">
            <h5 class="card-header">Becarios</h5>
            <div class="card-body text-center">
                <h5 class="card-title">Informacion personal</h5>
                <p class="card-text">Se agregara la informacion de los becarios
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
        <!-- Pendientes -->
        <div class="col-sm">
        <div class="card">
            <h5 class="card-header">Titulares(Educacion basica)</h5>
            <div class="card-body text-center">
                <h5 class="card-title">Informacion personal</h5>
                <p class="card-text">Se agregara la informacion de las titulares
                </p>
                <div class="col ">
                    <form action="{{route('importTitular')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        @error('titular')
                        <div class="alert alert-danger">
                            Porfavor seleccione un archivo excel de alumnos
                        </div>
                        @enderror
                        @if(Session::has('titularAlert'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('titularAlert')}}
                        </div>
                        @endif
                        <div class="form-control-file">
                            <input type="file" name="titular" id="titular" class="btn btn-primary">
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
@extends('plantillas.adminApp')
@section('main')

<div class="main my-5 text-center">
    <h3>UNIVERSOS DE ENTREGA</h3>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Importante!</strong> Seccion para subir archivo de las entregas de los avisos de cobro 
        o las remesas segun sea el caso <strong>¡Atencion!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>

<div class="row">
    <!-- Scholar -->
    <div class="col-sm">
        <div class="card">
            <h5 class="card-header">Importar entregas</h5>
            <div class="card-body text-center">
                <h5 class="card-title">Entregas</h5>
                <p class="card-text">Se agregara la informacion de las entregas
                </p>
                <div class="col ">
                    <form action="{{route('importDelivery')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        @if(Session::has('basicAlert'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('basicAlert')}}
                        </div>
                        @endif
                        @if(Session::has('mediumAlert'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('mediumAlert')}}
                        </div>
                        @endif
                        @if(Session::has('higherlert'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('higherAlert')}}
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="level"></label>
                            <select id="level" name="level" class="">
                                <option selected value="null">Nivel educativo</option>
                                <option name="1" value="1">Educacion Basica(Titulares)</option>
                                <option name="2" value="2">Educacion Media Superior</option>
                                <option name="3" value="3">Jovenes escribiendo el futuro</option>
                            </select>
                            @if(Session::has('level'))
                            <div class="alert alert-danger" role="alert">
                                {{Session::get('level')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-control-file">
                            <input type="file" name="universeDelivery" id="universeDelivery" class="btn btn-primary" required>
                        </div>
                        @error('universeDelivery')
                        <div class="alert alert-danger">
                            Porfavor seleccione un archivo excel de alumnos
                        </div>
                        @enderror
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
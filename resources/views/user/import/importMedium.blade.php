@extends('plantillas.adminApp')
@section('main')

<div class="row justify-content-md-center mb-2">
    <h1>EDUCACION MEDIA SUPERIOR</h1>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Importante!</strong> Seccion para subir los avisos de cobro para la educacion media superior, y los estados de entrega
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>

<div class="row justify-content-md-center">
    <!-- Scholar -->
    <div class="col-7">
        <div class="card">
            <h5 class="card-header">Importar entregas de educacion media superior</h5>
            <div class="card-body text-center">
                <div class="col ">
                    <form action="{{route('importMedium')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        @if(Session::has('mediumAlert'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('mediumAlert')}}
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="status">{{'Modalidad: '}}</label>
                            <select id="status" name="status" class="">
                                <option selected value="{{null}}">Modalidad</option>
                                <option name="1" value="1">Pendientes</option>
                                <option name="2" value="2">Entregados</option>
                                <option name="3" value="3">No entregado/no localizado</option>
                                <option name="4" value="4">Reexpedicion</option>
                            </select>
                            @error('status')
                            <div class="alert alert-danger" role="alert">
                                {{'Seleccione una modalidad'}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="bimester">{{'Bimestre: '}}</label>
                            <select id="bimester" name="bimester" class="">
                                <option selected value="{{null}}">Bimestre</option>
                                <option name="1" value="1">Enero-Febrero</option>
                                <option name="2" value="2">Marzo-Abril</option>
                                <option name="3" value="3">Mayo-Junio</option>
                                <option name="4" value="4">Septiembre-Octubre</option>
                                <option name="5" value="5">Noviembre-Diciembre</option>
                            </select>
                            @error('bimester')
                            <div class="alert alert-danger" role="alert">
                                {{'Seleccione una modalidad'}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="year">{{'Año: '}}</label>
                            <select id="year" name="year" class="">
                                <option value="2019">2019</option>
                                <option selected value="2020">2020</option>
                                <option value="2021">2021</option>
                            </select>
                            @error('year')
                            <div class="alert alert-danger" role="alert">
                                {{'Seleccione año'}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-control-file">
                            <input type="file" name="basicUniverse" id="basicUniverse" class="btn btn-primary" required>
                        </div>
                        @error('basicUniverse')
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
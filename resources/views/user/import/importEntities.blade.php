@extends('plantillas.adminApp')
@section('main')

<div class="main my-5 text-center">
    <h3>Subir o actualizar entidades</h3>
</div>

<div class="row">
    <!-- Region -->
    <div class="col-sm">
        <div class="card">
            <h5 class="card-header">Regiones</h5>
            <div class="card-body">
                <h5 class="card-title">Subir y/o actualizar regiones</h5>
                <p class="card-text">Se actualizaran o agregaran nuevas regiones sin afectar a los ya existentes,
                    los nombres de las columnas deben de ser, cve_reg, nom_reg, region
                </p>
                <div class="col ">
                    <form action="{{route('importRegion')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        @error('region')
                        <div class="alert alert-danger">
                            Porfavor seleccione un archivo excel de regiones
                        </div>
                        @enderror
                        @if(Session::has('regionAlert'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('regionAlert')}}
                        </div>
                        @endif
                        <div class="form-control-file">
                            <input type="file" name="region" id="region" class="btn btn-primary">
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
    <!-- EndRegion -->
    <!-- Municipality -->
    <div class="col-sm">
        <div class="card">
            <h5 class="card-header">
                Municipio
            </h5>
            <div class="card-body">
                <h5 class="card-title">Subir y/o actualizar municipio</h5>
                <p class="card-text">Se actualizaran o agregaran nuevos municipios sin afectar a los ya existentes,
                    la primera fila del excel tienen que ser los titulos de las columnas que serian: cve_mun, nom_mun e cve_reg</p>
                <div class="col ">
                    <form action="{{route('importMunicipality')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        @error('municipality')
                        <div class="alert alert-danger">
                            Porfavor seleccione un archivo excel de municipios
                        </div>
                        @enderror
                        @if(Session::has('municipalityAlert'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('municipalityAlert')}}
                        </div>
                        @endif
                        <div class="form-control-file">
                            <input type="file" name="municipality" id="municipality" class="btn btn-primary">
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
    <!-- EndMunicipality -->
</div>

<br>
<!-- School -->
<div class="row">
    <div class="col-sm">
        <div class="card">
            <h5 class="card-header">Escuela</h5>
            <div class="card-body">
                <h5 class="card-title">Subir y/o actualizar escuelas</h5>
                <p class="card-text">Se actualizaran o agregaran nuevas escuelas sin afectar a las ya existentes
                    la primera fila del excel tienen que ser los titulos de las columnas que serian: cve_esc, nom_esc e cve_loc
                </p>
                <div class="col ">
                    <form action="{{route('importSchool')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        @error('school')
                        <div class="alert alert-danger">
                            Porfavor seleccione un archivo excel de escuelas
                        </div>
                        @enderror
                        @if(Session::has('schoolAlert'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('schoolAlert')}}
                        </div>
                        @endif
                        <div class="form-control-file">
                            <input type="file" name="school" id="school" class="btn btn-primary">
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
    <!-- EndSchool -->
        <!-- Locality -->
        <div class="col-sm">
        <div class="card">
            <h5 class="card-header">Localidad</h5>
            <div class="card-body">
                <h5 class="card-title">Subir y/o actualizar localidades</h5>
                <p class="card-text">Se actualizaran o agregaran nuevas localidades sin afectar a las ya existentes
                    la primera fila del excel tienen que ser los titulos de las columnas que serian: cve_loc, key_loc, nom_loc e cve_mun
                </p>
                <div class="col ">
                    <form action="{{route('importLocality')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        @error('locality')
                        <div class="alert alert-danger">
                            Porfavor seleccione un archivo excel de localidades
                        </div>
                        @enderror
                        @if(Session::has('localityAlert'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('localityAlert')}}
                        </div>
                        @endif
                        <div class="form-control-file">
                            <input type="file" name="locality" id="locality" class="btn btn-primary">
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
</div>
<!-- EndLocality -->

@endsection
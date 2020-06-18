@extends('plantillas.adminApp')
@section('main')
<div class="main">
    <div class="row justify-content-md-center mb-4">
        <h1>Inicio de sesion</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <center> 
                <div class="col-md-5 border">
                    <form action="{{route('searchRegion')}}" method="get" class="mt-3">
                        @csrf
                        <div class="form-group">
                            <input id="id" class="form-control mx-1" type="text" name="id" placeholder="Usuario">
                        </div>
                        <div class="form-group">
                            <input id="numberRegion" class="form-control mx-1" type="text" name="numberRegion" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Iniciar sesion">
                        </div>
                    </form>
                </div>
                </center>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">

    <h1>{{$modo}} taller</h1>

    @if (count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li><strong>{{ $error }}</strong></li>
            @endforeach
        </ul>

    </div>

    @endif
    
    <div class="form-group">
        <label for="nombre">Ingrese el nombre del taller</label>
        <input class="form-control" type="text" name="nombre" value="{{ isset($taller->nombre)?$taller->nombre:old('nombre') }}" id="nombre">
    </div>

    <input class="btn btn-success" type="submit" value="{{ $modo }} datos">
    <a class="btn btn-danger" href="{{ url('taller/') }}">Regresar</a>

</div>
@endsection
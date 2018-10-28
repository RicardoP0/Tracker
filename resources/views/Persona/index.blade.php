@extends('layouts.app')

@section('content')
@foreach($personas as $persona)
    <li>{{$persona->nombre}} -
        {{$persona->postgrados[0]->nombre}} -
        {{$persona->postgrados[0]->tipo}}} -
        {{$persona->empresas[0]->id}}} -
        {{$persona->empresas[0]->tipo_empresa->nombre}}}
    </li>
@endforeach
@endsection
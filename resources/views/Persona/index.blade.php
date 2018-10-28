@extends('layouts.app')

@section('content')
@foreach($personas as $persona)
    <li>{{$persona->nombre}} - {{$persona->postgrados[0]->nombre}} - {{$persona->postgrados[0]->tipo}}</li>
@endforeach
@endsection
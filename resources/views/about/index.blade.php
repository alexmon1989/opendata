@extends('layout.master')

@section('breadcrumbs')
    {!! Breadcrumbs::render('about', ['h1' => 'Про сервіс']) !!}
@stop

@section('content')
 <p class="lead">Інформація у розробці</p>
@stop
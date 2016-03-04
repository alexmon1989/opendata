@extends('layout.master')

@section('content')
    @include('search._form')
@stop

@section('styles')
<link href="{{ url('assets/plugins/icheck/skins/square/blue.css') }}" rel="stylesheet">
@stop

@section('scripts')
<script src="{{ url('assets/plugins/icheck/icheck.min.js') }}"></script>

<script>
    $(document).ready(function(){
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '30%' // optional
      });
    });
</script>
@stop
@extends('layout.master')

@section('breadcrumbs')
    {!! Breadcrumbs::render('search', ['h1' => 'Пошук у наборах даних']) !!}
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="headline">
                <h4>Оберіть набір даних</h4>
            </div>
            <ul class="list-group sidebar-nav-v1" id="sidebar-nav">
                @foreach($open_data_passports as $passport)
                    <li class="list-group-item {{ $open_data_passport->DataSetName == $passport->DataSetName ? 'active' : '' }}">
                        <a href="{{ route('search', ['id' => $passport->idOpenDataPassport]) }}">{{ $passport->DataSetName }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-8">
            <a name="search_form"></a>
            <div class="headline">
                <h4>Заповніть поля форми</h4>
            </div>

            @if (isset($errors) && count($errors) > 0)
                <div class="alert alert-danger fade in alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <strong>Помилка валідації!</strong><br/>

                    @foreach (array_unique($errors->all()) as $error)
                        {!! $error !!} <br/>
                    @endforeach
                </div>
            @endif

            @include('search._form')
        </div>
    </div>

    @if (isset($search_results))
        @include('search._results')
    @endif
@stop

@section('scripts')
	<script src="{{ url('assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js') }}"></script>
    <script src="{{ url('assets/plugins/sky-forms-pro/skyforms/js/datepicker-uk.js') }}"></script>

    <script>
        $(function() {
            App.initSearchForm('{{ $min_publication_date }}',
            '{{ $max_publication_date }}',
            '{{ $min_insert_date }}',
            '{{ $max_insert_date }}');
        });
    </script>
@stop

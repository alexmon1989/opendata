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
        <div class="row">
            <div class="col-md-12">
                <div class="headline">
                    <h3>Результати пошуку</h3>
                </div>

                <p><small>Кількість: <strong>{{ $search_results->total() }}</strong></small></p>

                <div class="text-center">{!! $search_results->render() !!}</div>

                <div class="panel panel-dark-blue margin-bottom-40">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-list"></i> Список файлів XML</h3>
                    </div>

                    <div class="panel-body">
                        <p><a class="btn-u btn-u-light-grey" href="#"><i class="fa fa-download"></i> Завантажити файл-список посилань</a></p>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Пряме посилання</th>
                                <th>Дата публікації на порталі</th>
                                <th>Дата публікації патентного повіренного</th>
                                <th>Дії</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($search_results as $item)
                            <tr>
                                <td>{{ ($i + (20 * ($search_results->currentPage() - 1))) }}.</td>
                                <td><a target="_blank" href="{{ $item->DataSetFolder }}">{{ $item->DataSetFolder }}</a></td>
                                <td>{{ date('d.m.Y', strtotime($item->InsertDate)) }}</td>
                                <td>{{ date('d.m.Y', strtotime($item->PublicationDate)) }}</td>
                                <td><a class="btn-u btn-u-sm btn-u-sea" href="#"><i class="fa fa-download"></i> Завантажити</a></td>
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-center">{!! $search_results->render() !!}</div>
                </div>
            </div>
        </div>
    @endif
@stop

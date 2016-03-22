@extends('layout.master')

@section('breadcrumbs')
    {!! Breadcrumbs::render('contacts', ['h1' => 'Контакти']) !!}
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="lead">За кожним набором даних закріплена відповідальна особа, з якою ви можете зв'язатись:</p>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th width="45%">Назва набору даних</th>
                        <th>ПІБ відповідальної особи</th>
                        <th>Телефон</th>
                        <th>E-Mail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach($data_sets as $item)
                    <tr>
                        <td>{{ $i }}.</td>
                        <td>{!! $item->DataSetName !!}</td>
                        <td>{!! $item->ResponsiblePerson !!}</td>
                        <td>{!! $item->ResponsiblePersonPhone !!}</td>
                        <td>{!! $item->ResponsiblePersonEMail !!}</td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>



@stop
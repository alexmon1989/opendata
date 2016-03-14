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

            @if ($search_results->total() > 0)
            <div class="panel-body">
                <p><a class="btn-u btn-u-light-grey" href="{{ route('get-urls-file', array_merge(['id_open_data_passport' => app('request')->segment(3)], app('request')->all())) }}"><i class="fa fa-download"></i> Завантажити файл-список посилань</a></p>
            </div>
            @endif

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Пряме посилання</th>
                        <th>Дата публікації на порталі</th>
                        <th>Дата офіційної публікації{{ app('request')->segment(3) == 7 ? ' (патентного повіренного)' : '' }}</th>
                        <th>Статус даних</th>
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
                        <td><span class="badge badge-{{ $item->DataSetstatus == 1 ? 'u' : 'yellow' }} rounded">{{ $item->DataSetstatus == 1 ? 'Нове' : 'Змінено' }}</span></td>
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
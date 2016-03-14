<?php

namespace App\Http\Controllers;

use App\OpenData;
use App\OpenDataPassport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    /**
     * Индексная страница.
     *
     * @param Request $request
     * @param null $id идентификатор набора данных
     * @return \Illuminate\View\View
     */
    public function index(Request $request, $id = NULL)
    {
        // Получение "наборов данных"
        $data['open_data_passports'] = OpenDataPassport::orderBy('idOpenDataPassport', 'ASC')->get();

        // Если набор данных не указан, то считаем, что выбран первый
        if (is_null($id)) {
            $id = $data['open_data_passports']
                ->first()
                ->idOpenDataPassport;
        }

        // Данные текущего "набора данных"
        $data['open_data_passport'] = $data['open_data_passports']->where('idOpenDataPassport', intval($id))->first();
        if ($data['open_data_passport']) {

            // TODO: вынести логику валидации и получение отфильтрованной коллекции в модель OpenDataPassport

            // Если форма была отправлена, то делаем поиск
            if (!empty($request->all())) {
                // Правила валидации данных
                $rules = [
                    'insert_date_from'      => 'required_without_all:insert_date_to,publication_date_from,publication_date_to,publication_number|date',
                    'insert_date_to'        => 'required_without_all:insert_date_from,publication_date_from,publication_date_to,publication_number|date',
                    'publication_date_from' => 'required_without_all:insert_date_from,insert_date_to,publication_date_to,publication_number|date',
                    'publication_date_to'   => 'required_without_all:insert_date_from,insert_date_to,publication_date_from,publication_number|date',
                    'publication_number'    => 'required_without_all:insert_date_from,insert_date_to,publication_date_from,publication_date_to|integer|min:1',
                    'dataset_status'        => 'integer|in:1,2',
                ];

                // Сообщения ошибок валидации
                $messages = [
                    'required_without_all'          => 'Будь-ласка, заповніть будь-яке поле для пошуку.',
                    'insert_date_from.date'         => 'Поле <strong>"Дата публікації на порталі (дата від)"</strong> має містити реальну дату.',
                    'insert_date_to.date'           => 'Поле <strong>"Дата публікації на порталі (дата до)"</strong> має містити реальну дату.',
                    'publication_date_from.date'    => 'Поле <strong>"Дата публікації патентного повіренного (дата від)"</strong> має містити реальну дату.',
                    'publication_date_to.date'      => 'Поле <strong>"Дата публікації патентного повіренного (дата до)"</strong> має містити реальну дату.',
                    'publication_number.integer'    => 'Поле <strong>"№ патентного повіренного"</strong> має містити цілочисельне значення.',
                    'publication_number.min'        => 'Поле <strong>"№ патентного повіренного"</strong> має містити значення більше 0.',
                    'dataset_status.in'             => 'Поле <strong>"Статус даних"</strong> містить недопустиме значення.',
                ];

                // Валидация данных
                $validator = Validator::make($request->all(), $rules, $messages);
                if (!$validator->fails()) {
                    $searchResults = $data['open_data_passport']
                        ->openData();

                    // Фильтры
                    $insertDateFrom = trim($request->get('insert_date_from'));
                    if ($insertDateFrom != '') {
                        $searchResults->where('InsertDate', '>=', date('Y-m-d', strtotime($insertDateFrom)));
                    }
                    $insertDateTo = trim($request->get('insert_date_to'));
                    if ($insertDateTo != '') {
                        $searchResults->where('InsertDate', '<=', date('Y-m-d 23:59:59', strtotime($insertDateTo)));
                    }
                    $publicationDateFrom = trim($request->get('publication_date_from'));
                    if ($publicationDateFrom != '') {
                        $searchResults->where('PublicationDate', '>=', date('Y-m-d', strtotime($publicationDateFrom)));
                    }
                    $publicationDateTo = trim($request->get('publication_date_to'));
                    if ($publicationDateTo != '') {
                        $searchResults->where('PublicationDate', '<=', date('Y-m-d 23:59:59', strtotime($publicationDateTo)));
                    }
                    $publicationNumber = (int) $request->get('publication_number');
                    if ($publicationNumber > 0) {
                        $searchResults->where('PublicationNumber', '=', $publicationNumber);
                    }
                    $dataSetStatus = (int) $request->get('dataset_status');
                    if ($dataSetStatus > 0) {
                        $searchResults->where('dataSetstatus', '=', $dataSetStatus);
                    }

                    // Pagination
                    $data['search_results'] = $searchResults->paginate(20)->appends($request->all())->fragment('search_form');
                } else {
                    $data['errors'] = $validator->messages();
                }
            }

            // Мин., макс. года для datepicker
            $data['min_publication_date'] = date('d.m.Y', strtotime(OpenData::min('PublicationDate')));
            $data['max_publication_date'] = date('d.m.Y', strtotime(OpenData::max('PublicationDate')));
            $data['min_insert_date'] = date('d.m.Y', strtotime(OpenData::min('InsertDate')));
            $data['max_insert_date'] = date('d.m.Y', strtotime(OpenData::max('InsertDate')));

            // Отображение страницы
            return view('search.index', $data);

        } else {
            abort(404);
        }
    }

    public function getUrlsFile()
    {
        return 123;
    }
}
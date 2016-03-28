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
                    'publication_number'    => 'required_without_all:insert_date_from,insert_date_to,publication_date_from,publication_date_to|alpha_dash',
                    'dataset_status'        => 'integer|in:1,2',
                ];

                // Сообщения ошибок валидации
                $messages = [
                    'required_without_all'          => 'Будь-ласка, заповніть будь-яке поле для пошуку.',
                    'insert_date_from.date'         => 'Поле <strong>"Дата публікації на порталі (дата від)"</strong> має містити реальну дату.',
                    'insert_date_to.date'           => 'Поле <strong>"Дата публікації на порталі (дата до)"</strong> має містити реальну дату.',
                    'publication_date_from.date'    => 'Поле <strong>"Дата публікації патентного повіренного (дата від)"</strong> має містити реальну дату.',
                    'publication_date_to.date'      => 'Поле <strong>"Дата публікації патентного повіренного (дата до)"</strong> має містити реальну дату.',
                    'publication_number.alpha_dash' => 'Поле <strong>"№ охоронного документа"</strong> містить недопустимі символи.',
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
                    $publicationNumber = trim($request->get('publication_number'));
                    if ($publicationNumber != '') {
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
            $data['min_publication_date'] = date('d.m.Y', strtotime(OpenData::where('idOpenDataPassport', $id)->min('PublicationDate')));
            $data['max_publication_date'] = date('d.m.Y', strtotime(OpenData::where('idOpenDataPassport', $id)->max('PublicationDate')));
            $data['min_insert_date'] = date('d.m.Y', strtotime(OpenData::where('idOpenDataPassport', $id)->min('InsertDate')));
            $data['max_insert_date'] = date('d.m.Y', strtotime(OpenData::where('idOpenDataPassport', $id)->max('InsertDate')));

            // Отображение страницы
            return view('search.index', $data);

        } else {
            abort(404);
        }
    }

    /**
     * Действие исаользует GET-параметры для получения отфильтрованных данных (ссылок на XML), формирует urls-файл и
     * генеририрует отклик (response) для загрузки файла этого файла.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function getUrlsFile(Request $request)
    {
        // Если запрос пришёл с параметрами
        if (!empty($request->all())) {

            // Проводим валидацию данных
            $rules = [
                'id_open_data_passport' => 'required|exists:tb_OpenData,idOpenDataPassport',
                'insert_date_from'      => 'required_without_all:insert_date_to,publication_date_from,publication_date_to,publication_number|date',
                'insert_date_to'        => 'required_without_all:insert_date_from,publication_date_from,publication_date_to,publication_number|date',
                'publication_date_from' => 'required_without_all:insert_date_from,insert_date_to,publication_date_to,publication_number|date',
                'publication_date_to'   => 'required_without_all:insert_date_from,insert_date_to,publication_date_from,publication_number|date',
                'publication_number'    => 'required_without_all:insert_date_from,insert_date_to,publication_date_from,publication_date_to|integer|min:1',
                'dataset_status'        => 'integer|in:1,2',
            ];
            // TODO: сообщения ошибок валидации
            $this->validate($request, $rules);

            // Получаем отфильтрованные данные
            $openData = OpenData::where('idOpenDataPassport', $request->id_open_data_passport);
            $insertDateFrom = trim($request->get('insert_date_from'));
            if ($insertDateFrom != '') {
                $openData->where('InsertDate', '>=', date('Y-m-d', strtotime($insertDateFrom)));
            }
            $insertDateTo = trim($request->get('insert_date_to'));
            if ($insertDateTo != '') {
                $openData->where('InsertDate', '<=', date('Y-m-d 23:59:59', strtotime($insertDateTo)));
            }
            $publicationDateFrom = trim($request->get('publication_date_from'));
            if ($publicationDateFrom != '') {
                $openData->where('PublicationDate', '>=', date('Y-m-d', strtotime($publicationDateFrom)));
            }
            $publicationDateTo = trim($request->get('publication_date_to'));
            if ($publicationDateTo != '') {
                $openData->where('PublicationDate', '<=', date('Y-m-d 23:59:59', strtotime($publicationDateTo)));
            }
            $publicationNumber = trim($request->get('publication_number'));
            if ($publicationNumber != '') {
                $openData->where('PublicationNumber', '=', $publicationNumber);
            }
            $dataSetStatus = (int) $request->get('dataset_status');
            if ($dataSetStatus > 0) {
                $openData->where('dataSetstatus', '=', $dataSetStatus);
            }
            $openData = $openData->get();

            // Генерируем urls-файл
            if (count($openData) > 0) {
                // Создаём файл
                $filePath = 'temp/'.str_random().'.urls';
                $fp = fopen($filePath, 'w');

                // Заполняем файл
                foreach ($openData as $item) {
                    fwrite($fp, $item->DataSetFolder . "\r\n");
                }
                fclose($fp);

                // Генерируем response на загрузку файла
                return response()->download($filePath);
            }
        }

        abort(404);
    }
}
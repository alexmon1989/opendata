<?php

namespace App\Http\Controllers;

use App\OpenDataPassport;

class ContactsController extends Controller
{
    /**
     * Действие для отображения индесной страницы модуля.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Получаем наборы данных
        $data['data_sets'] = OpenDataPassport::orderBy('idOpenDataPassport')
            ->get(['DataSetName', 'ResponsiblePerson', 'ResponsiblePersonPhone', 'ResponsiblePersonEMail']);

        return view('contacts.index', $data);
    }
}
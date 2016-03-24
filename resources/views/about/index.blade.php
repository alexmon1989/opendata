@extends('layout.master')

@section('breadcrumbs')
    {!! Breadcrumbs::render('about', ['h1' => 'Про сервіс']) !!}
@stop

@section('content')
    <p>Сервіс створений для пошуку в наборах відкритих даних Державних реєстрів об'єктів права інтелектуальної власності та Державного реєстру представників у справах інтелектуальної власності (патентних повірених).</p>

    <p>Сервіс реалізовано відповідно до Постанови КМУ України від 21 жовтня 2015 р. № 835 "Про затвердження Положення про набори даних, які підлягають оприлюдненню у формі відкритих даних".</p>

    <p>Для завантаження необхідного набору відкритих даних Вам необхідно:</p>

    <ol>
        <li>Виконати пошук в обраному наборі відкритих даних, зазначивши необхідні критерії у пошуковій формі.</li>
        <li>Завантажити файл-список посилань (файл типу ".urls") на ваш комп'ютер.</li>
        <li>За допомогою програми <a class="open-data-downloader-link" href="{{ url('opendata-modules/OpenData_Downloader.exe') }}">OpenData_Downloader.exe</a> виконати вивантаження файлів з файлу-списку посилань на Ваш комп'ютер.</li>
    </ol>

    <p>Для завантаження файлів ви можете використовувати також будь-який менеджер завантажень, що підтримує імпорт файлів ".urls".</p>
@stop
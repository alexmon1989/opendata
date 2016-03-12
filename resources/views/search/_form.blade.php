<form class="sky-form" id="sky-form" action="{{ route('search', ['id' => $open_data_passport->idOpenDataPassport]) }}#search_form">

    <header>{{ $open_data_passport->DataSetName }}</header>

    <fieldset>
        <section>
            <label class="label" for="insert_date_from">Дата публікації на порталі</label>
            <div class="row">
                <section class="col col-6">
                    <label class="input">
                        <i class="icon-append fa fa-calendar"></i>
                        <input type="text" placeholder="Дата від" id="insert_date_from" name="insert_date_from" value="{{ app('request')->get('insert_date_from') }}">
                    </label>
                </section>
                <section class="col col-6">
                    <label class="input">
                        <i class="icon-append fa fa-calendar"></i>
                        <input type="text" placeholder="Дата до" id="insert_date_to" name="insert_date_to" value="{{ app('request')->get('insert_date_to') }}">
                    </label>
                </section>
            </div>

            <label class="label" for="publication_date_from">Дата публікації патентного повіренного</label>
            <div class="row">
                <section class="col col-6">
                    <label class="input">
                        <i class="icon-append fa fa-calendar"></i>
                        <input type="text" placeholder="Дата від" id="publication_date_from" name="publication_date_from" value="{{ app('request')->get('publication_date_from') }}">
                    </label>
                </section>
                <section class="col col-6">
                    <label class="input">
                        <i class="icon-append fa fa-calendar"></i>
                        <input type="text" placeholder="Дата до" id="publication_date_to" name="publication_date_to" value="{{ app('request')->get('publication_date_to') }}">
                    </label>
                </section>
            </div>

            <label class="label" for="publication_number">№ патентного повіренного</label>
            <label class="input">
                <label class="input">
                    <i class="icon-append fa fa-pencil"></i>
                    <input type="text" placeholder="№ патентного повіренного" id="publication_number" name="publication_number" value="{{ app('request')->get('publication_number') }}">
                </label>
            </label>
        </section>
    </fieldset>

    <footer>
        <button class="btn-u" type="submit"><i class="fa fa-search"></i> Пошук</button>
        <button class="btn-u btn-u-default" type="reset"><i class="fa fa-reply-all"></i> Скинути</button>
    </footer>
</form>
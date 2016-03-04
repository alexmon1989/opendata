<h3>Заповніть поля для пошуку</h3>
<form class="form-horizontal">
    <div class="form-group">
        <label class="col-sm-2 control-label">Джерело даних:</label>
        <div class="form-group col-sm-10">
            @foreach($datasets as $item)
            <div class="radio">
                <label>
                  <input type="radio" name="idOpenDataPassport" value="{{ $item->idOpenDataPassport }}">
                  {{ $item->DataSetName }}
                </label>
            </div>
            @endforeach
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Дата публікації на порталі</label>
        <div class="col-sm-10">
            <div class="row">
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="date_from" name="date_from" placeholder="Від">
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="date_from" name="date_from" placeholder="До">
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Пошук</button>
        </div>
    </div>
</form>
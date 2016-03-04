<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpenData extends Model
{
    /**
     * Таблица БД.
     *
     * @var string
     */
    protected $table = 'tb_OpenData';

    /**
     * Первичный ключ.
     *
     * @var string
     */
    protected $primaryKey = 'idRec';

    /**
     * Связь "многие-к-одному" с cl_OpenDataPassports
     */
    public function openDataPassport()
    {
        return $this->belongsTo('App\OpenDataPassport', 'idOpenDataPassport');
    }
}
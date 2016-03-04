<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpenDataPassport extends Model
{
    /**
     * Таблица БД.
     *
     * @var string
     */
    protected $table = 'cl_OpenDataPassports';

    /**
     * Первичный ключ.
     *
     * @var string
     */
    protected $primaryKey = 'idOpenDataPassport';

    /**
     * Связь "один-ко-многим" с tb_OpenData
     */
    public function openData()
    {
        return $this->hasMany('App\OpenData', 'idOpenDataPassport');
    }
}
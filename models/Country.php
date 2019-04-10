<?php

namespace app\models;

use app\components\Model;

class Country extends Model
{

    public static function tableName()
    {
        return 'countries';
    }

    public static function getColumns()
    {
        return [
            'id',
            'country'
        ];
    }

    private $id;
    private $country;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

}
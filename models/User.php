<?php

namespace app\models;

use app\components\Model;

class User extends Model
{

    public static function tableName()
    {
        return 'users';
    }

    public static function getColumns()
    {
        return [
            'id',
            'name',
            'email',
            'country_id'
        ];
    }


    private $id;
    private $name;
    private $email;
    private $country_id;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getCountry_id()
    {
        return $this->country_id;
    }

    /**
     * @param mixed $country_id
     */
    public function setCountry_id($country_id)
    {
        $this->country_id = $country_id;
    }

}
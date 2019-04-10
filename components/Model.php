<?php

namespace app\components;

use PDO;

abstract class Model
{

    public static function tableName()
    {
        return '';
    }

    public function save()
    {
        $query = null;
        if (empty($this->getPropertyValueByName('id')))
            $query = $this->getQueryInsert();

        else
            $query = $this->getQueryUpdate();

        $connection = Db::getConnection();
        $db = $connection->prepare($query);
        $res = $db->execute();

        return $res;
    }

    private function getQueryInsert()
    {
        $columns = $this->getColumns();
        $nameCols = '';
        $valueCols = '';

        foreach ($columns as $key => $item) {
            $field = strval($item);
            if (!empty($this->getPropertyValueByName($field))) {
                $nameCols .=  $field . ", ";
                $valueCols .= "'" . strval($this->getPropertyValueByName($field)) . "', ";
            }
        }

        $tableName = $this->tableName();
        $nameCols = substr($nameCols, 0, -2);
        $valueCols = substr($valueCols, 0, -2);

        $query = "INSERT INTO $tableName($nameCols) VALUES ($valueCols)";

        return $query;
    }

    private function getQueryUpdate()
    {
        $columns = $this->getColumns();
        $nameCols = '';

        foreach ($columns as $key => $item) {
            $field = strval($item);
            if ($field == 'id') continue;
            $nameCols .= $field . "=" . "'" . strval($this->getPropertyValueByName($field)). "', ";
        }

        $tableName = $this->tableName();
        $nameCols = substr($nameCols, 0, -2);

        $query = "UPDATE $tableName SET $nameCols WHERE id=".$this->getPropertyValueByName('id');

        return $query;
    }

    abstract protected static function getColumns();


    /**
     * @param string $params
     * @return array|bool
     */
    public static function find($params = '')
    {
        $tableName = get_called_class()::tableName();

        $query = "SELECT * FROM $tableName ".$params;

        $connection = Db::getConnection();
        $db = $connection->prepare($query);

        if (!$db)return false;

        $db->execute();
        $db->setFetchMode(PDO::FETCH_ASSOC);
        $res = $db->fetchAll();
        $objs = self::fillObjects($res);

        return $objs;
    }

    private static function fillObjects($data)
    {
        $objs = [];

        foreach ($data as $item){
            $class = get_called_class();
            $obj = new $class;
            foreach ($item as $key => $value){
                $setProperty = 'set'.ucfirst($key);
                $obj->$setProperty($value);
            }

            $objs[] = $obj;
        }

        return $objs;
    }

    /**
     * @param $id
     * @return array|bool|mixed
     */
    public static function findOne($id)
    {
        if (empty($id)) return false;

        $obj = self::find('WHERE id=' . $id);

        if (empty($obj)) return false;

        $obj = $obj[0];

        return $obj;
    }

    /**
     * Deletes obj by $id
     * @param $id
     * @return bool
     */
    public static function delete($id)
    {
        $tableName = get_called_class()::tableName();

        $query = "DELETE FROM " . $tableName . " WHERE id =" . $id;

        $connection = Db::getConnection();
        $db = $connection->prepare($query);
        $res = $db->execute();

        return $res;
    }

    private function getPropertyValueByName($name)
    {
        $getProperty = 'get'.ucfirst($name);
        return $this->$getProperty();
    }

}
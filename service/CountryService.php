<?php

namespace app\service;

use app\components\Service;
use app\models\Country;

class CountryService extends Service
{

    public static function addCountry($post)
    {

        $isSet = self::isDataSet($post, ['country']);
        if (!$isSet) return false;

        $country = new Country();
        $country->setCountry($post['country']);

        $isSaved = $country->save();

        if ($isSaved)
            self::addLogInfo('country', 'Saved country ' . $country->getCountry());
        else
            self::addLogError('country', 'Not saved country '. $country->getCountry());

        return $isSaved;
    }

    public static function editCountry($post)
    {

        $isSet = self::isDataSet($post, ['id', 'country']);
        if (!$isSet) return false;

        $country = Country::findOne($post['id']);

        if (empty($country)){
            self::addLogError('country', 'Not found country with id: ' . $post['id']);
            return false;
        }

        $country->setCountry($post['country']);

        $isSaved = $country->save();

        if ($isSaved)
            self::addLogInfo('country', 'Edited country ' . $country->getCountry());
        else
            self::addLogError('country', 'Not edited country ' . $country->getCountry());

        return $isSaved;
    }

    public static function deleteCountry($post)
    {
        $isSet = self::isDataSet($post, ['id']);
        if (!$isSet) return false;

        $country = Country::findOne($post['id']);
        if (empty($country)){
            self::addLogError('country', 'Not found country with id: ' . $post['id']);
            return false;
          }
        $res = Country::delete($post['id']);

        if ($res)
            self::addLogInfo('country', 'Deleted country: ' . $country->getCountry());
        else
            self::addLogError('country', 'Not deleted country: ' . $country->getCountry());

        return $res;
    }

}
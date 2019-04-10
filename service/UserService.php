<?php

namespace app\service;

use app\components\Service;
use app\models\User;

class UserService extends Service
{

    public static function addUser($post)
    {
        $isSet = self::isDataSet($post, ['name', 'email', 'country_id']);
        if (!$isSet) return false;

        $user = new User();
        $user->setName($post['name']);
        $user->setEmail($post['email']);
        $user->setCountry_id($post['country_id']);

        $isSaved = $user->save();

        if ($isSaved)
            self::addLogInfo('user', 'Saved user ' . $user->getName());
        else
            self::addLogError('user', 'Not saved user '. $user->getName());

        return $isSaved;
    }

    public static function editUser($post)
    {

        $isSet = self::isDataSet($post, ['id', 'name', 'email', 'country_id']);
        if (!$isSet) return false;

        $user = User::findOne($post['id']);

        if (empty($user)){
            self::addLogError('user', 'Not found user with id: ' . $post['id']);
            return false;
        }

        $user->setName($post['name']);
        $user->setEmail($post['email']);
        $user->setCountry_id($post['country_id']);

        $isSaved = $user->save();

        if ($isSaved)
            self::addLogInfo('user', 'Edited user ' . $user->getName());
        else
            self::addLogError('user', 'Not edited user ' . $user->getName());

        return $isSaved;
    }

    public static function deleteUser($post)
    {
        $isSet = self::isDataSet($post, ['id']);
        if (!$isSet) return false;

        $user = User::findOne($post['id']);
        if (empty($user)){
            self::addLogError('user', 'Not found user with id: ' . $post['id']);
            return false;
        }

        $res = User::delete($post['id']);

        if ($res)
            self::addLogInfo('user', 'Deleted user: ' . $user->getName());
        else
            self::addLogError('user', 'Not deleted user: ' . $user->getName());

        return $res;
    }

}
<?php

namespace app\controllers;

use app\components\Controller;
use app\models\Country;
use app\models\User;
use app\service\UserService;
use Exception;

class UserController extends Controller
{

    public function actionIndex()
    {
        $countries = Country::find();
        $users = User::find();

        return $this->render('index', ['countries' => $countries, 'users' => $users]);
    }

    public function actionAdd()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
                UserService::addUser($_POST);

        }
        catch (Exception $ex){
        }

        $this->goToIndex();
    }

    public function actionEdit()
    {
        try {

            if ($_SERVER['REQUEST_METHOD'] == 'POST')
                UserService::editUser($_POST);

        }
        catch (Exception $ex){
        }

        $this->goToIndex();
    }

    public function actionDelete()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
                UserService::deleteUser($_POST);
        }
        catch (Exception $ex){
        }

        $this->goToIndex();
    }

}
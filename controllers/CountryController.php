<?php

namespace app\controllers;

use app\components\Controller;
use app\models\Country;
use app\service\CountryService;
use Exception;

class CountryController extends Controller
{

    public function actionIndex()
    {
        $countries = Country::find();

        return $this->render('index', ['countries' => $countries]);
    }

    public function actionAdd()
    {
        try {

            if ($_SERVER['REQUEST_METHOD'] == 'POST')
                CountryService::addCountry($_POST);

        }
        catch (Exception $ex){
        }

        $this->goToIndex();
    }

    public function actionEdit()
    {
        try {

            if ($_SERVER['REQUEST_METHOD'] == 'POST')
                CountryService::editCountry($_POST);

        }
        catch (Exception $ex){
        }

        $this->goToIndex();
    }

    public function actionDelete()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
                CountryService::deleteCountry($_POST);
        }
        catch (Exception $ex){
        }

        $this->goToIndex();
    }

}
<?php
namespace App\Controller;

class ErrorController extends AbstractController {


    public function index()
    {

    }

    public function error404 ($askPage) {
        AbstractController::render('error/404');
    }
}



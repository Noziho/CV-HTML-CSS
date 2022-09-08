<?php

namespace App\Controller;

class HomeController extends AbstractController {

    public function index()
    {
        AbstractController::render('home/home');
    }
}
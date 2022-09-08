<?php

namespace App\Controller;

class UserController extends AbstractController {

    public function index () {

    }

    public function contactUs () {
        AbstractController::render('user/contact');
    }
}
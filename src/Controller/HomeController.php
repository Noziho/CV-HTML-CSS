<?php

namespace App\Controller;

use App\Model\Manager\SectionManager;

class HomeController extends AbstractController {

    public function index()
    {
        AbstractController::render('home/home', [
            "section" => SectionManager::getAll(),
        ]);
    }
}
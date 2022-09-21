<?php

namespace App\Controller;

use App\Model\Entity\Section;
use App\Model\Manager\SectionManager;

class SectionController extends \App\Controller\AbstractController
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public static function addSection ()
    {
        if (!self::formIsset('submit','title', 'content')) {
            header("Location: /?c=home");
        }
        if (!self::isAdmin()) {
            header("Location: /?c=home");
        }

        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);

        AbstractController::checkRange($title, 4, 50, '/?c=home');
        AbstractController::checkRange($content, 4, 255, '/?c=home');

        SectionManager::addSection($title, $content, $_SESSION['user']->getId());
        header("Location: /?c=user&a=add-section&f=success");
        exit();
    }

    public static function getAll (): void
    {
        $sections = [];
        foreach (SectionManager::getAll() as $key => $value) {
            /* @var Section $value */

            $sections[$key]['title'] = $value->getTitle();
            $sections[$key]['content'] = $value->getContent();
        }
        echo json_encode($sections);
    }
}
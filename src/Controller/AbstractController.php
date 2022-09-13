<?php

namespace App\Controller;


use App\Model\Manager\UserManager;

abstract class AbstractController {

    abstract public function index ();

    public static function render (string $template, array $data = [])
    {
        ob_start();
        require __DIR__ . "/../../View/" . $template . ".html.php";
        $html = ob_get_clean();
        require __DIR__ . "/../../View/base.html.php";
    }

    /**
     * Checking if form are isset
     * @param ...$inputNames
     * @return bool
     */
    public static function formIsset(...$inputNames): bool
    {
        foreach ($inputNames as $name) {
            if (!isset($_POST[$name]) || empty($_POST[$name])) {
                return false;
            }
        }
        return true;
    }

    public function checkRange(string $value, int $min, int $max, string $redirect): void
    {
        if (strlen($value) < $min || strlen($value) > $max) {
            header("Location: " . $redirect);
            exit();
        }
    }

    public static function isAdmin (): bool
    {
        if (isset($_SESSION['user'])) {
            $id = $_SESSION['user']->getId();
            $user = UserManager::getUserById($id);
             if ($user->getRole() === "admin") {
                 return true;
             }
        }
        return false;
    }
}

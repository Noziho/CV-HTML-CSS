<?php

namespace App\Controller;

use App\Model\Entity\AbstractEntity;
use App\Model\Manager\UserManager;

class UserController extends AbstractController {

    public function index ()
    {

    }

    public function contactUs ()
    {
        AbstractController::render('user/contact');
    }

    public function register ():void
    {
        AbstractController::render('user/register');
        if (isset($_POST['submit'])) {
            if (!self::formIsset('email', 'password')) {
                header('Location: /?c=home&f=formManquant');
            }

            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];

            $this::checkRange($email, 8, 255, '/?c=home&f=rangeMail');
            $this::checkRange($password, 8, 55, '/?c=home&f=rangePassword');

            $passwordClean = password_hash($password, PASSWORD_ARGON2I);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: /?c=home&f=email");
                exit();
            }

            if (UserManager::mailExist($email)){
                header("Location: /?c=home&f=mailExist");
                exit();
            }

            if (UserManager::register($email, $passwordClean)) {
                header("Location: /?c=user&a=login");
            }
        }
    }

    public function login () :void
    {
        AbstractController::render('user/login');

        if (isset($_POST['submit'])) {
            if (!self::formIsset('email', 'password')) {
                header("Location: /?c=home&f=champManquant");
                exit();
            }

            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];
            UserManager::login($email, $password);
        }
    }

    public function logOut () :void
    {
        if (!isset($_SESSION['user'])){
            header("Location: /?c=user&a=login");
            exit();
        }
        session_destroy();
        header("Location: /?c=home");
    }

    public function addSection ()
    {
        AbstractController::render('admin/addsomething');
    }

    public function editProfile ()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: /?c=home&f=notLogged");
        }
        AbstractController::render('user/profile', [
            'user' => UserManager::getUserById($_SESSION['user']->getId()),
        ]);
    }

    public function delete ()
    {
        if (isset($_SESSION['user'])) {
            if (AbstractController::isAdmin()) {
                header("Location: /c=home&f=acessDeniedAdminCantBeDeleted");
                exit();
            }

            UserManager::deleteUser($_SESSION['user']->getId());
            self::logOut();
            header("Location: /?c=home");
        }
    }
}
<?php

namespace App\Model\Manager;

use App\Model\DB_Connect;
use App\Model\Entity\User;

class UserManager
{
    const TABLE = "ndmp22_user";

    public static function makeUser (array $data) :User
    {
        return (new User())
        ->setId($data['id'])
        ->setEmail($data['email'])
        ->setPassword($data['password'])
        ->setRole($data['role']);
    }

    public static function register (string $email, string $password):bool
    {
        $stmt = DB_Connect::dbConnect()->prepare("
        INSERT INTO " . self::TABLE . "(email, password, role) VALUES (:email, :password, :role)");

        $role = "user";

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);

        if ($stmt->execute()) {
            return true;
        }
        return false;

    }

    public static function login (string $email, string $password): void
    {
        $stmt = DB_Connect::dbConnect()->prepare("SELECT * FROM " .self::TABLE. " WHERE email = :email ");
        $stmt->bindParam(':email', $email);

        if($stmt->execute()) {
            $data = $stmt->fetch();
            if (password_verify($password, $data['password'])) {
                $user = self::makeUser($data);

                if (!isset($_SESSION['user'])) {
                    $_SESSION['user'] = $user;
                }
                header("Location: /?c=home&f=sucessLog");

            } else {
                header("Location: /?c=user&a=login&f=wrongpassword");
            }

        } else {
            header("Location: /?c=user&a=login&f=globalError");
        }

    }

    public static function getUserById (int $user_id): ?User
    {
        $query = DB_Connect::dbConnect()->query("SELECT * FROM " . self::TABLE . " WHERE id = $user_id");
        return $query->execute() ? self::makeUser($query->fetch()) : null;
    }

    public static function mailExist (string $email):string
    {
        $query = DB_Connect::dbConnect()->query(" SELECT count(*) as cnt FROM ".self::TABLE." WHERE email = \"$email\"");
        return $query ? $query->fetch()['cnt'] : 0;
    }

    public static function deleteUser(int $id): void
    {
        DB_Connect::dbConnect()->query("DELETE FROM " . self::TABLE . " WHERE id = $id");
    }

}
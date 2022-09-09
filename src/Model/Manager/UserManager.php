<?php

namespace App\Model\Manager;

use App\Model\DB_Connect;
use App\Model\Entity\User;

class UserManager
{
    const TABLE = "ndmp22_section";

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

    public static function getUserById (int $user_id): ?User {
        $query = DB_Connect::dbConnect()->query("SELECT * FROM " . self::TABLE . " WHERE id = $user_id");
        return $query->execute() ? self::makeUser($query->fetch()) : null;
    }

}
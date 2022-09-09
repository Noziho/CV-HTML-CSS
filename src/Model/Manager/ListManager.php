<?php

namespace App\Model\Manager;

use App\Model\DB_Connect;
use App\Model\Entity\HtmlList;

class ListManager
{
    const TABLE = "ndmp22_list";
    public static function makeList (array $data): HtmlList
    {
        return (new HtmlList())
            ->setId($data['id'])
            ->setContent($data['content'])
            ->setUserFk(UserManager::getUserById($data['user_fk']));

    }

    public static function addList (string $content, int $user_fk): bool
    {
        $stmt = DB_Connect::dbConnect()->prepare("INSERT INTO ".self::TABLE. " (content, user_fk)
         VALUES (:content, :user_fk)
         ");

        $stmt->bindParam(":content", $content );
        $stmt->bindParam(':user_fk', $user_fk );

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
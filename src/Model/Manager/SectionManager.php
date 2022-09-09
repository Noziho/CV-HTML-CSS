<?php

namespace App\Model\Manager;

use App\Model\DB_Connect;
use App\Model\Entity\Section;
use App\Model\Entity\User;

class SectionManager
{
    const TABLE = "ndmp22_section";

    public static function makeSection (array $data) :Section
    {
        return (new Section())
            ->setId($data['id'])
            ->setTitle($data['title'])
            ->setContent($data['content'])
            ->setUserFk(UserManager::getUserById($data['user_fk']));
    }

    public static function getAll ():array
    {
       $sections = [];
       $query = DB_Connect::dbConnect()->query("SELECT * FROM " . self::TABLE);

       if ($query) {
           foreach ($query->fetchAll() as $sectionData) {
               $sections[] = self::makeSection($sectionData);
           }
       }
       return $sections;
    }

    public static function addSection (string $title, string $content, int $user_fk): bool
    {
        $stmt = DB_Connect::dbConnect()->prepare("
        INSERT INTO " .self::TABLE. " (title, content, user_fk) VALUES (:title, :content, :user_fk) ");

        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":content", $content);
        $stmt->bindParam("user_fk", $user_fk);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
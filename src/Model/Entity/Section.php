<?php

namespace App\Model\Entity;

class Section extends AbstractEntity {

    private string $title;
    private string $content;
    private User $user_fk;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Section
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Section
     */
    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return User
     */
    public function getUserFk(): User
    {
        return $this->user_fk;
    }

    /**
     * @param User $user_fk
     * @return Section
     */
    public function setUserFk(User $user_fk): self
    {
        $this->user_fk = $user_fk;
        return $this;
    }


}
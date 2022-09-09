<?php

namespace App\Model\Entity;


class HtmlList extends AbstractEntity {

    private string $content;
    private User $user_fk;

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return HtmlList
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
     * @return HtmlList
     */
    public function setUserFk(User $user_fk): self
    {
        $this->user_fk = $user_fk;
        return $this;
    }

}

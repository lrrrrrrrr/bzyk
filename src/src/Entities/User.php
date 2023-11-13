<?php

namespace Application\Entities;

class User
{
    protected $id;
    protected string $username = '';
    protected string $password = '';
    protected string $created = '';


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $content
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

}

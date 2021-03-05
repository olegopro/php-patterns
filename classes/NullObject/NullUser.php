<?php

namespace NullObject;

class NullUser implements IUser
{
    private $id;
    private $login;
    private $email;

    public function __construct() { }

    public function getId(): string
    {
        return 'Id is empty';
    }

    public function getLogin()
    {
        return 'Login is empty';
    }

    public function getEmail()
    {
        return 'Email is empty';
    }

    public function setId($id) { }

    public function setLogin($login) { }

    public function setEmail($email) { }
}

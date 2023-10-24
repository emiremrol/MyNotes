<?php
namespace App\Data\User;
class UserDTO
{
    private $id;
    private $username;
    private $email;
    private $password;
    private $firstName;
    private $lastName;

    public static function create(
        string $username, string $password, string $firstName, string $lastName,string $email, $id = null
    )
    {
        return (new UserDTO())
            ->setUsername($username)
            ->setPassword($password)
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setEmail($email)
            ->setId($id);
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email): UserDTO
    {
        $this->email = $email;
        return $this;
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id): UserDTO
    {
        $this->id = $id;
        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username): UserDTO
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): UserDTO
    {
        $this->password = $password;
        return $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName): UserDTO
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName): UserDTO
    {
        $this->lastName = $lastName;
        return $this;
    }



}
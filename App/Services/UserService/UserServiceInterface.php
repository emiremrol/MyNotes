<?php

namespace App\Services\UserService;

use App\Data\User\UserDTO;


interface UserServiceInterface
{
    public function register(UserDTO $userDTO, string $confirmPassword): bool;
    public function login(string $username, string $password): UserDTO;
    public function edit(UserDTO $userDTO): bool;
    public function isLogged(): bool;
    public function currentUser(): ?UserDTO;
}
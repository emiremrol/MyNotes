<?php

namespace App\Services\UserService;

use App\Data\ErrorDTO\ErrorDTO;
use App\Data\User\UserDTO;
use App\Repositories\UserRepository\UserRepositoryInterface;
use App\Services\Encryption\EncryptionServiceInterface;

class UserService implements UserServiceInterface
{

    private $userRepository;
    private $encryptionService;

    public function __construct(UserRepositoryInterface $userRepository, EncryptionServiceInterface $encryptionService)
    {
        $this->userRepository = $userRepository;
        $this->encryptionService = $encryptionService;
    }

    /**
     * @throws \Exception
     */
    public function register(UserDTO $userDTO, string $confirmPassword): bool
    {
        if($userDTO->getPassword() !== $confirmPassword){
            return false;
        }

        if(null !== $this->userRepository->findOneByUsername($userDTO->getUsername())){
            return false;
        }

        if($userDTO->getUsername() !== ""){
            $this->encryptPassword($userDTO);
            return $this->userRepository->insert($userDTO);
        }

        return false;
    }

    /**
     * @throws \Exception
     */
    public function login(string $username, string $password): UserDTO
    {
        $userFromDB = $this->userRepository->findOneByUsername($username);
        if(null === $userFromDB){
            throw new \Exception("Username does not exist!");
        }

        if(false === $this->encryptionService->verify($password, $userFromDB->getPassword())){
            throw new \Exception("Password mismatch!");
        }

        return $userFromDB;
    }

    public function edit(UserDTO $userDTO): bool
    {
        if(null !== $this->userRepository->findOneByUsername($userDTO->getUsername())){
            return false;
        }

        $this->encryptPassword($userDTO);
        return $this->userRepository->update($_SESSION['id'], $userDTO);
    }

    public function isLogged(): bool
    {
        if(!$this->currentUser()){
            return false;
        }

        return true;
    }

    public function currentUser(): ?UserDTO
    {
        if(!$_SESSION['id']){
            return null;
        }

        return $this->userRepository->findOneById($_SESSION['id']);
    }

    private function encryptPassword(UserDTO $userDTO): void
    {
        $plainPassword = $userDTO->getPassword();
        $hashPassword = $this->encryptionService->hash($plainPassword);
        $userDTO->setPassword($hashPassword);
    }
}
<?php

namespace App\Services\NoteService;

use App\Data\Note\NoteDTO;
use App\Repositories\NoteRepository\NoteRepositoryInterface;
use App\Services\UserService\UserServiceInterface;

class NoteService implements NoteServiceInterface
{

    private $noteRepository;
    private $userService;
    public function __construct(NoteRepositoryInterface $noteRepository, UserServiceInterface $userService, )
    {
        $this->noteRepository = $noteRepository;
        $this->userService = $userService;
    }

    public function createNote(NoteDTO $noteDTO): bool
    {
        if(!$this->userService->isLogged()){
            return false;
        }

        $currentUser = $this->userService->currentUser();
        $this->noteRepository->createNote($currentUser->getId(), $noteDTO);
        return true;
    }

    public function editNote(int $id, NoteDTO $noteDTO): bool
    {
        if(!$this->userService->isLogged()){
            return false;
        }

        $this->noteRepository->updateNote($id, $noteDTO);
        return true;
    }

    public function deleteNote(int $id): bool
    {
        if(!$this->userService->isLogged()){
            return false;
        }

        $this->noteRepository->deleteNote($id);
        return true;
    }

    public function getAllNote(int $page = 1, int $perPage = 4): \Generator
    {
        if(!$this->userService->isLogged()){
            return false;
        }

        $currentUser = $this->userService->currentUser();
        return $this->noteRepository->findAllNotes($currentUser->getId(), $page, $perPage);
    }

    public function currentNote(int $id): ?NoteDTO
    {
        if(!$this->userService->isLogged()){
            return null;
        }

        return $this->noteRepository->findOneById($id);
    }

    public function getRowCount(int $userId): int
    {
        return $this->noteRepository->getRowCount($userId);
    }

}
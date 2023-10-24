<?php

namespace App\Repositories\NoteRepository;

use App\Data\Note\NoteDTO;

interface NoteRepositoryInterface
{
    public function createNote(int $userId, NoteDTO $noteDTO): bool;
    public function updateNote(int $id, NoteDTO $noteDTO): bool;
    public function deleteNote(int $id): bool;
    public function findOneById(int $id): ?NoteDTO;

    /**
     * @return \Generator| NoteDTO[]
     */
    public function findAllNotes(int $id): \Generator;
}
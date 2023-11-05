<?php

namespace App\Services\NoteService;

use App\Data\Note\NoteDTO;

interface NoteServiceInterface
{
    public function createNote(NoteDTO $noteDTO): bool;
    public function editNote(int $id, NoteDTO $noteDTO): bool;
    public function deleteNote(int $id): bool;
    public function getAllNote(int $page = 1, int $perPage = 4): \Generator;
    public function currentNote(int $id): ?NoteDTO;

    public function getRowCount(int $userId): int;
}
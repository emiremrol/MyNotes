<?php

namespace App\Repositories\NoteRepository;

use App\Data\Note\NoteDTO;
use Database\DatabaseInterface;

class NoteRepository implements NoteRepositoryInterface
{

    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }


    public function createNote(int $userId, NoteDTO $noteDTO): bool
    {
        $this->db
            ->query(
            "INSERT INTO 
                        notes(title, content, user_id)
                   VALUES (?, ?, ?)"
            )
            ->execute([
                $noteDTO->getTitle(),
                $noteDTO->getContent(),
                $userId
            ]);
        return true;
    }

    public function updateNote(int $id, NoteDTO $noteDTO): bool
    {
        $this->db->query(
            "UPDATE
                        notes
                    SET
                        title = ?,
                        content = ?
                    WHERE
                        note_id = ?"
        )
            ->execute([
                $noteDTO->getTitle(),
                $noteDTO->getContent(),
                $id
            ]);

        return true;
    }

    public function deleteNote(int $id): bool
    {
        $this->db
            ->query("DELETE FROM notes WHERE note_id = ?")
            ->execute([$id]);
        return true;
    }

    public function findAllNotes(int $userId, int $page = 1, int $perPage = 5): \Generator
    {
        $offset = ($page - 1) * $perPage;

        return $this->db->query(
            "SELECT
                        note_id AS noteId,
                        title,
                        content,
                        create_at AS createAt
                    FROM 
                        notes
                    WHERE
                        user_id = ?
                    LIMIT $perPage 
                    OFFSET $offset"
        )
            ->execute([
                $userId
            ])
            ->fetch(NoteDTO::class);

    }

    public function findOneById(int $id): ?NoteDTO
    {
        return $this->db->query("
            SELECT
                note_id AS noteId,
                title,
                content,
                create_at AS createAt
            FROM 
                notes 
            WHERE 
                note_id = ?
        ")
            ->execute([$id])
            ->fetch(NoteDTO::class)
            ->current();

    }

    public function getRowCount(int $userId): int
    {
        return $this->db->query(
            "SELECT * FROM notes WHERE user_id = ?")
            ->execute([$userId])
            ->rowCount();
    }
}
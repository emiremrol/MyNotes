<?php

namespace App\Data\Note;

class NoteDTO
{
    /**
     * @var int
     */
    private $noteId;
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $content;
    /**
     * @var string
     */
    private $createAt;

    public function getNoteId(): int
    {
        return $this->noteId;
    }

    public function setNoteId(int $noteId): void
    {
        $this->noteId = $noteId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getCreateAt(): string
    {
        return $this->createAt;
    }

    public function setCreateAt(string $createAt): void
    {
        $this->createAt = $createAt;
    }


}
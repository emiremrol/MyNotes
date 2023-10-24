<?php

namespace App\Http\NoteHttpHandler;

use App\Data\Note\NoteDTO;
use App\Http\HttpHandlerAbstract;
use App\Services\NoteService\NoteServiceInterface;
use App\Services\UserService\UserServiceInterface;

class NoteHttpHandler extends HttpHandlerAbstract
{
    public function createNote(NoteServiceInterface $noteService, UserServiceInterface $userService, array $formData): void
    {
        if(!$userService->isLogged()){
            $this->redirect("login.php");
        }
        if(isset($formData['create'])){
            $this->handleCreateNoteProcess($noteService, $formData);
        } else {
            $this->render("notes/createNote");
        }
    }
    private function handleCreateNoteProcess(NoteServiceInterface $noteService, array $formData): void
    {
        $note = $this->dataBinder->bind($formData, NoteDTO::class);

        if($noteService->createNote($note)){
            $this->redirect("allNotes.php");
        }
    }

    public function viewNote(UserServiceInterface $userService, NoteServiceInterface $noteService, array $formData): void
    {
        $currentNote = $noteService->currentNote($_GET['noteid']);

        if(!$userService->isLogged()){
            $this->redirect("login.php");
        }else{
            if(isset($formData['update'])){
                $this->handleUpdateProcess($noteService, $formData, $currentNote->getNoteId());
            }

            $this->render("notes/viewNote", $currentNote);

        }

    }

    private function handleUpdateProcess(NoteServiceInterface $noteService, array $formData, int $noteId): void
    {
        $note = $this->dataBinder->bind($formData, NoteDTO::class);
//        $currentNote = $noteService->currentNote($noteId);
        if($noteService->editNote($noteId, $note)){
            $this->redirect("allNotes.php");
        }
    }

    public function getAllNotes(NoteServiceInterface $noteService, UserServiceInterface $userService): void
    {
        if(!$userService->isLogged()){
            $this->redirect("login.php");
        }

        $this->render("notes/allNotes", $noteService->getAllNote());

    }
}
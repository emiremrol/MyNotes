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
            $this->redirect("allNotes.php?page=1");
        }
    }

    public function viewNote(UserServiceInterface $userService, NoteServiceInterface $noteService, array $formData): void
    {

        $currentNote = $noteService->currentNote($formData['noteid']);

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
            $this->redirect("allNotes.php?page=1");
        }
    }

    public function getAllNotes(NoteServiceInterface $noteService, UserServiceInterface $userService, array $data = []): void
    {
        if(!$userService->isLogged()){
            $this->redirect("login.php");
        }

        $userId = $_SESSION['id'];
        $_SESSION['row_counts'] = $noteService->getRowCount($userId);

        if(null != $data){
            $this->render("notes/allNotes", $noteService->getAllNote(intval($data['page'])));

        }else {
            $this->render("notes/allNotes", $noteService->getAllNote());
        }

    }

    public function deleteNote(UserServiceInterface $userService, NoteServiceInterface $noteService, array $formData):void
    {
        if(!$userService->isLogged()){
            $this->redirect("login.php");
        } else {
            $currentNote = $noteService->currentNote($formData['deleteid']);
            if(isset($formData['deleteid'])){
                $this->handleDeleteProcess($noteService, $currentNote);
            }else {
                $this->render("notes/allNotes");
            }
        }

    }

    private function handleDeleteProcess(NoteServiceInterface $noteService, NoteDTO $noteDTO): void
    {
        if($noteService->deleteNote($noteDTO->getNoteId())){
            $this->redirect("allNotes.php?page=1");
        }
    }

}
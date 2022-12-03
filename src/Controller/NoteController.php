<?php

declare(strict_types=1);

namespace App\Controller;

use App\Exception\NotFoundException;

class NoteController extends AbstractController
{
    public function createAction()
    {
        if ($this->request->hasPost()) {
            $noteData = [
                'title' => $this->request->postParam('title'),
                'description' => $this->request->postParam('description'),
            ];

            $this->database->createNote($noteData);
            $this->redirect('/', ['before' => 'created']);
        }
        $this->view->render('create');
    }

    public function showAction()
    {
        $noteId = (int) $this->request->getParam('id');

        if (!$noteId) {
            $this->redirect('/', ['error' => 'missingNoteId']);
        }
        try {
            $note = $this->database->getNote($noteId);
        } catch (NotFoundException $e) {
            $this->redirect('/', ['error' => 'noteNotFound']);
        }
        $viewParams = [
            'title' => 'Moja notatka',
            'description' => 'Opis',
            'note' => $note,
        ];
        $this->view->render('show', ['note' => $note]);
    }

    public function listAction()
    {
        $viewParams = [
            'notes' => $this->database->getNotes(),
            'before' => $this->request->getParam('before'),
            'error' => $this->request->getParam('error'),
        ];
        $this->view->render('list', [
            'notes' => $this->database->getNotes(),
            'before' => $this->request->getParam('before'),
            'error' => $this->request->getParam('error'),
        ]);
    }

    public function editAction()
    {
        $noteId = (int) $this->request->getParam('id');
        if (!$noteId) {
            $this->redirect('/', ['error' => 'missingNoteId']);
        }
        $this->view->render(
            'edit'
        );
    }
}

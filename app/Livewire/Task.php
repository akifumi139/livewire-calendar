<?php

namespace App\Livewire;

use App\Livewire\Forms\ScheduleForm;
use Livewire\Component;

class Task extends Component
{
    public $task;

    public ScheduleForm $form;

    public $showEditDialog = false;

    public function mount()
    {
        $this->form->setSchedule($this->task);
    }

    public function save()
    {
        $this->form->update();

        $this->task->refresh();

        $this->reset('showEditDialog');
    }

    public function render()
    {
        return view('livewire.task');
    }
}

<?php

namespace App\Livewire;

use App\Livewire\Forms\ScheduleForm;
use Carbon\CarbonImmutable;
use Livewire\Component;

class AddSchedule extends Component
{
    public ScheduleForm $form;
    public CarbonImmutable $day;
    public $show = false;

    public function mount()
    {
        $this->form->date = $this->day->format('Y-m-d');
    }

    public function add()
    {
        $this->form->save();

        $this->reset('show');

        $this->dispatch('added');
        $this->form->date = $this->day->format('Y-m-d');
    }

    public function render()
    {
        return view('livewire.add-schedule');
    }
}

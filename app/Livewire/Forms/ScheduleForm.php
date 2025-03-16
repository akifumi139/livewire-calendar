<?php

namespace App\Livewire\Forms;

use App\Models\Schedule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ScheduleForm extends Form
{
    #[Validate('required|min:3')]
    public $title = '';

    #[Validate('nullable')]
    public $description = '';

    #[Validate('required|date')]
    public $date = '';

    #[Validate('nullable|date_format:H:i')]
    public $start_time = null;

    #[Validate('nullable|date_format:H:i|after:start_time')]
    public $end_time = null;

    public Schedule $schedule;

    public function setSchedule(Schedule $schedule)
    {
        $this->schedule = $schedule;
        $this->title = $schedule->title;
        $this->description = $schedule->description;
        $this->date = $schedule->date->format('Y-m-d');
        $this->start_time = $schedule->start_time?->format('H:i');
        $this->end_time = $schedule->end_time?->format('H:i');
    }

    public function save()
    {
        $this->validate();

        Schedule::create([
            'user_id' => 1,
            'title' => $this->title,
            'description' => $this->description,
            'date' => $this->date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
        ]);

        $this->reset(['title', 'description', 'date', 'start_time', 'end_time']);
    }

    public function update()
    {
        $this->validate();

        $this->schedule->update([
            'title' => $this->title,
            'description' => $this->description,
            'date' => $this->date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
        ]);
    }
}

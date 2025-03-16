<?php

namespace App\Livewire;

use App\Models\Schedule;
use Carbon\CarbonImmutable;
use Carbon\CarbonPeriodImmutable;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

class Calendar extends Component
{
    #[Url]
    public ?int $year = null;
    #[Url]
    public ?int $month = null;

    public CarbonImmutable $selectedDate;

    public function mount()
    {
        $currentDate = CarbonImmutable::now();

        $selectedDate = CarbonImmutable::create(
            $this->year ?? $currentDate->year,
            $this->month ?? $currentDate->month,
            $currentDate->day
        );

        $this->selectDate($selectedDate);
    }

    public function render()
    {
        return view('livewire.calendar');
    }

    #[Computed]
    public function schedule()
    {
        $preid = $this->getMonthPreid($this->selectedDate);

        $schedule = Schedule::whereBetween('date', [$preid->first(), $preid->last()])->get();
        $groupedSchedule = $schedule->groupBy(function ($item) {
            return $item->date->format('Y-m-d');
        });

        return $preid->map(function ($date) use ($groupedSchedule) {
            return (object)[
                'date' => $date,
                'schedule' => $groupedSchedule->has($date->format('Y-m-d')) ? $groupedSchedule[$date->format('Y-m-d')] : [],
            ];
        });
    }

    public function selectDate(CarbonImmutable $date)
    {
        $this->selectedDate = $date;

        $this->year = $this->selectedDate->year;
        $this->month = $this->selectedDate->month;
    }

    private function getMonthPreid($date)
    {
        $startDate = $date->startOfMonth()->startOfWeek(CarbonImmutable::SUNDAY);
        $endDate = $startDate->addWeeks(5)->endOfWeek(CarbonImmutable::SATURDAY);

        return CarbonPeriodImmutable::create($startDate, $endDate);
    }


    public function changeSelectedDate(string $Ymd)
    {
        $date = CarbonImmutable::create($Ymd);

        $this->selectDate($date);
    }
}

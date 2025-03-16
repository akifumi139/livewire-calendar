<div class="bg-white rounded-lg shadow p-4">
  <div class="flex justify-between items-center mb-4">
    <button class="px-2 py-1 bg-gray-200 rounded"
      wire:click="changeSelectedDate('{{ $selectedDate->subMonth()->format('Y-m-d') }}')">&lt;</button>
    <h2 class="text-lg font-semibold">
      {{ $selectedDate->format('Y年m月') }}
      <button class="px-2 py-1 bg-gray-200 rounded"
        wire:click="changeSelectedDate('{{ now()->format('Y-m-d') }}')">今月</button>
    </h2>
    <button class="px-2 py-1 bg-gray-200 rounded"
      wire:click="changeSelectedDate('{{ $selectedDate->addMonth()->format('Y-m-d') }}')">&gt;</button>
  </div>
  <div class="flex justify-end">
  </div>
  <div class="grid grid-cols-7 border-b">
    @foreach (['日', '月', '火', '水', '木', '金', '土'] as $dayOfWeek)
      <div class="text-center font-semibold">{{ $dayOfWeek }}</div>
    @endforeach
    @foreach ($this->schedule as $item)
      <div wire:click="changeSelectedDate('{{ $item->date->format('Y-m-d') }}')" @class([
          'text-center p-1 min-h-24 border-t border-r',
          'border-l' => $item->date->isoFormat('ddd') == '日',
          'bg-sky-200' => $item->date->format('md') === $selectedDate->format('md'),
          'bg-gray-200' => $item->date->format('m') !== $selectedDate->format('m'),
      ])>
        <div class="flex justify-between">
          {{ $item->date->format('m/d') }}
          <livewire:add-schedule @added="$refresh" :key="$selectedDate->format('Ym') . '_' . $item->date->format('Ymd')" :day="$item->date" />
        </div>
        @foreach ($item->schedule as $task)
          <livewire:task :key="$task->id" :$task />
        @endforeach
      </div>
    @endforeach
  </div>
</div>

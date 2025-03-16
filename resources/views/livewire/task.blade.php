<div class="p-1">
  <x-dialog wire:model="showEditDialog">
    <x-dialog.open>
      <button class="font-medium cursor-pointer rounded-sm border-amber-300 border w-full"
        type="button">{{ $task->title }}</button>
    </x-dialog.open>

    <x-dialog.panel>

      <form class="flex flex-col gap-4" wire:submit="save">
        <h2 class="text-3xl font-bold mb-1">スケジュールを編集</h2>

        <hr class="w-[75%]">

        <label class="flex flex-col gap-2">
          タイトル
          <input
            class="px-3 py-2 border font-normal rounded-lg border-slate-300 read-only:opacity-50 read-only:cursor-not-allowed"
            autofocus wire:model="form.title">
          @error('form.title')
            <div class="text-sm text-red-500 font-normal">{{ $message }}</div>
          @enderror
        </label>

        <label class="flex flex-col gap-2">
          説明
          <textarea
            class="px-3 py-2 border font-normal rounded-lg border-slate-300 read-only:opacity-50 read-only:cursor-not-allowed"
            wire:model="form.description" rows="5"></textarea>
          @error('form.description')
            <div class="text-sm text-red-500 font-normal">{{ $message }}</div>
          @enderror
        </label>

        <label class="flex flex-col gap-2">
          日付
          <input
            class="px-3 py-2 border font-normal rounded-lg border-slate-300 read-only:opacity-50 read-only:cursor-not-allowed"
            type="date" wire:model="form.date">
          @error('form.date')
            <div class="text-sm text-red-500 font-normal">{{ $message }}</div>
          @enderror
        </label>

        <label class="flex flex-col gap-2">
          開始時間
          <input
            class="px-3 py-2 border font-normal rounded-lg border-slate-300 read-only:opacity-50 read-only:cursor-not-allowed"
            type="time" wire:model="form.start_time">
          @error('form.start_time')
            <div class="text-sm text-red-500 font-normal">{{ $message }}</div>
          @enderror
        </label>

        <label class="flex flex-col gap-2">
          終了時間
          <input
            class="px-3 py-2 border font-normal rounded-lg border-slate-300 read-only:opacity-50 read-only:cursor-not-allowed"
            type="time" wire:model="form.end_time">
          @error('form.end_time')
            <div class="text-sm text-red-500 font-normal">{{ $message }}</div>
          @enderror
        </label>

        <x-dialog.footer>
          <x-dialog.close>
            <button class="text-center rounded-xl bg-slate-300 text-slate-800 px-6 py-2 font-semibold"
              type="button">キャンセル</button>
          </x-dialog.close>

          <button
            class="text-center rounded-xl bg-blue-500 text-white px-6 py-2 font-semibold disabled:cursor-not-allowed disabled:opacity-50"
            type="submit">保存</button>
        </x-dialog.footer>
      </form>
    </x-dialog.panel>
  </x-dialog>

</div>

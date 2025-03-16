<div tabindex="-1" x-data="{ dialogOpen: false }" x-modelable="dialogOpen" {{ $attributes }}>
  <script defer src="{{ asset('js/alpine.js') }}"></script>

  {{ $slot }}
</div>

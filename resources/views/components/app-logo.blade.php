@props([
    'sidebar' => false,
])

@if ($sidebar)
  <flux:sidebar.brand name="Sea Education" {{ $attributes }}>
    <x-slot name="logo"
      class="flex size-20 aspect-square items-center justify-center rounded-md bg-transparent text-accent-foreground">
      <x-app-logo-icon class="fill-current text-white dark:text-black" />
    </x-slot>
  </flux:sidebar.brand>
@else
  <flux:brand name="Sea Education" {{ $attributes }}>
    <x-slot name="logo"
      class="flex size-20 aspect-square items-center justify-center rounded-md bg-transparent text-accent-foreground">
      <x-app-logo-icon class="fill-current text-white dark:text-black" />
    </x-slot>
  </flux:brand>
@endif

<?php

use Livewire\Component;
use App\Models\Program;

new class extends Component {
    public Program $program;
};
?>

<div class="relative w-full h-[50dvh] min-h-[400px]">
  {{-- Background Image with Overlay --}}
  <div class="absolute inset-0 z-0">
    <img src="{{ $program->thumbnail }}" alt="{{ $program->title }}" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-linear-to-t from-zinc-900 via-zinc-900/80 to-zinc-900/40"></div>
  </div>

  {{-- Content Container --}}
  <flux:main container class="relative z-10 h-full flex flex-col justify-end pb-12">
    <div class="max-w-4xl space-y-4">
      {{-- Badges row --}}
      <div class="flex flex-wrap items-center gap-3">
        @if ($program->category)
          <flux:badge rounded variant="solid" color="zinc"
            class="backdrop-blur-md bg-zinc-800/80 border-none text-white!">
            {{ $program->category->name }}
          </flux:badge>
        @endif

        <flux:badge rounded variant="solid" color="zinc"
          class="backdrop-blur-md bg-zinc-800/80 border-none text-white!">
          {{ $program->type }}
        </flux:badge>

        @if ($program->country_code)
          <flux:badge rounded variant="solid" color="zinc"
            class="backdrop-blur-md bg-zinc-800/80 border-none flex items-center gap-2">
            <img src="{{ $program->flag }}" alt="{{ $program->country_code }}" class="w-4 h-4 object-contain">
            <span class="text-white! font-medium">{{ $program->country_code }}</span>
          </flux:badge>
        @endif

        @if ($program->is_open)
          <flux:badge rounded variant="solid" color="green" class="backdrop-blur-md border-none">
            Registration Open
          </flux:badge>
        @else
          <flux:badge rounded variant="solid" color="red" class="backdrop-blur-md border-none">
            Closed
          </flux:badge>
        @endif
      </div>

      {{-- Title and Meta --}}
      <div class="space-y-6">
        <flux:heading level="1" class="text-4xl md:text-5xl lg:text-6xl font-bold text-white tracking-tight">
          {{ $program->title }}
        </flux:heading>

        <div class="flex items-center gap-6 text-zinc-300">
          <div class="flex items-center gap-2">
            <flux:icon icon="users" class="w-5 h-5 text-accent" />
            <span class="font-medium">{{ number_format($program->user_joined) }} joined</span>
          </div>

          <div class="flex items-center gap-2">
            <flux:icon icon="clock" class="w-5 h-5 text-accent" />
            <span class="font-medium">{{ $program->duration }}</span>
          </div>

          @if ($program->rating)
            <div class="flex items-center gap-2">
              <flux:icon icon="star" variant="solid" class="w-5 h-5 text-yellow-500" />
              <span class="font-medium">{{ number_format($program->rating, 1) }} Rating</span>
            </div>
          @endif
        </div>
      </div>
    </div>
  </flux:main>
</div>

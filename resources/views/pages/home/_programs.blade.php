<?php

use Livewire\Component;
use App\Models\Program;
use Livewire\Attributes\Computed;

new class extends Component {
    #[Computed]
    public function programs()
    {
        return Program::where('is_open', true)->orderBy('user_joined', 'desc')->take(3)->get();
    }
};
?>

<div>
  <section id="programs" class="mt-8 mb-4 lg:mt-28">
    <flux:heading variant="strong" level="2" size="lg"
      class="font-semibold! text-3xl! text-accent my-4 text-center">
      Popular Programs
    </flux:heading>
    <flux:separator class="w-16! h-0.5! mx-auto mb-10" />
    <div class="grid grid-cols-[repeat(auto-fit,minmax(min(100%,320px),1fr))] gap-8">
      @foreach ($this->programs as $program)
        <flux:card
          class="flex flex-col h-full bg-white dark:bg-neutral-900 border-none shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group cursor-default p-0 overflow-hidden">
          <div class="relative h-48 overflow-hidden">
            <img src="{{ $program->thumbnail }}" alt="{{ $program->title }}"
              class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>

            {{-- Top Right: Country Flag --}}
            <flux:badge rounded variant="solid"
              class="bg-white! dark:bg-neutral-800! absolute top-4 right-4 flex items-center gap-2 px-2 py-1">
              <img src="{{ $program->flag }}" alt="{{ $program->country_code }}" class="w-6 h-6 object-contain">
              <span class="text-sm font-bold text-black! dark:text-white!">{{ $program->country_code }}</span>
            </flux:badge>

            {{-- Bottom Left: Availability --}}
            <div class="absolute bottom-4 left-4">
              @if ($program->is_open)
                <flux:badge color="blue" variant="solid" size="sm"
                  class="backdrop-blur-md bg-blue-500/80 border-none">Available</flux:badge>
              @else
                <flux:badge color="zinc" variant="solid" size="sm"
                  class="backdrop-blur-md bg-zinc-500/80 border-none">Expired</flux:badge>
              @endif
            </div>
          </div>

          <div class="flex-1 space-y-4 p-6">
            <div class="flex justify-between items-start">
              <div class="flex flex-col gap-1">
                <flux:heading level="3"
                  class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-accent transition-colors">
                  {{ $program->title }}
                </flux:heading>
                <div class="flex items-center gap-0.5">
                  @php $stars = round($program->rating ?? 0) @endphp
                  <span
                    class="text-sm font-bold text-gray-900 dark:text-white mr-1">{{ number_format($program->rating, 1) }}</span>
                  @for ($i = 1; $i <= 5; $i++)
                    <flux:icon icon="star" variant="{{ $i <= $stars ? 'solid' : 'outline' }}"
                      class="w-4 h-4 {{ $i <= $stars ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}" />
                  @endfor
                </div>
              </div>
            </div>

            <flux:text class="text-gray-600 dark:text-gray-400 line-clamp-3">
              {{ $program->description }}
            </flux:text>
          </div>

          <div class="px-6 pb-6">
            <flux:separator class="mx-auto mb-4" />

            <div class="mt-4">
              <div class="flex justify-between items-center mb-4">
                <div class="flex items-center self-end gap-2">
                  <flux:icon icon="users" class="w-5 h-5 text-accent" />
                  <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ number_format($program->user_joined) }} joined
                  </span>
                </div>

                <div class="text-right">
                  @if ($program->price)
                    @if ($program->discount)
                      <div class="flex justify-end items-center gap-2">
                        <flux:badge color="red" size="sm">{{ $program->discount }}% OFF</flux:badge>
                        <div class="text-xs text-gray-500 line-through">Rp
                          {{ number_format($program->price, 0, ',', '.') }}</div>
                      </div>
                      <div class="text-lg font-bold text-accent">Rp
                        {{ number_format($program->price - ($program->price * $program->discount) / 100, 0, ',', '.') }}
                      </div>
                    @else
                      <div class="text-lg font-bold text-accent-foreground">Rp
                        {{ number_format($program->price, 0, ',', '.') }}
                      </div>
                    @endif
                  @endif
                </div>
              </div>

              @if ($program->is_open)
                <flux:button href="{{ route('program.detail', $program->slug) }}" wire:navigate variant="primary"
                  class="w-full bg-accent hover:bg-accent/90 text-white font-semibold py-2 rounded-lg transition-all cursor-pointer">
                  Join Program
                </flux:button>
              @else
                <flux:button disabled variant="ghost"
                  class="w-full border-2 border-gray-200 dark:border-neutral-800 text-gray-400 dark:text-neutral-600 font-semibold py-2 rounded-lg cursor-default">
                  Not Available
                </flux:button>
              @endif
            </div>
          </div>
        </flux:card>
      @endforeach
    </div>
  </section>
</div>

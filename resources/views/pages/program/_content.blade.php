<?php

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;
use App\Models\Program;

new class extends Component {
    use WithPagination;

    public $search = '';
    public $categories = [];
    public $hasDiscount = false;
    public $sort = 'newest';

    #[On('search-updated')]
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    #[On('filters-updated')]
    public function updateFilters($filters)
    {
        $this->categories = $filters['categories'] ?? [];
        $this->hasDiscount = $filters['hasDiscount'] ?? false;
        $this->sort = $filters['sort'] ?? 'newest';
        $this->resetPage();
    }

    #[Computed]
    public function programs()
    {
        $query = Program::where('is_open', true);

        if ($this->search) {
            $query->where(function ($q) {
                // $q->where('title', 'like', '%' . $this->search . '%')->orWhere('description', 'like', '%' . $this->search . '%');
                $q->where('title', 'like', '%' . $this->search . '%');
            });
        }

        if (!empty($this->categories)) {
            $query->whereIn('category_id', $this->categories);
        }

        if ($this->hasDiscount) {
            $query->whereNotNull('discount')->where('discount', '>', 0);
        }

        match ($this->sort) {
            'popular' => $query->orderBy('user_joined', 'desc'),
            'rating' => $query->orderBy('rating', 'desc'),
            'oldest' => $query->orderBy('created_at', 'asc'),
            default => $query->orderBy('created_at', 'desc'),
        };

        return $query->paginate(9);
    }
};
?>

<div>
  @if ($this->programs->isEmpty())
    <div
      class="flex flex-col items-center justify-center py-20 text-center border border-dashed border-gray-300 dark:border-neutral-700 rounded-2xl w-full">
      <flux:icon icon="magnifying-glass" class="w-12 h-12 text-gray-300 dark:text-neutral-600 mb-4" />
      <flux:heading size="xl" class="font-bold text-gray-900 dark:text-white">No programs found</flux:heading>
      <flux:text class="text-gray-500 mt-2">Try adjusting your search or filters to find what you're looking for.
      </flux:text>
    </div>
  @else
    <div class="grid grid-cols-[repeat(auto-fit,minmax(min(100%,240px),1fr))] gap-6">
      @foreach ($this->programs as $program)
        <flux:card
          class="flex flex-col h-full bg-white dark:bg-neutral-900 border-none shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group cursor-default p-0 overflow-hidden">
          <div class="relative h-38 overflow-hidden">
            <img src="{{ $program->thumbnail }}" alt="{{ $program->title }}"
              class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
            <div class="absolute inset-0 bg-linear-to-t from-black/60 to-transparent"></div>

            {{-- Top Right: Country Flag --}}
            <flux:badge rounded variant="solid"
              class="bg-white! dark:bg-neutral-800! absolute top-4 right-4 flex items-center gap-2 px-2 py-1">
              <img src="{{ $program->flag }}" alt="{{ $program->country_code }}" class="w-5 h-5 object-contain">
              <span class="text-xs font-bold text-black! dark:text-white!">{{ $program->country_code }}</span>
            </flux:badge>

            {{-- Bottom Left: Availability
            <div class="absolute bottom-4 left-4">
              <flux:badge color="blue" variant="solid" size="sm"
                class="backdrop-blur-md bg-blue-500/80 border-none">Available</flux:badge>
            </div> --}}
          </div>

          <div class="flex-1 space-y-2 p-4">
            <div class="flex items-center space-x-2">
              {{-- Top ... in ... Badge, Category badge, Program type badge --}}
              <flux:badge rounded variant="solid" class="bg-white! dark:bg-neutral-800! text-sm! font-normal!">
                {{ $program->category->name }}
              </flux:badge>
              <flux:badge rounded variant="solid" class="bg-white! dark:bg-neutral-800! text-sm! font-normal!">
                {{ $program->type }}
              </flux:badge>
            </div>
            <div class="flex justify-between items-start">
              <div class="flex flex-col gap-1">
                <flux:heading level="3"
                  class="text-base! font-bold text-gray-900 dark:text-white group-hover:text-accent transition-colors line-clamp-1">
                  {{ $program->title }}
                </flux:heading>
              </div>
            </div>

            <flux:text class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2">
              {{ $program->description }}
            </flux:text>
          </div>

          <div class="px-4 pb-4">
            <flux:separator class="mx-auto" />

            <div class="mt-4">
              <div class="flex justify-between items-end mb-4">
                <div class="flex flex-col items-start gap-1">
                  <div class="flex items-center gap-0.5">
                    {{-- @php $stars = round($program->rating ?? 0) @endphp --}}
                    <flux:icon icon="star" variant="solid" class="w-4 h-4 text-yellow-400 mr-1" />
                    <span
                      class="text-xs! font-normal! text-gray-900 dark:text-white">{{ number_format($program->rating, 1) }}</span>
                    {{-- @for ($i = 1; $i <= 5; $i++)
                      <flux:icon icon="star" variant="{{ $i <= $stars ? 'solid' : 'outline' }}"
                        class="w-4 h-4 {{ $i <= $stars ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}" />
                    @endfor --}}
                  </div>
                  <div class="flex items-center gap-2">
                    <flux:icon icon="users" class="w-4 h-4 text-accent" />
                    <span class="text-xs font-medium text-gray-700 dark:text-gray-300">
                      {{ number_format($program->user_joined) }} joined
                    </span>
                  </div>
                </div>

                <div class="text-right">
                  @if ($program->price)
                    @if ($program->discount)
                      <div class="flex justify-end items-center gap-2">
                        <flux:badge color="orange" size="sm">{{ $program->discount }}%</flux:badge>
                        <div class="text-xs text-gray-500 line-through">Rp
                          {{ number_format($program->price, 0, ',', '.') }}</div>
                      </div>
                      <div class="text-base font-bold text-accent">Rp
                        {{ number_format($program->price - ($program->price * $program->discount) / 100, 0, ',', '.') }}
                      </div>
                    @else
                      <div class="text-base font-bold text-accent-foreground">Rp
                        {{ number_format($program->price, 0, ',', '.') }}</div>
                    @endif
                  @endif
                </div>
              </div>

              <flux:button href="{{ route('program.detail', $program->slug) }}" wire:navigate variant="primary"
                class="w-full bg-accent hover:bg-accent/90 text-white text-sm font-semibold py-1.5 rounded-lg transition-all cursor-pointer">
                Join Program
              </flux:button>
            </div>
          </div>
        </flux:card>
      @endforeach
    </div>

    <div class="mt-8 flex gap-8 justify-center sm:justify-end">
      {{ $this->programs->links() }}
    </div>
  @endif
</div>

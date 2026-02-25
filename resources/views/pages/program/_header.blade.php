<?php

use Livewire\Component;

new class extends Component {
    public $search = '';

    public function updatedSearch()
    {
        $this->dispatch('search-updated', search: $this->search);
    }
};
?>

<div>
  <div class="flex flex-col justify-between items-center gap-8 w-full">
    <div class="text-center">
      <flux:heading size="xl" level="1" class="font-semibold! text-4xl mb-4 text-accent">Our Programs
      </flux:heading>
      <flux:text class="text-lg text-gray-500">Discover the right program to advance your career and skills.</flux:text>
    </div>
    <div class="w-full">
      <flux:input id="program_searchbar" wire:model.live.debounce.300ms="search" icon="magnifying-glass"
        placeholder="Search programs..." />
    </div>
  </div>
  {{-- <flux:separator class="mt-8" /> --}}
</div>

<?php

use Livewire\Component;

new class extends Component {
    //
};
?>

<x-layouts::app :title="__('Sea Education - Programs')" :description="__('Description')">
  <flux:main container>
    <livewire:pages::program._header />

    <div class="flex flex-col md:flex-row gap-8 mt-8">
      <div class="w-full md:w-64 shrink-0">
        <livewire:pages::program._sidebar />
      </div>
      <div class="flex-1">
        <livewire:pages::program._content />
      </div>
    </div>
  </flux:main>
</x-layouts::app>

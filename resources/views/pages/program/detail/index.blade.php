<?php

use Livewire\Component;
use App\Models\Program;

new class extends Component {
    public Program $program;
};
?>

<x-layouts::app>
  <livewire:pages::program.detail._header :program="$program" />
  <flux:main container>
    <div class="flex flex-col md:flex-row gap-6 mt-8">
      <livewire:pages::program.detail._content :program="$program" />
      <livewire:pages::program.detail._card :program="$program" />
    </div>
  </flux:main>
</x-layouts::app>

<?php

use Livewire\Component;

new class extends Component {
    //
};
?>

<x-layouts::app :title="__('Sea Education')" :description="__('Description')">
  <flux:main container>
    <livewire:pages::home._hero />
    <livewire:pages::home._counter />
    <livewire:pages::home._programs />
    <livewire:pages::home._partnership />
    <livewire:pages::home._testimony />
  </flux:main>
</x-layouts::app>

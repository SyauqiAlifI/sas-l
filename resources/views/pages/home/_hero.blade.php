<?php

use Livewire\Component;

new class extends Component {
    //
};
?>

<div>
  <section id="hero"
    class="min-h-screen relative overflow-hidden flex flex-col lg:flex-row lg:justify-between lg:gap-8">
    <div class="sm:text-center lg:text-left flex flex-col justify-center lg:justify-start flex-1">
      <flux:text variant="strong" class="font-bold">Sea Education</flux:text>
      <flux:heading variant="strong" level="1" size="xl" class="font-semibold! text-5xl/tight! text-accent my-4">
        Navigate your future
      </flux:heading>
      <flux:text class="text-lg lg:text-xl">
        Kendalikan Masa Depanmu, wujudkan impianmu bekerja di luar negeri
      </flux:text>
      <div class="mt-5 sm:mt-12 flex flex-col sm:flex-row justify-center lg:justify-start gap-3">
        <a href="{{ route('register') }}" wire:navigate class="btn-primary">
          Get Started
        </a>
        <a href="{{ route('register') }}" wire:navigate class="btn-ghost">
          View Success Stories
        </a>
      </div>
    </div>
    {{-- <flux:spacer /> --}}
    <div class="-translate-y-8 max-w-md lg:w-lg mx-auto -z-10 flex-1">
      <img class="h-fit w-full object-cover" src="{{ asset('images/banner.webp') }}" alt="Banner.webp">
    </div>
  </section>
</div>

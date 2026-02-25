<?php

use Livewire\Component;
use App\Models\Partnership;
use Livewire\Attributes\Computed;

new class extends Component {
    #[Computed]
    public function partnerships()
    {
        return Partnership::all();
    }
};
?>

<div>
  <section id="partnerships" class="mt-4 mb-4 lg:mt-24">
    <flux:heading variant="strong" level="2" size="lg"
      class="font-semibold! text-3xl! text-accent my-4 text-center">
      Our Partners
    </flux:heading>
    <flux:separator class="w-16! h-0.5! mx-auto mb-10" />
    <div class="grid grid-cols-[repeat(auto-fit,minmax(min(100%,100px),1fr))] gap-4 items-center justify-items-center">
      @foreach ($this->partnerships as $partnership)
        <a href="{{ $partnership->url_link }}" target="_blank" title="{{ $partnership->name }}"
          class="p-4 grayscale hover:grayscale-0 transition-all duration-300 transform hover:scale-110">
          <img src="{{ $partnership->url_image }}" alt="{{ $partnership->name }}" class="h-auto w-full object-cover">
        </a>
      @endforeach
    </div>
  </section>
</div>

<?php

use Livewire\Component;

new class extends Component {
    //
};
?>
<div>
  <section class="relative z-1 lg:-mt-96" id="counters">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-8">
      <!-- Counter 1 -->
      <div class="card-stat">
        <div class="icon-box icon-box-stat">
          <svg class="" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
          </svg>
        </div>
        <div class="text-counter">
          <span class="counter" data-target="400">0</span>+
        </div>
        <flux:text class="text-lg">Siswa terdaftar</flux:text>
      </div>

      <!-- Counter 2 -->
      <div class="card-stat">
        <div class="icon-box icon-box-stat">
          <svg class="" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <div class="text-counter">
          <span class="counter" data-target="90">0</span>%
        </div>
        <flux:text class="text-lg">Alumni Direkrut</flux:text>
      </div>

      <!-- Counter 3 -->
      <div class="card-stat">
        <div class="icon-box icon-box-stat">
          <svg class="" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
          </svg>
        </div>
        <div class="text-counter">
          <span class="counter" data-target="15">0</span>+
        </div>
        <flux:text class="text-lg">Hiring Partners</flux:text>
      </div>

      <!-- Counter 4 -->
      <div class="card-stat">
        <div class="icon-box icon-box-stat">
          <svg class="" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 002 2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <div class="text-counter">
          <span class="counter" data-target="5">0</span>+
        </div>
        <flux:text class="text-lg">Negara Tujuan</flux:text>
      </div>
    </div>
  </section>
</div>

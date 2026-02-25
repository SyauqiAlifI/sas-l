<?php

use Livewire\Component;

new class extends Component {
    public array $testimonials = [
        [
            'name' => 'Sarah Anderson',
            'role' => 'Nurse via Germany Program',
            'image' => 'https://ui-avatars.com/api/?name=Sarah+Anderson&background=eef2ff&color=4f46e5',
            'content' => 'The support I received was incredible. From language classes to the final visa interview, the team guided me through every complex step of moving to Germany.',
        ],
        [
            'name' => 'Michael Chen',
            'role' => 'Engineer via Japan Program',
            'image' => 'https://ui-avatars.com/api/?name=Michael+Chen&background=f0fdf4&color=16a34a',
            'content' => 'Working in Japan has always been my dream. This program made it a reality with their structured approach and dedicated mentors who truly care about your success.',
        ],
        [
            'name' => 'Jessica Wong',
            'role' => 'Hospitality via Australia Program',
            'image' => 'https://ui-avatars.com/api/?name=Jessica+Wong&background=fff7ed&color=ea580c',
            'content' => "I was nervous about the process, but everything was handled so professionally. I've been working in Melbourne for six months now and I couldn't be happier!",
        ],
    ];
};
?>
<div>
  <section id="testimonials" class="container mx-auto px-4 py-16 lg:py-24">
    <div class="text-center mb-12 sm:mb-16">
      <flux:heading variant="strong" level="2" size="lg"
        class="font-semibold! text-3xl! text-accent my-4 text-center">
        Success Stories
      </flux:heading>
      <flux:separator class="w-16! h-0.5! mx-auto mb-10" />
      <p class="text-zinc-600 dark:text-zinc-400 max-w-2xl mx-auto text-lg leading-relaxed">
        Discover how we've helped professionals achieve their dreams of working abroad.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
      @foreach ($this->testimonials as $testimonial)
        <div
          class="flex flex-col h-full bg-white dark:bg-zinc-900/50 rounded-2xl p-8 border border-zinc-100 dark:border-zinc-800 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300">
          <div class="mb-6">
            <svg class="w-8 h-8 text-blue-500 dark:text-blue-600 fill-current" viewBox="0 0 24 24">
              <path
                d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H15.017C14.4647 8 14.017 8.44772 14.017 9V11C14.017 11.5523 13.5693 12 13.017 12H12.017V5H22.017V15C22.017 18.3137 19.3307 21 16.017 21H14.017ZM5.01691 21L5.01691 18C5.01691 16.8954 5.91234 16 7.01691 16H10.0169C10.5692 16 11.0169 15.5523 11.0169 15V9C11.0169 8.44772 10.5692 8 10.0169 8H6.01691C5.46462 8 5.01691 8.44772 5.01691 9V11C5.01691 11.5523 4.56919 12 4.01691 12H3.01691V5H13.0169V15C13.0169 18.3137 10.3306 21 7.01691 21H5.01691Z" />
            </svg>
          </div>
          <p class="text-zinc-600 dark:text-zinc-300 mb-8 leading-relaxed grow italic">
            "{{ $testimonial['content'] }}"
          </p>
          <div class="flex items-center gap-4 mt-auto pt-6 border-t border-zinc-100 dark:border-zinc-800">
            <img src="{{ $testimonial['image'] }}" alt="{{ $testimonial['name'] }}"
              class="w-12 h-12 rounded-full object-cover ring-2 ring-white dark:ring-zinc-800 shadow-sm">
            <div>
              <h4 class="font-semibold text-zinc-900 dark:text-white text-base">
                {{ $testimonial['name'] }}
              </h4>
              <p class="text-sm text-zinc-500 dark:text-zinc-400 font-medium">
                {{ $testimonial['role'] }}
              </p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </section>
</div>

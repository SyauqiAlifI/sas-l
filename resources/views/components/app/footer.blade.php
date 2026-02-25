<?php

use Livewire\Component;

new class extends Component {
    //
};
?>

<footer class="bg-white dark:bg-neutral-900 border-t border-gray-100 dark:border-neutral-800">
    <flux:main container>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8">
            {{-- Company Info --}}
            <div class="space-y-6">
                <x-app-logo class="h-10 w-auto" />
                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed max-w-xs">
                    Sea Education is committed to providing world-class educational programs and partnerships to
                    empower the next generation of leaders.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-accent transition-colors">
                        <x-fab-facebook class="w-5 h-5" />
                    </a>
                    <a href="#" class="text-gray-400 hover:text-accent transition-colors">
                        <x-fab-x-twitter class="w-5 h-5" />
                    </a>
                    <a href="#" class="text-gray-400 hover:text-accent transition-colors">
                        <x-fab-instagram class="w-5 h-5" />
                    </a>
                    <a href="#" class="text-gray-400 hover:text-accent transition-colors">
                        <x-fab-linkedin class="w-5 h-5" />
                    </a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div>
                <h4 class="text-gray-900 dark:text-white font-bold mb-6 text-lg">Quick Links</h4>
                <ul class="space-y-4">
                    <li><a href="{{ route('home') }}"
                            class="text-gray-600 dark:text-gray-400 hover:text-accent transition-colors text-sm">Home</a>
                    </li>
                    <li><a href="{{ route('program') }}"
                            class="text-gray-600 dark:text-gray-400 hover:text-accent transition-colors text-sm">Our
                            Programs</a></li>
                    <li><a href="#partnerships"
                            class="text-gray-600 dark:text-gray-400 hover:text-accent transition-colors text-sm">Partnerships</a>
                    </li>
                    <li><a href="#testimonials"
                            class="text-gray-600 dark:text-gray-400 hover:text-accent transition-colors text-sm">Testimonials</a>
                    </li>
                </ul>
            </div>

            {{-- Legal --}}
            <div>
                <h4 class="text-gray-900 dark:text-white font-bold mb-6 text-lg">Support & Legal</h4>
                <ul class="space-y-4">
                    <li><a href="#"
                            class="text-gray-600 dark:text-gray-400 hover:text-accent transition-colors text-sm">Terms
                            of Service</a></li>
                    <li><a href="#"
                            class="text-gray-600 dark:text-gray-400 hover:text-accent transition-colors text-sm">Privacy
                            Policy</a></li>
                    <li><a href="#"
                            class="text-gray-600 dark:text-gray-400 hover:text-accent transition-colors text-sm">Cookie
                            Policy</a></li>
                    <li><a href="#"
                            class="text-gray-600 dark:text-gray-400 hover:text-accent transition-colors text-sm">Help
                            Center</a></li>
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h4 class="text-gray-900 dark:text-white font-bold mb-6 text-lg">Get in Touch</h4>
                <ul class="space-y-4">
                    <li class="flex items-start space-x-3">
                        <flux:icon icon="map-pin" class="w-5 h-5 text-accent shrink-0" />
                        <span class="text-gray-600 dark:text-gray-400 text-sm">Bintaro Business Center
                            Jl. RC. Veteran Raya No.1i, Bintaro
                            Pesanggrahan, Kota Jakarta Selatan
                            Jakarta - 12330</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <flux:icon icon="phone" class="w-5 h-5 text-accent shrink-0" />
                        <span class="text-gray-600 dark:text-gray-400 text-sm">+62 21 1234 5678</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <flux:icon icon="envelope" class="w-5 h-5 text-accent shrink-0" />
                        <span class="text-gray-600 dark:text-gray-400 text-sm">hello@seaeducation.com</span>
                    </li>
                </ul>
            </div>
        </div>

        <flux:separator class="my-10" />

        <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <p class="text-gray-500 dark:text-gray-500 text-sm">
                &copy; {{ date('Y') }} Sea Education. All rights reserved.
            </p>
            <div class="flex items-center space-x-6">
                <span class="text-gray-400 dark:text-gray-600 text-xs italic">Navigate Your Future.</span>
            </div>
        </div>
    </flux:main>
</footer>

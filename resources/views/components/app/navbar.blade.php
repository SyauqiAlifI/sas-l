<?php

use Livewire\Component;

new class extends Component {
    //
};
?>

<flux:header container sticky class="bg-transparent transition-color duration-200" id="navbar">
    <x-app-logo href="{{ route('home') }}" wire:navigate class="h-fit" />
    <flux:navbar id="nav-items" class="hidden lg:flex gap-4 items-center ml-8 h-full -mb-px p-0!">
        <flux:navbar.item href="{{ route('home') }}" wire:navigate>Home</flux:navbar.item>
        <flux:navbar.item href="{{ route('program') }}" wire:navigate>Programs</flux:navbar.item>
        <flux:navbar.item href="#partnerships" wire:navigate>Partnerships</flux:navbar.item>
        <flux:navbar.item href="#testimonials" wire:navigate>Testimonials</flux:navbar.item>
    </flux:navbar>
    <flux:spacer />
    <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="right" />
    <flux:sidebar sticky collapsible="mobile" id="sidebar" class="lg:hidden bg-white dark:bg-neutral-900">
        <flux:sidebar.header>
            <x-app-logo href="{{ route('home') }}" wire:navigate class="h-fit" />
        </flux:sidebar.header>
        <flux:sidebar.nav>
            <flux:sidebar.item href="{{ route('home') }}" wire:navigate>Home</flux:sidebar.item>
            <flux:sidebar.item href="{{ route('program') }}" wire:navigate>Programs</flux:sidebar.item>
            <flux:sidebar.item href="#partnerships" wire:navigate>Partnerships</flux:sidebar.item>
            <flux:sidebar.item href="#testimonials" wire:navigate>Testimonials</flux:sidebar.item>
        </flux:sidebar.nav>
    </flux:sidebar>
</flux:header>

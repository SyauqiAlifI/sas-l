<?php

use Livewire\Component;
use App\Models\Category;

new class extends Component {
    public $categories = [];
    public $hasDiscount = false;
    public $sort = 'newest';

    public function updated()
    {
        $this->dispatch('filters-updated', [
            'categories' => $this->categories,
            'hasDiscount' => $this->hasDiscount,
            'sort' => $this->sort,
        ]);
    }

    public function with()
    {
        return [
            'allCategories' => Category::all(),
        ];
    }
};
?>

<div class="space-y-8 sticky top-24">
  {{-- Sorting --}}
  <div>
    <flux:heading size="lg" class="mb-3 font-semibold">Sort By</flux:heading>
    <flux:select wire:model.live="sort">
      <flux:select.option value="newest">Newest</flux:select.option>
      <flux:select.option value="popular">Popularity</flux:select.option>
      <flux:select.option value="rating">Highest Rated</flux:select.option>
      <flux:select.option value="oldest">Oldest</flux:select.option>
    </flux:select>
  </div>

  {{-- Filters --}}
  <div>
    <flux:heading size="lg" class="mb-3 font-semibold">Filters</flux:heading>

    <div
      class="space-y-4 shadow-sm border border-gray-100 dark:border-neutral-800 p-4 rounded-xl bg-white dark:bg-neutral-900 border-none">
      <flux:checkbox wire:model.live="hasDiscount" label="With Discount" />
    </div>
  </div>

  {{-- Categories --}}
  <div>
    <flux:heading size="lg" class="mb-3 font-semibold">Categories</flux:heading>
    <div
      class="space-y-3 mt-3 shadow-sm border border-gray-100 dark:border-neutral-800 p-4 rounded-xl bg-white dark:bg-neutral-900 border-none">
      @forelse($allCategories as $category)
        <flux:checkbox wire:model.live="categories" value="{{ $category->id }}" label="{{ $category->name }}" />
      @empty
        <flux:text class="text-sm text-gray-500">No categories available.</flux:text>
      @endforelse
    </div>
  </div>
</div>

<div style="text-align: center">
    <button wire:click="increment">+</button>
    <h1>{{ ($count) ? $count : 0 }}</h1>
    <button wire:click="decrement">-</button>
</div>

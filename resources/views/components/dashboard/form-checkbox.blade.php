@props([
    'isCheck' => null,
    'target' => null
])

<input type="checkbox" id="{{ $target }}" {{ $attributes }} @checked($isCheck) >
@props([
    'name',
    'id' => null,
    'rows' => 4,
    'placeholder' => '',
    'value' => '',
])

<textarea
    name="{{ $name }}"
    id="{{ $id ?? $name }}"
    rows="{{ $rows }}"
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge(['class' => 'mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-800 dark:text-white dark:border-gray-600']) }}
>{{ old($name, $value) }}</textarea>

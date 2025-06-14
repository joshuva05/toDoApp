@props(['id' => null, 'name', 'checked' => false, 'value' => '1'])

<input
    type="checkbox"
    name="{{ $name }}"
    id="{{ $id ?? $name }}"
    value="{{ $value }}"
    {{ $checked ? 'checked' : '' }}
    {{ $attributes->merge(['class' => 'rounded border-gray-300 text-indigo-600 shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) }}>

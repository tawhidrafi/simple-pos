<label
    for="{{ $name }}"
    class="block mb-2 text-sm font-medium text-gray-900">
    {{ $label }}
</label>
<input
    value="{{ $value ?? '' }}"
    type="{{ $type }}"
    name="{{ $name }}"
    id="{{ $name }}"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
    placeholder="{{ $placeholder }}">
<table
    {{ $attributes }}
    class="w-full text-sm text-left rtl:text-right text-gray-500">
    <thead>
        {{ $header }}
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
</table>
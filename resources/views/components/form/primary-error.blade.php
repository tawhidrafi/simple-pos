@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="p-4 mb-4 text-sm text-red-700 rounded-lg bg-red-100" role="alert">
    <span class="font-medium">Error!</span> {{ $error }}
</div>
@endforeach
@endif
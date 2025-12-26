@foreach ($errors->all() as $error)
<div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
    <div>
        <span class="font-medium">Error!</span> {{ $error }}
    </div>
</div>
@endforeach
@if (Session::has('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-400" role="alert">
        <span class="font-medium">Success</span> {{ Session::get('success') }}
    </div>
@endif
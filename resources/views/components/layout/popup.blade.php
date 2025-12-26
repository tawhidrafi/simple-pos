@if (session('success'))
<div
    id="alert-popup"
    class="fixed top-20 right-0 transform translate-x-full flex items-center p-4 mb-4 text-green-600 rounded-lg bg-green-200 w-max transition-transform duration-500 z-20"
    role="alert">
    <i class="fa-regular fa-circle-check"></i>
    <div class="ms-3 text-sm font-medium mr-20">{{ session('success') ?? 'success Message' }}</div>
    <button
        type="button"
        id="close-alert"
        class="ms-auto -mx-1.5 -my-1.5 hover:bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 bg-green-200 inline-flex items-center justify-center h-8 w-8"
        aria-label="Close">
        <i class="fa-solid fa-xmark"></i>
    </button>
</div>
@endif
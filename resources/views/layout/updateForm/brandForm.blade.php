<form enctype="multipart/form-data" action=" {{ route('Brand.update', $brand->id) }}" method="POST">
    @csrf
    @method('put')
    <div class="flex flex-wrap">
        <div class="w-1/3 mb-4 mr-4">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Brand
                Name</label>
            <input value="{{ $brand->title }}" type="text" name="title" id="title"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
            @error('title')
                @include('layout.form.errorMessage')
            @enderror
        </div>
    </div>
    <button type="submit"
        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg">Update
        Brand</button>
</form>
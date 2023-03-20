<x-app-layout>
    <form method="post" action="{{ route('discussions.store') }}">
        @csrf
        <div>
            <x-form-label for='category'>Category</x-form-label>
            <select name="category_id" id="category" required>
                @foreach ($categories as $category)
                    <option value='{{ $category->id }}'>{{ $category->name }}</option>
                @endforeach
            </select>
            <x-input-error name='category_id'></x-input-error>
        </div>
        <div>
            <x-form-label for='title'>Title</x-form-label>
            <x-form-input type='text' name='title' id='title' old-value='title'/>
            <x-input-error name='title'></x-input-error>
        </div>
        <div>
            <x-form-label for='content'>Content</x-form-label>
            <x-text-area name='content' id='content'>{{old('content')}}</x-text-area>
            <x-input-error name='content'></x-input-error>
        </div>
        <x-alert-error></x-alert-error>
        <x-submit-button value="Save"></x-submit-button>
    </form>
</x-app-layout>
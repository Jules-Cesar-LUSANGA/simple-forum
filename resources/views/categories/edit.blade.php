<x-app-layout>
    <form method="post" action="{{ route('categories.update', $category->id) }}">
        @csrf
        @method('put')
        <div>
            <x-form-label for='name'>Category name</x-form-label>
            <x-form-input type='text' name='name' id='name' value="{{ old('name') ? old('name') : $category->name }}"/>
            <x-input-error name='name'></x-input-error>
        </div>
        <div>
        <x-alert-success></x-alert-success>
        <x-alert-error></x-alert-error>
        <x-submit-button value="Save"></x-submit-button>
    </form>
</x-app-layout>
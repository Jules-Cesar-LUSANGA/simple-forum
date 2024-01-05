<x-app-layout>
    <form method="post" action="{{ route('categories.store') }}">
        @csrf
        <div>
            <x-form-label for='name'>Categpry name</x-form-label>
            <x-form-input type='text' name='name' id='name' old-value='name'/>
            <x-input-error name='name'></x-input-error>
        </div>
        <x-alert-error></x-alert-error>
        <x-alert-success></x-alert-success>
        <x-submit-button value="Save"></x-submit-button>
    </form>
</x-app-layout>
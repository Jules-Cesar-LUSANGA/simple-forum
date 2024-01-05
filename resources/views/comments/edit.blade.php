<x-app-layout>
    <form method="post" action="{{ route('comments.edit', $comment->id) }}">
        @csrf
        @method('put')
        <div>
            <x-form-label for='content'>Comment</x-form-label>
            <x-text-area name='content' id='content'>{{ old('content') ? old('content') : $comment->content }}</x-text-area>
            <x-input-error name='content'></x-input-error>
        </div>
        <div>
        <x-alert-success></x-alert-success>
        <x-alert-error></x-alert-error>
        <x-submit-button value="Save"></x-submit-button>
    </form>
</x-app-layout>

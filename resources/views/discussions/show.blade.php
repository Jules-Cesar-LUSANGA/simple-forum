<x-app-layout>
    <h2>All discussions</h2>

    <div>
        <p>
            <strong> {{ $discussion->user->name }} </strong>
        </p>
        <p>
            <em>{{ $discussion->category->name }}</em>
        </p>
        <p>
            <strong>{{ $discussion->title }} [{{ $discussion->created_at->diffForHumans() }}] </strong>
        </p>
        <p>
            {{ $discussion->resolved ? 'Resolved' : 'Not resolved' }}
        </p>

        <p>
            {{ $discussion->content }}
        </p>

        @auth
            @if (Auth::id() == $discussion->user_id)

                <form action="{{ route('discussions.destroy', $discussion->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <x-submit-button value='Delete'></x-submit-button>
                </form>
                <a href="{{ route('discussions.edit', $discussion->id) }}">Editer</a>
            @endif
        @endauth
    </div>

</x-app-layout>
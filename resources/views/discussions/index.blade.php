<x-app-layout>
    <h2>All discussions</h2>
    <div>
        @forelse ($discussions as $discussion)
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
                <a href="{{ route('discussions.show', $discussion->id) }}" wire:navigate>Voir</a>
            </div>
        @empty
            <div style="color: red">
                No discussion found
            </div>
        @endforelse
    </div>
</x-app-layout>
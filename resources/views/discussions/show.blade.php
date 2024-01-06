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

                @if ($discussion->resolved == false)
                    <form action="{{ route('discussions.close', $discussion->id) }}" method="post">
                        @csrf
                        <x-submit-button value='Set resolved'></x-submit-button>
                    </form>                    
                @endif

                <form action="{{ route('discussions.destroy', $discussion->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <x-submit-button value='Delete'></x-submit-button>
                </form>
                <a href="{{ route('discussions.edit', $discussion->id) }}">Editer</a>
            @endif
        @endauth
    </div>

    <div id="comments" style="background-color: rgb(198, 182, 182)">
        <div>
            <h4>Comments</h4>
            @forelse ($discussion->comments as $comment)
                <article>
                    <p>

                        {{ $comment->content }}    
                        - <strong><em>{{ $comment->user->name }}</em></strong>
                        [{{ $comment->created_at->diffForHumans() }}]
                    </p>

                    @if (Auth::id() === $comment->user_id )
                        
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <x-submit-button value='Delete'></x-submit-button>
                        </form>

                        <a href="{{ route('comments.edit', $comment->id) }}">Editer</a>

                    @endif

                </article>
            @empty
                <article style="color:red">
                    No comments actually
                </article>
            @endforelse
        </div>
        <form action="{{ route('comments.store', $discussion->id) }}" method="post">
            @csrf
            <x-text-area name='content' id="content">{{ old('content') }}</x-text-area>
            <x-input-error name='content'></x-input-error>
            <x-submit-button value='Post'></x-submit-button>
        </form>
    </div>

</x-app-layout>
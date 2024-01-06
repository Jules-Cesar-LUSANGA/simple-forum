<x-app-layout>
    <h2>Our members</h2>

    @forelse($users as $user)
        <article>
            <a href="#">{{ $user->name }}</a>
            <p>Discussions : {{ $user->discussions->count() }}</p>
            <p>Comments : {{ $user->comments->count() }}</p>
        </article>    
    @empty
        <article style="color:red;">
            No user found
        </article>    
    @endforelse

    <div>
        {{ $users->links() }}
    </div>
</x-app-layout>
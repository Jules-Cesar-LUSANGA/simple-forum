<x-app-layout>
    <h2>All Categories</h2>
    <div>
        @empty($categories)
            <div style="color: red">
                No category found
            </div>  
        @else
            <ol>
                @foreach ($categories as $category)

                    <li>
                        <a href="{{ route('categories.show', $category->id) }}" wire:navigate>
                            {{ $category->name }} 
                        </a>

                        [
                            <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
                        ]
                    </li>

                @endforeach               
            </ol>          
        @endempty

    </div>
</x-app-layout>
<input {{ $attributes }} required 
        @if(!empty($oldValue)) 
            value="{{ old($oldValue)}}" 
        @endif
/>
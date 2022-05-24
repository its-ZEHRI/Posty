<x-layout>
    <div class="container px-5 mt-4">
        <div class="container wrapper px-5 py-3">
            <h3>Show</h3>
            <hr>
            <div class="mt-4">
                @foreach ($posts as $post)
                <x-post.post :post=$posts />
                 {{-- <div class="border border-secondary p-3 my-2">{{$post->body}}</div> --}}
                @endforeach
            </div>
        </div>
    </div>
</x-layout>

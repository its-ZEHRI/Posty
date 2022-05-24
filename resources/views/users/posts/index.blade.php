<x-layout>
    <div class="container px-5 mt-4">
        <div class="container wrapper px-5 py-3">
            <h3>{{$user->name}}</h3>
            <p class="m-0">Posted {{$posts->count()}} {{Str::plural('post', $posts->count())}}</p>
            <h6>Recieved {{$user->recievedLikes()->count()}} like</h6>
            <hr>
            <div class="mt-4">
                @foreach ($posts as $post)
                    <x-post.post :post=$post>
                    </x-post.post>
                @endforeach
                <div class="d-flex justify-content-center pt-3">
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </div>
</x-layout>

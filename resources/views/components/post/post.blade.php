@props([
    'post' => $post
])
<div class="border border-secondary p-3 my-2">
    <a href="{{route('userPost', $post->user)}}" class="post-user">{{$post->user->name}}</a>
    <small class="text-secondary">{{$post->created_at->diffForHumans()}}</small>
    <p>{{$post->body}}</p>
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            @auth
            @if (!$post->likedBy(auth()->user()))
                <form action="{{route('likePost',$post->id)}}" method="POST">
                    @csrf
                    <button class="post-icons" type="submit">
                        <i style="font-size: 25px" class="fa-regular fa-heart"></i>
                    </button>
                </form>
            @else
                <form action="{{route('unlikePost',$post)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="post-icons" type="submit">
                        <i style="font-size: 25px; color:rgba(226, 36, 36, 0.932)" class="fa-solid fa-heart"></i>
                    </button>
                </form>

            @endif
            @endauth
            <span class="ms-2">{{$post->likes->count()}} {{Str::plural('like',$post->likes->count())}}</span>
        </div>
        @can('delete', $post)
        {{-- @if($post->ownedBy(auth()->user())) --}}
            <form action="{{route('deletePost',$post)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="post-icons">
                    <i style="font-size: 20px;" class="text-muted fa-solid fa-trash-can"></i>
                </button>
            </form>
        {{-- @endif --}}
        @endcan
        </div>
</div>

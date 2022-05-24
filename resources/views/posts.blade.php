<x-layout>
    <div class="row">
        <div class="col-md-1"></div>
            <div class="col-md-10 px-5 mt-4">
                <div class="container wrapper px-5 py-3 rounded">
                    <h3>Create Post</h3>
                    <hr class="m-0 mb-3">
                    <x-alerts>
                    </x-alerts>
                    <div class="w-75">
                        <form action="{{route('createPost')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <textarea name="body" id="body" class="form-control" rows="4" placeholder="Post Something Special..."
                                style="@error('body') border:2px solid rgba(226, 36, 36, 0.932) @enderror"></textarea>
                            </div>
                            <div>
                                <input type="submit"  value="Post" style="letter-spacing: 3px" class="btn butn px-5">
                            </div>
                        </form>
                    </div>
                    {{-- ********************************************************************* --}}
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
        <div class="col-md-1"></div>
    </div>
</x-layout>

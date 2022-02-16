<x-app-layout>
    <div class="max-w-5xl px-4 py-8 mx-auto sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-center uppercase">Categoria: {{$category->name}} </h1>
        @foreach ($posts as $post)
            <article class="mb-8 overflow-hidden bg-white rounded-lg shadow-lg">
                <img class="object-cover object-center w-full h-72" src="{{Storage::url($post->image->url)}}" alt="">

                <div class="px-6 py-4">
                    <h1 class="mb-2 text-xl font-bold">
                        <a href="{{route('posts.show', $post)}}"> {{ $post->name}}</a>

                    </h1>
                    <div class="text-base text-gray-700">
                        {{$post->extract}}
                    </div>

                </div>

                <div class="px-6 pt-4 pb-4">
                    @foreach ($post->tags as $tag)
                        <a href="" class="inline-block px-3 py-1 text-sm text-gray-700 bg-gray-200 rounded-full">{{$tag->name}}</a>
                    @endforeach

                </div>


            </article>
        @endforeach

        <div class="mt-4">
            {{ $posts->links()}}
        </div>
    </div>
    
</x-app-layout>
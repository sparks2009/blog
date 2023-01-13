@props(['post'])
    <article
        {{ $attributes->merge(['class' => "transition-colors duration-300 bg-gray-100 border border-black border-opacity-10 hover:border-opacity-20 rounded-xl mr-6 mb-6"]) }}>
        <div class="py-6 px-5">
            <div>
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl" width="200">
            </div>

            <div class="mt-8 flex flex-col justify-between">
                <header>                                
                        <div class="space-x-3 flex">
                            <div class="px-3 py-1 border border-blue-300 rounded-full text-blue-300
                                text-xs font-semibold flex-initial w-30">
                                {!! 'CATEGORY: ' !!} {{ $post->category->name }}
                            </div>

                            @auth

                            <a href="/admin/{{ $post->id }}"
                                class="px-3 py-1 border border-red-300 rounded-full text-red-300                    text-xs uppercase font-semibold"
                                style="font-size: 10px">
                                Edit Post
                            </a>

                            <div class="px-3 py-1 border border-blue-300 rounded-full text-blue-300
                                text-xs font-semibold flex-initial w-30">
                                <form method="post" action="admin/posts/{{ $post->id }}">
                                    @csrf
                                    @method('DELETE')

                                    <button class="uppercase" style="font-size: 10px">
                                        Delete post
                                    </button>
                                </form>
                            </div>  
                            @endauth
                        </div>                               

                    <div class="mt-4">
                        <h1 class="text-3xl">
                            <a href="/posts/{{$post->slug}}">
                                {{$post->title}}
                            </a>
                        </h1> 

                        <span class="mt-2 block text-gray-400 text-xs">
                            Published <time>{{$post->created_at->diffForHumans()}}</time>
                        </span>
                    </div>
                </header>

                <div class="text-sm mt-4 space-y-4">
                                
                        {!! $post->excerpt !!}
                                
                </div>

                <footer class="flex justify-between items-center mt-8">
                    <div class="flex items-center text-sm">
                                    
                        <div class="ml-3">
                            <h5 class="font-bold">
                            <a href="/?authors={{$post->author->username}}">
                                Author: {{$post->author->name}}
                            </a>
                            </h5>
                            <h6></h6>
                        </div>
                    </div>

                    <div>
                        <a href="/posts/{{$post->slug}}"
                            class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                        >Read More</a>
                    </div>
                </footer>
            </div>
        </div>
    </article>

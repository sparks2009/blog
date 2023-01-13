
<x-layout>
            <div class="lg:grid lg:grid-cols-2">
                <article
                    class="transition-colors duration-300 bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                    <div class="py-6 px-5">
                        <div>
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl" width="150">
                        </div>

                        <div class="mt-8 flex flex-col justify-between">
                            
                            <header>
                                <div class="space-x-2 flex">
                                    
                                    <a href="/" class="hover:text-blue-600 underline">Back to Posts</a>

                                    <div class="pl-3">
                                        <div class="px-3 py-1 border border-blue-300 rounded-full text-blue-300
                                            text-xs font-semibold flex-initial w-30">
                                            {!! 'CATEGORY: ' !!} {{ $post->category->name }}
                                        </div>
                                    </div>
                                                                                                        
                                </div>

                                <div class="mt-4">
                                    <h1 class="text-3xl">
                                        {{$post->title}}
                                    </h1>

                                    <span class="mt-2 block text-gray-400 text-xs">
                                        Published <time>{{$post->created_at->diffForHumans()}}</time>
                                    </span>
                                </div>
                            </header>

                            <div class="text-sm mt-4 space-y-4">
                                
                                    {!! $post->body !!}                            

                              
                            </div>               

                            <footer class="flex justify-between items-center mt-8">
                                <div class="flex items-center text-sm">
                                    
                                    <div class="ml-3">
                                        <h5 class="font-bold">
                                        <a href="/authors/{{$post->author->username}}">
                                        Author: {{$post->author->name}}
                                        </a>
                                        </h5>
                                        <h6></h6>
                                    </div>
                                </div>

                                <div>
                                    <a href="#"
                                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200                  hover:bg-gray-300 rounded-full py-2 px-8"
                                    >
                                        Read More
                                    </a>
                                </div>
                            </footer>

                            <section class="col-span-8 col-start-5 mt-10 space-y-6">


                                @include ('posts._add-comment-form')


                                @foreach ($post->comments as $comment)
                                
                                    <x-post-comment :comment="$comment" />
                                
                                @endforeach

                            </section>


                        </div>
                    </div>
                </article>
            </div>            
</x-layout>
              

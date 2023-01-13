

@auth

    <form method="Post" action="/posts/{{ $post->slug }}/comments" class="bg-gray-200 border border-gray-400 p6 rounded-xl">
        @csrf

        <header class="flex p-6">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="60" height="60" class="rounded-xl mr-6">
            <h1 class="font-bold">Post a comment </h1>
        </header>

        <div class="mt-8">
            <textarea class="w-5/6 ml-12 border border-gray-400 rounded-xl" rows="10" name="body" placeholder="Please write your comment here..."></textarea>

            @error('body')
                <span class="text-red-500 flex ml-10 mt-6 font-bold"> {{ $message }} </span>
            @enderror
        </div>

        <div class="flex justify-end m-6">
            <button class="py-2 px-10 text-white font-semibold rounded-xl hover:bg-blue-600 bg-blue-500">
                Post
            </button>
        </div>


    </form>

@else

    <a href="/register" class="hover:text-blue-600 underline">Register</a> or <a href="/login" class="hover:text-blue-600 underline">Log in</a> to leave a comment.


@endauth

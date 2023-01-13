@props(['comment'])

<article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/60?u={{ $comment->user_id }}" alt="" width="60" height="60" class="rounded-xl">
    </div>
    <div class="ml-6">
        <header>
            <h3 class="font-bold mb-3">
                {{ $comment->author->username }}
            </h3>
            <p class="text-xs mb-3">
                Posted
                <time>{{ $comment->created_at->format("F j, Y, g:i a") }}</time>
            </p>
        </header>
        <p>{{ $comment->body }}
        </p>
    </div>
</article>

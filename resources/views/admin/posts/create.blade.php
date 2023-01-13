<x-layout>    
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 p-6 bg-gray-100 rounded-xl border border-gray-400">
            <div class="flex pb-4">
                <a href="/" class="pr-14 underline hover:text-blue-500">Back to posts</a>
                <h1 class="text-center font-bold text-xl">Write a post</h1>
            </div>
            <form method="POST" action="/admin/posts" class="mt-2" enctype="multipart/form-data">
                @csrf
                <x-form.input name="title" />
                <x-form.input name="slug" />
                <x-form.input name="thumbnail" type="file" />                
                <x-form.textarea name="excerpt" />
                <x-form.textarea name="body" />
                
                
                <div class="mb-6">

                    <x-form.label name="category" />

                    <select name="category_id" id="category_id" class="border border-gray-400 rounded">

                        @php
                            $categories = App\Models\Category::all();
                        @endphp

                        @foreach ($categories as $category)                                              

                            <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>

                        @endforeach
                    </select>

                    <x-form.error name="category" />
                </div>
                
                <div class="mb-6">

                    <button type="submit" class="bg-blue-400 py-4 px-6 text-white rounded hover:bg-blue-500">
                        Publish
                    </button>
                </div>

            </form>
        </main>    
    </section>
</x-layout>

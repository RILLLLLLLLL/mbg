@csrf

<div class="space-y-5">

    {{-- Kategori --}}
    <div>
        <label class="block mb-2 font-semibold">
            Kategori
        </label>

        <select
            name="category_id"
            class="w-full rounded border-gray-300">

            <option value="">
                -- Pilih Kategori --
            </option>

            @foreach($categories as $category)

                <option
                    value="{{ $category->id }}"
                    @selected(old('category_id', $article->category_id ?? '') == $category->id)>

                    {{ $category->name }}

                </option>

            @endforeach

        </select>

        @error('category_id')
            <small class="text-red-600">
                {{ $message }}
            </small>
        @enderror

    </div>

    {{-- Judul --}}
    <div>

        <label class="block mb-2 font-semibold">
            Judul
        </label>

        <input
            type="text"
            name="title"
            value="{{ old('title', $article->title ?? '') }}"
            class="w-full rounded border-gray-300">

        @error('title')
            <small class="text-red-600">
                {{ $message }}
            </small>
        @enderror

    </div>

    {{-- Isi Artikel --}}
    <div>

        <label class="block mb-2 font-semibold">
            Isi Artikel
        </label>

        <textarea
            name="content"
            rows="10"
            class="w-full rounded border-gray-300">{{ old('content', $article->content ?? '') }}</textarea>

        @error('content')
            <small class="text-red-600">
                {{ $message }}
            </small>
        @enderror

    </div>

    {{-- Status --}}
    <div>

        <label class="block mb-2 font-semibold">
            Status
        </label>

        <select
            name="status"
            class="w-full rounded border-gray-300">

            <option value="draft"
                @selected(old('status', $article->status ?? '') == 'draft')>

                Draft

            </option>

            <option value="published"
                @selected(old('status', $article->status ?? '') == 'published')>

                Published

            </option>

        </select>

    </div>

    <div class="mb-4">

        <label class="block mb-2 font-medium">

            Thumbnail

        </label>

        @if(isset($article) && $article->thumbnail)

            <img
                src="{{ asset('storage/'.$article->thumbnail) }}"
                class="w-40 rounded mb-3">

        @endif

        <input
            type="file"
            name="thumbnail"
            class="border rounded w-full p-2">

        @error('thumbnail')
            <p class="text-red-500 text-sm mt-1">
                {{ $message }}
            </p>
        @enderror

    </div>

</div>
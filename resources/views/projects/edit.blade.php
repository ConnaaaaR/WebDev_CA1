<x-layout>
    @auth
       <div class="mx-auto gap-4  my-24 w-1/3 bg-white p-5 rounded">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form  method="POST" action="{{ route('projects.update', $project) }}" enctype="multipart/form-data" class="mx-auto">
            @method('put')
            @csrf
            <h1 class="mx auto mb-5">Edit an existing project!</h1>
            <div class="mb-5">
                <label
                    for="title"
                    class="inline-block text-lg mb-2"
                    >Project Title</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    required
                    name="title"
                    value="{{ old('title', $project->title) }}"
                />
                @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
        
            <div class="mb-5">
                <label for="image" class="inline-block text-lg mb-2">
                    Select an image from your device
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    required 
                    name="image"
                    value="{{ old('image', $project->image) }}"
                />
                @error('image')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror 
            </div>

            <div class="mb-5">
                <label for="tags" class="inline-block text-lg mb-2"> Enter tags (Comma separated)</label>
                <input 
                type="text" 
                class="border border-gray-200 rounded p-2 w-full"
                required
                name="tags"
                value="{{ old('tags', $project->tags) }}"
                />
            </div>
         
    
            <div class="mb-5">
                <label
                    for="text"
                    class="inline-block text-lg mb-2"
                >
                    Description
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="text"
                    rows="4"
                    placeholder="Include a description of your project."
                
                >
                {{ old('text', $project->text) }}
            </textarea>
                @error('text')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-5">
                <button
                    class="btn-primary"
                >
                    Publish Changes
                </button>
    
                <a href="/projects" class=" bg-endless-oasis text-frost rounded border border-frost py-2 px-4 hover:bg-frost hover:text-endless-oasis hover:border hover:border-endless-oasis"> Back </a>
            </div>
        </form>
    </div>
    
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        
    </div>
    @endauth
</x-layout>
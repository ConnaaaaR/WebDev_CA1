<x-app-layout>
    <x-slot name='header'>

    </x-slot>
    <h1 class="mx auto">Edit a project!</h1>
    <div class="mx-auto gap-4  my-24 w-1/3 bg-white p-5 rounded">
        <form  method="POST" action="{{ route('projects.update', $project) }}" enctype="multipart/form-data" class="mx-auto">
            @method('put')
            @csrf
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
                    :value="@old('title', $project->title)"
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
                    :value="@old('file', $project->image)"
                />
                @error('image')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror 
            </div>
    
            <div class="mb-5">
                <label
                    for="description"
                    class="inline-block text-lg mb-2"
                >
                    Description
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="text"
                    rows="4"
                    placeholder="Include a description of your project."
                    :value="@old('text', $project->text)"
                    {{old('description')}}
                ></textarea>
                @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-5">
                <button
                    class="btn-primary"
                >
                    Update Project
                </button>
    
                <a href="/projects" class=" bg-endless-oasis text-frost rounded border border-frost py-2 px-4 hover:bg-frost hover:text-endless-oasis hover:border hover:border-endless-oasis"> Back </a>
            </div>
        </form>
    </div>
    
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        
    </div>
</x-app-layout>
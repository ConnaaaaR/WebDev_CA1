{{-- <x-layout>
    @auth
    <p class="text-5xl mx-auto text-center mt-24">Projects</p>
    <div class="mx-auto flex flex-wrap gap-4 justify-center my-10 w-1/2">
            @unless(count($projects) == 0)
            @foreach ($projects as $project)
            <x-project-card :project="$project" />
            @endforeach
            @else
            <p class="text-center">You haven't uploaded any projects yet! Press upload to get started.</p>
            <div class="mx-auto mt-5">
                <a href="{{ route('projects.create')}}" class="btn-primary">Upload a Project</a>
            </div>
            @endunless
        </div>
        <div class=" flex justify-center mb-4">{{$projects->links()}}</div>
        @endauth
   
</x-layout> --}}


{{-- <x-app-layout>
    <p class="text-5xl mx-auto text-center mt-24">Projects</p>
    <div class="flex justify-center">
        
        <div class="flex flex-wrap gap-4 justify-center my-10 w-1/2">
            
            @unless(count($projects) == 0)
    
            @foreach ($projects as $project)
            <x-project-card :project="$project" />
            @endforeach

            @else
            <p>No Projects Found</p>
            @endunless
        </div>
    </div>
</x-app-layout> --}}

<x-layout>
    <div class="mx-auto flex flex-wrap gap-4 justify-center my-10 w-1/2">
        @unless(count($projects) == 0)
        
        @foreach ($projects as $project)
        <x-project-card :project="$project" />
        @endforeach
    
        @else
        <p>No Projects Found</p>
        @endunless
        
        <div class=" flex justify-center mb-4">{{$projects->links()}}</div>

      </div>
      
    </x-layout>
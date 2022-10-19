<x-app-layout>
    <h1 class="text-5xl">Projects</h1>
    <div class="grid grid-cols-4 auto-cols-max justify-evenly">
        @unless(count($projects) == 0)

        @foreach ($projects as $project)
        <x-project-card :project="$project" />
        @endforeach
        @foreach ($projects as $project)
        <x-project-card :project="$project" />
        @endforeach
       
    
            
        @else
        <p>No Projects Found</p>
        @endunless
    </div>
   
</x-app-layout>
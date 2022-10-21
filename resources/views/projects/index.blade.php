<x-app-layout>
    
    <div class="flex justify-center flex-">
        <p class="text-5xl">Projects</p>
        <div class="flex flex-wrap gap-4 justify-center my-24 w-1/2">
            
            @unless(count($projects) == 0)
    
            @foreach ($projects as $project)
            <x-project-card :project="$project" />
            @endforeach
            @foreach ($projects as $project)
            <x-project-card :project="$project" />
            @endforeach
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
    </div>
    
   
</x-app-layout>
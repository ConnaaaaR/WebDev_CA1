<x-app-layout>
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
    
   
</x-app-layout>
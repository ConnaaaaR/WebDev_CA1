<x-layout>
    <h1 class="mx-auto flex flex-wrap gap-4 mt-4 justify-center ">{{ $user->company->name }} Projects</h1>
    <div class="mx-auto flex flex-wrap gap-4 justify-center my-10 w-1/2">

        @unless(count($projects) == 0)


            @foreach ($projects as $project)
                <x-project-card :project="$project" />
            @endforeach
        @else
            <p>No Projects Found</p>
        @endunless

        {{-- <div class=" flex justify-center mb-4">{{$projects->links()}}</div> --}}

    </div>

</x-layout>

<x-layout>
    @if (\Session::has('message'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('message') !!}</li>
            </ul>
        </div>
    @endif
    <div class="container mx-auto">
        <div class="grid grid-flow-row-dense grid-cols-12 gap-3 my-10">

            @unless(count($projects) == 0)
                @auth
                    @foreach ($projects as $project)
                        <a href="{{ route('user.projects.show', $project) }}">
                            <x-project-card :project="$project" />
                        </a>
                    @endforeach
                @endauth
            @else
                <p>No Projects Found</p>
            @endunless


        </div>
        <div class=" flex justify-center mb-4">{{ $projects->links() }}</div>
    </div>



</x-layout>

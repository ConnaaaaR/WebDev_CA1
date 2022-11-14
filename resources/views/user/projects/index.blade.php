<x-layout>
    @if (\Session::has('message'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('message') !!}</li>
        </ul>
    </div>
    @endif
    <div class="mx-auto flex flex-wrap gap-4 justify-center my-10 w-1/2">

    @unless(count($projects) == 0)
    @auth
    @foreach ($projects as $project)
    <x-project-card :project="$project" />
    @endforeach
    @endauth
    @else
    <p>No Projects Found</p>
    @endunless
    
    
  </div>
  <div class=" flex justify-center mb-4">{{$projects->links()}}</div>
  
</x-layout>
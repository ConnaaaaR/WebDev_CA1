<x-app-layout>
    <x-card-base>
        <div class="flex flex-col gap-5">
            <p class="text-5xl mx-auto text-center mt-10">{{$project->title}}</p>
            <p class="text-sm mx-auto text-center ">{{'Uploaded: '.$project->created_at->format('Y-m-d')}}</p>
            <img src="{{ asset('img/'.$project->image)}}" alt="" class="rounded-lg mb-1">
            <p class="text-md mx-auto">{{$project->text}}</p>
            <div class="flex gap-1">
                <p class="font-bold">Uploaded by:</p>
                <p class="">{{$user->name}}</p>
            </div>
        </div>
        @if ($project->user_id === Auth::id())
        <div class="mt-4"></div>
            <a class="btn-primary" href="{{route('projects.edit',$project)}}">Edit</a>
            <a class="btn-danger">Delete</a>
        @endif
    </x-card-base>
</x-app-layout>


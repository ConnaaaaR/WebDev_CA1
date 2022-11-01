@props(['project'])


    <div class=" basis-1/2 grow  p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:border-sea-blue">
        <a href="{{ route('projects.show', $project) }}">
            <img src="{{$project->image ? asset('img/'. $project->image) : asset('storage/images/no-image.png')}}" alt="" class="mx-auto rounded-lg mb-1 object-contain max-w-[334px] max-h-[228px]">
        </a>
            <hr>
            <div class="justify-center">
                <x-project-tags :tagsCsv="$project->tags" ></x-project-tags>
            </div>
            <a href="{{ route('projects.show', $project) }}">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$project->title}}</h5>
                <p class="mb-3 font-normal text-gray-700 ">{{ Str::limit($project->text,100)}}</p>
            </a>
    </div>

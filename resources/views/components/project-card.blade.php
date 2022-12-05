@props(['project'])


<div class=" basis-1/2 grow  p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:border-sea-blue">
    <a href="{{ route('companyLead.projects.show', $project) }}">
        <div class="mx-auto rounded-lg mb-1 w-[334px] overflow-hidden h-[228px]">
            <img src="{{ $project->image ? asset('img/' . $project->image) : asset('no-image.png') }}" alt=""
                class="">
        </div>
    </a>
    <hr>
    <div class="justify-center">
        <x-project-tags :tagsCsv="$project->tags"></x-project-tags>
    </div>
    <hr>

    <a href="{{ route('companyLead.projects.show', $project) }}">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $project->title }}</h5>
        <p class="mb-3 font-normal text-gray-700 ">{{ Str::limit($project->text, 100) }}</p>
    </a>
</div>

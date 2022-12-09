@props(['project'])


<div
    class="col-span-3 flex flex-col justify-around p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:border-sea-blue">


    <div class="justify-center">
        <img src="{{ $project->image ? asset('img/' . $project->image) : asset('no-image.png') }}" alt=""
            class="rounded-lg mb-1 max-w-full overflow-hidden h-auto">
        <hr>
        <x-project-tags :tagsCsv="$project->tags"></x-project-tags>
        <hr>
    </div>
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ Str::limit($project->title, 20) }}</h5>
    <p class="mb-3 font-normal text-gray-700 ">{{ Str::limit($project->text, 25) }}</p>
</div>

@props(['project'])


<div class="basis-1/2 grow  p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md h-[400px] hover:border-sea-blue">
    <img src="{{ asset('img/'.$project->image)}}" alt="" class="mx-auto rounded-lg mb-1 object-contain max-w-[334px] max-h-[228px]">
    <hr>
  
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$project->title}}</h5>
  
    <p class="mb-3 font-normal text-gray-700 ">{{ Str::limit($project->text,100)}}</p>
    <a href="{{ route('projects.show', $project) }}" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-sea-blue rounded-lg hover:bg-open-sky hover:scale-95 hover:transition ease-in-out focus:ring-4 focus:outline-none focus:ring-blue-300 ">
        Read more 
    </a>
</div>
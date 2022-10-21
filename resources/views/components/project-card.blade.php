@props(['project'])


<div class="basis-1/2 grow  p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 hover:scale-95 hover:transition ease-in-out">
    <a href="#">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$project->title}}</h5>
    </a>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Str::limit($project->text,100)}}</p>
    <a href="#" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-sea-blue rounded-lg hover:bg-open-sky focus:ring-4 focus:outline-none focus:ring-blue-300 ">
        Read more 
        
    </a>
</div>
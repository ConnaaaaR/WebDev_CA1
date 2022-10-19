@props(['project'])

<div class="col-span-2  hover:scale-95 hover:transition ease-in-out">
    <div class="flex flex-col my-5 mx-10 text-frost">
        <div class="border-2 rounded"><img src="{{ asset('/images/no-image.png') }}" alt=""></div>
        <div class="flex flex-col justify-between items-center rounded bg-sea-blue py-5">
            {{-- title --}}
            <p class="text-lg  ">
                <a href="">{{$project->title}}</a>
            </p>
    
            {{-- text --}}
            <p>
                {{ Str::limit($project->text, 10)}}
            </p>
            {{-- Author --}}
    
        </div>
      </div>
</div>


  
@props(['tagsCsv'])

@php
$tags = explode(',', $tagsCsv);  
@endphp

<ul class="flex">
   
    @foreach ($tags as $tag)
    <li class="flex items-center justify-center bg-black text-white rounded-xl">
        <a href="{{/?tag={{$tag}}}}">{{$tag}}</a>
    </li>
    @endforeach

</ul>
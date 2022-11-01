@props(['tagsCsv'])

@php
$tags = explode(',', $tagsCsv);  
@endphp


    <ul class="flex gap-1">
   
        @foreach ($tags as $tag)
        <li class="">
            <div class="flex items-center justify-center bg-black text-white rounded-xl p-1 ">
            <a href="/projects?tag={{$tag}}">{{$tag}}</a>
        </li>
        @endforeach
    </ul>


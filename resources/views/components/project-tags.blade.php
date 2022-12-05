@props(['tagsCsv'])

@php
    $tags = explode(',', $tagsCsv);
@endphp


<ul class="flex gap-1 justify-center">

    @foreach ($tags as $tag)
        <li class="">
            <div class="flex tag ">
                <a href="{{ route('user.projects.index') }}?tag={{ $tag }}">{{ $tag }}</a>
        </li>
    @endforeach
</ul>

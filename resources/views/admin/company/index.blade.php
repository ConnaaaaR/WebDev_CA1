<x-layout>
    @if (\Session::has('message'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('message') !!}</li>
        </ul>
    </div>
    @endif
    <div class="mx-auto flex flex-wrap gap-4 justify-center my-10 w-1/2">

    @unless(count($company) == 0)
    @auth

    @foreach ($company as $i)
    <x-company-card :company="$i" />
    @endforeach
    
    @endauth
    @else
    <p>No Companies Found</p>
    @endunless
    
    
  </div>
  
  
</x-layout>
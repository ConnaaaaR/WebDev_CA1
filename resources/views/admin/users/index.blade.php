<x-layout>
    <div class="mx-auto flex flex-wrap gap-4 justify-center my-10 w-1/2">
        @unless(count($users) == 0)
            @auth
                @foreach ($users as $user)
                    <x-user-card :user="$user" />
                @endforeach

            @endauth
        @else
            <p>No Users Found (You should never see this!)</p>
        @endunless


    </div>
</x-layout>

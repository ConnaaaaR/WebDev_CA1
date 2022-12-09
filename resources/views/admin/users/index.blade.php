<x-layout>
    <div class="container mx-auto">
        <div class="grid grid-flow-row-dense grid-cols-12 gap-3 my-10">
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
    </div>

</x-layout>

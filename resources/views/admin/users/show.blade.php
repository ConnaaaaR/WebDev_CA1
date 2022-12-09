<x-layout>
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif

    <x-card-base>
        <div class="mx-auto">
            <div class="flex flex-col gap-5">
                <p class="text-5xl mx-auto text-center mt-10">{{ $user->name }}</p>
            </div>
        </div>
        <form class="mt-4 mx-auto" action="{{ route('admin.users.destroy', $user) }}" method="post">
            @method('Delete')
            @csrf
            <button type="submit" class="btn-danger"
                onclick="return confirm('Are you sure you want to delete this company? Deleting this User will delete ALL its projects')">
                Delete</button>
            <a class="btn-primary" href="{{ route('admin.users.edit', $user) }}">Edit</a>
        </form>
        </div>
    </x-card-base>
</x-layout>

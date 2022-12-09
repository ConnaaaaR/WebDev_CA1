@props(['user'])

<a href="{{ route('admin.users.show', $user) }}">
    <div class=" p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:border-sea-blue">



        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $user->name }}</h5>

        <p class="mb-3 font-normal text-gray-700">Projects: <span
                class="font-bold">{{ count($user->projects()->get()) }}</span>
        </p>
        <form class="mt-4 mx-auto" action="{{ route('admin.users.destroy', $user) }}" method="post">
            @method('Delete')
            @csrf
            <button type="submit" class="btn-danger"
                onclick="return confirm('Are you sure you want to delete this company? Deleting this User will delete ALL its projects')">
                Delete</button>
            <a class="btn-primary" href="{{ route('admin.users.edit', $user) }}">Edit</a>
        </form>
    </div>
</a>

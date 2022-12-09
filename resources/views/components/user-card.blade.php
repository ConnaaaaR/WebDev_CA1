@props(['user'])

<div class="col-span-4 p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:border-sea-blue">

    <a class="" href="{{ route('admin.users.show', $user) }}">

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $user->name }}</h5>

        <p class="mb-3 font-normal text-gray-700">Company: <span class="font-bold">{{ $user->company->name }}</span>
        </p>

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
    </a>
</div>

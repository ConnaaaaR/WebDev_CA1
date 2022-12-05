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
                <p class="text-5xl mx-auto text-center mt-10">{{ $company->name }}</p>
                <p>{{ $company->address }}</p>
            </div>

            {{-- <a href="{{ route('admin.company.user',$user)}}" class="btn-primary text-center">Contact Owner</a> --}}
        </div>
        <form class="mt-4 mx-auto" action="{{ route('admin.company.destroy', $company) }}" method="post">
            @method('Delete')
            @csrf
            <button type="submit" class="btn-danger"
                onclick="return confirm('Are you sure you want to delete this company? Deleting this company will delete ALL its users AND all associated projects')">
                Delete</button>
            <a class="btn-primary" href="{{ route('admin.company.edit', $company) }}">Edit</a>
        </form>
        </div>
    </x-card-base>
</x-layout>

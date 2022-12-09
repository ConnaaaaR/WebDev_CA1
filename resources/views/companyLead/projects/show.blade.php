<x-layout>
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif

    <x-card-base>
        <div class="flex flex-col gap-5">
            <p class="text-5xl mx-auto text-center mt-10">{{ $project->title }}</p>
            <p class="text-sm mx-auto text-center ">{{ 'Uploaded: ' . $project->created_at->diffForHumans() }}</p>

            <div class="mx-auto">
                <x-project-tags :tagsCsv="$project->tags"></x-project-tags>
            </div>

            <img src="{{ $project->image ? asset('img/' . $project->image) : asset('no-image.png') }}" alt=""
                class="rounded-lg mb-1">

            <p class="text-md mx-auto">{{ $project->text }}</p>
            <div class="flex gap-1">
                <p class="font-bold">Uploaded by:</p>

                <p class="">{{ ucFirst($user->name) }}</p>

            </div>
            <div class="flex gap-1">
                <p class="font-bold">Company: </p>

                <p class="">{{ $user->company->name }}</p>

            </div>
        </div>



        @if ($project->user_id === Auth::id() ||
            Auth::user()->hasRole('admin') ||
            (Auth::user()->hasRole('companyLead') && Auth::user()->company_id == $user->company_id))
            <form class="mt-4" action="{{ route('companyLead.projects.destroy', $project) }}" method="post">
                @method('Delete')
                @csrf
                <button type="submit" class="btn-danger"
                    onclick="return confirm('Are you sure you want to delete this project?')"> Delete</button>
                <a class="btn-primary" href="{{ route('companyLead.projects.edit', $project) }}">Edit</a>
            </form>
        @endif
    </x-card-base>
</x-layout>

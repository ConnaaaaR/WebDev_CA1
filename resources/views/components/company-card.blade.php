@props(['company'])

<a href="{{ route('admin.company.show', $company) }}">
    <div class=" p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:border-sea-blue">



        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $company->name }}</h5>
        <p class="mb-3 font-normal text-gray-700 ">{{ $company->text }}</p>
        <p class="mb-3 font-normal text-gray-700">Employees: <span class="font-bold">{{ count($company->users) }}</span>
        </p>
        <p class="mb-3 font-normal text-gray-700">Projects: <span
                class="font-bold">{{ count($company->projects()->get()) }}</span>
        </p>
    </div>
</a>

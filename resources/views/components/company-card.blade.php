@props(['company'])


<div class=" p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:border-sea-blue">

    <a href="{{ route('admin.company.show', $company) }}">

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $company->name }}</h5>
        <p class="mb-3 font-normal text-gray-700 ">{{ $company->text }}</p>

    </a>

</div>

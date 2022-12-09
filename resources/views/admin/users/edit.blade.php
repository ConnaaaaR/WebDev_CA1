<x-layout>
    @auth
        <div class="mx-auto gap-4  my-24 w-1/3 bg-white p-5 rounded">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('admin.users.update', $user) }}" enctype="multipart/form-data"
                class="mx-auto">
                @method('put')
                @csrf
                <h1 class="mx auto mb-5">Edit an existing user!</h1>
                <div class="mb-5">
                    <label for="name" class="inline-block text-lg mb-2">User Name</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" required name="name"
                        value="{{ old('name', $user->name) }}" />
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="inline-block text-lg mb-2">Email</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" required name="email"
                        value="{{ old('email', $user->email) }}" />
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>




                <div class="mb-5">
                    <label for="company_id" class="inline-block text-lg mb-2">Company</label>

                    <select name="company_id" class='border border-gray-200 rounded p-2 w-'full'>
                        <option value="{{ $user->company_id }}">{{ $user->company->name }}</option>
                        @foreach ($companys as $company)
                            <option class="{{ $company->id == $user->company_id ? 'hidden' : '' }}"
                                value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-5">
                    <button class="btn-primary">
                        Publish Changes
                    </button>

                    <a href="{{ redirect()->getUrlGenerator()->previous() }}"
                        class=" bg-endless-oasis text-frost rounded border border-frost py-2 px-4 hover:bg-frost hover:text-endless-oasis hover:border hover:border-endless-oasis">
                        Back </a>
                </div>
            </form>
        </div>

        <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        </div>
    @endauth
</x-layout>

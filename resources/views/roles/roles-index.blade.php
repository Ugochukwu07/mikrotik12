<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            @if ($message = session('success'))
                <x-flash-success>{{ $message }}</x-flash-success>
            @endif

                @if ($message = session('danger'))
                    <x-flash-danger>{{ $message }}</x-flash-danger>
                @endif

            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title
                    title="{{ __('Role management') }}"
                    href="{{ route('roles-create') }}"
                    awesome="fa fa-plus mr-2"
                    text="{{ __('Create') }}"
                >
                </x-card-title>
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-50 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-50">
                                        <thead class="bg-gray-100 text-gray-900">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                {{ __('Role') }}
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                {{ __('Action') }}
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-100">
                                        @foreach($roles as $role)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{ $role->name }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <a href="{{ route('roles-edit', $role->id) }}" class="mr-2 text-gray-600 inline">{{ __('Edit') }}</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            setTimeout(function () {
                document.getElementById('msg').remove();
            }, 5000);
        </script>
    @endpush
</x-app-layout>

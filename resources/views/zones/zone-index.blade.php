<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            @if ($message = session('success'))
                <x-flash-success>{{ $message }}</x-flash-success>
            @endif
            <div class="overflow-hidden sm:rounded-lg">
                <div class="md:flex no-wrap md:-mx-2">

                    <div class="w-full md:w-9/12 mx-2">
                        <div class="bg-white overflow-hidden sm:rounded-lg">
                            <x-card-title title="{{ __('Service zone') }}"></x-card-title>

                            <div class="p-6">
                                <div class="mx-auto">
                                    <table class="min-w-full divide-y divide-gray-50">
                                        <thead class="bg-gray-100 text-gray-900">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                {{ __('Zone') }}
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                {{ __('Areas') }}
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                {{ __('Action') }}
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-100">
                                        @foreach($zones as $zone)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{ $zone->name }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{ $zone->area }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <a href="{{ route('service-zone-edit', $zone->id) }}" class="mr-2 text-gray-600 inline">{{ __('Edit') }}</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(auth()->user()->can('create-service-zone'))
                        <div class="w-full md:w-3/12 mx-2">
                            <div class="bg-white overflow-hidden sm:rounded-lg">
                                <x-card-title title="{{ __('New service zone') }}"></x-card-title>
                                <div class="p-6">
                                    <div class="mx-auto">
                                        <form action="{{ route('service-zone-store') }}" method="POST">
                                            @csrf
                                            <div class="grid grid-cols-1">
                                                <x-label for="name" value="{{ __('Zone name') }}"></x-label>
                                                <x-input name="name" value="{{ old('name') }}"></x-input>
                                            </div>
                                            <div class="grid grid-cols-1 mt-5">
                                                <x-label for="area" value="{{ __('Areas') }}"></x-label>
                                                <x-input name="area" value="{{ old('area') }}"></x-input>
                                            </div>
                                            <div class="grid grid-cols-1 justify-center">
                                                <x-button-save>{{ __('Save') }}</x-button-save>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
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

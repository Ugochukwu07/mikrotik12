<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="sm:rounded-lg">
                <div class="md:flex no-wrap md:-mx-2">
                    <div class="w-full md:w-3/12 md:mx-2">
                        <div class="bg-white p-4 rounded-md">
                            <div class="flex items-center ml-4 font-bold text-gray-900 leading-8 pb-4">
                                <span class="tracking-wide">{{ __('Ticket detail') }}</span>
                            </div>
                            <div class="hidden sm:block" aria-hidden="true">
                                <div class="py-5">
                                    <div class="border-t border-gray-200"></div>
                                </div>
                            </div>
                            <div class="ml-4 text-gray-500 pb-4">
                                <p>{{ __('Ticket ID') }}</p>
                                <p class="font-bold mb-4">{{ __('#') . $ticket->ticketId }}</p>

                                <p>{{ __('Created by') }}</p>
                                <p class="font-bold mb-4">{{ $ticket->user->name }}</p>

                                <p>{{ __('Status') }}</p>
                                @if($ticket->status === 1)
                                    <p class="text-rose-700 font-bold mb-4">{{ __('Open') }}</p>
                                @endif
                                @if($ticket->status === 0)
                                    <p class="text-amber-700 font-bold mb-4">{{ __('Closed') }}</p>
                                @endif

                                <p>{{ __('Priority') }}</p>
                                @if($ticket->priority === 1)
                                    <p class="font-rose-900 font-bold mb-4">{{ __('High') }}</p>
                                @endif
                                @if($ticket->priority === 2)
                                    <p class="font-green-900 font-bold mb-4">{{ __('Normal') }}</p>
                                @endif
                                @if($ticket->priority === 3)
                                    <p class="font-blue-500 font-bold mb-4">{{ __('Low') }}</p>
                                @endif
                                @if(auth()->user()->can('edit-ticket'))
                                    <form action="{{ route('tickets-update', $ticket->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="mt-5">
                                            <div class="justify-center">
                                                @if($ticket->status == 1)
                                                    <input value="0" name="status" hidden>
                                                    <button class="items-center px-4 py-2 bg-orange-800 border rounded-md font-semibold text-xs uppercase hover:bg-orange-700 text-white" type="submit">{{ __('Mark close') }}</button>
                                                @endif
                                                @if($ticket->status == 0)
                                                    <input value="1" name="status" hidden>
                                                    <button class="items-center px-4 py-2 bg-lightBlue-400 border rounded-md font-semibold text-xs uppercase hover:bg-lightBlue-500 text-white" type="submit">{{ __('Re-open') }}</button>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-9/12 mx-2 h-64">
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="border-b border-gray-50 sm:rounded-lg p-6 bg-white">
                                        <div class="flex items-center ml-4 space-x-2 font-bold text-gray-900 leading-8 pb-4">
                                            <span class="tracking-wide">{{ $ticket->subject }}</span>
                                        </div>
                                        <div class="hidden sm:block" aria-hidden="true">
                                            <div class="py-5">
                                                <div class="border-t border-gray-200"></div>
                                            </div>
                                        </div>
                                        <div class="w-full flex justify-between items-center">
                                            <p class="font-bold text-gray-700">{{ $ticket->user->name }}</p>
                                            <p class="px-3 py-1 text-sm text-gray-600">
                                                {{ $ticket->created_at }}
                                            </p>
                                        </div>
                                        <p class="text-gray-600 my-3">{{ $ticket->message }}</p>

                                        @foreach($ticket->comments as $com)
                                            <div class="w-full flex justify-between items-center mt-10">
                                                <p class="font-bold text-gray-700">{{ $com->user->name }}</p>
                                                <p class="px-3 py-1 text-sm text-gray-600">
                                                    {{ $com->created_at }}
                                                </p>
                                            </div>
                                            <p class="text-gray-600 my-3">{{ $com->comment }}</p>
                                        @endforeach
                                        <div class="hidden sm:block" aria-hidden="true">
                                            <div class="py-5">
                                                <div class="border-t border-gray-200"></div>
                                            </div>
                                        </div>
                                        @if(auth()->user()->can('create-comment'))
                                            <form action="{{ route('comments-store') }}" method="POST">
                                                @csrf
                                                <div class="grid grid-cols-1 mt-5">
                                                    <textarea name="comment" class="px-3 py-3 mt-1 rounded-lg border-gray-200 md:text-sm text-xs
        focus:outline-none focus:border-indigo-300 focus:ring-indigo-600 focus:ring-opacity-50 focus:ring-2" rows="5"></textarea>
                                                    <input value="{{ $ticket->id }}" name="ticket_id" hidden>
                                                    <div class="grid grid-cols-1 justify-center">
                                                        <x-button-save>{{ __('Reply') }}</x-button-save>
                                                    </div>
                                                </div>
                                            </form>
                                        @endif
                                    </div>
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

@props([
'header' => '',
])

<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <section class="xl:px-6 pt-4 pb-4 sm:pb-6 lg:pb-4 xl:pb-6 space-y-4">
        <nav class="font-sans flex flex-col text-center content-center sm:flex-row sm:text-left sm:justify-between py-2 sm:items-baseline w-full">
            <div class="mb-2 sm:mb-0 inner">
                <div class="text-2xl no-underline text-grey-darkest hover:text-blue-dark font-sans font-bold">{{ $header }}</div>
            </div>

            <div class="sm:mb-0 self-center">
                <a href="#" class="text-md no-underline text-black hover:text-blue-dark ml-2 px-1"><i class="fa fa-home mr-2"></i> Active</a>
                <a href="#" class="text-md no-underline text-grey-darker hover:text-blue-dark ml-2 px-1">Link2</a>
                <a href="#" class="text-md no-underline text-grey-darker hover:text-blue-dark ml-2 px-1">Link3</a>
            </div>
        </nav>
    </section>
</div>

<div class="bg-gray-200 bg-opacity-25">
    <div class="p-6">
        <div class="ml-14">
            <div class="mt-2">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>

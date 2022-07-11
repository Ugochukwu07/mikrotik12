@props(['title' => '', 'awesome' => '', 'text' => '', 'href' => ''])

<div class="border-b border-gray-200">
    <section class="xl:px-6 md:px-4 pt-4 pb-4 sm:pb-6 lg:pb-4 xl:pb-6 space-y-4">
        <nav
            class="font-sans flex flex-col text-center content-center sm:flex-row sm:text-left sm:justify-between py-2 sm:items-baseline w-full">
            <div class="mb-2 sm:mb-0 inner">
                <div
                    class="text-xl no-underline text-grey-darkest hover:text-blue-dark font-sans font-bold">{{ $title }}</div>
            </div>

            <div class="sm:mb-0 self-center">
                <div>
                    <a href="{{ $href }}" class="mr-2 text-gray-600"><i
                            class="{{ $awesome }}"></i>{{ $text }}</a>
                </div>
            </div>
        </nav>
    </section>
</div>

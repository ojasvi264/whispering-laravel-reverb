<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div
                    class="p-6 text-gray-900 dark:text-gray-100"
                    x-data="{
                        dispatch: false,
                        order: null,
                    }"
                    x-init="
                        Echo.private('users.{{ auth()->id() }}')
                        .listen('OrderDispatch', (event) => {
                            order = event.order
                            dispatch = true

{{--                    x-init="--}}
{{--                    Echo.channel('chat')--}}
{{--                     .listen('Example', (event) => {--}}
{{--                     console.log(event)--}}
                     })
                    "
                >
                    <template x-if="dispatch">
                        <div>
                            Order (#<span x-text="order.id"></span>) has been dispatched.
                        </div>
                    </template>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

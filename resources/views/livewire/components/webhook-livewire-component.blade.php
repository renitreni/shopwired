<div>
    @if ($isOpen)
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div class="rounded-2xl border border-blue-100 bg-white p-4 shadow-lg sm:p-6 lg:p-8" role="alert">
                        <div class="flex items-center gap-4">
                            <span class="shrink-0 rounded-full bg-blue-400 p-2 text-white">
                                <svg class="size-4" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd"
                                        d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z"
                                        fill-rule="evenodd" />
                                </svg>
                            </span>

                            <p class="font-medium sm:text-lg">Webhooks</p>
                        </div>

                        <p class="mt-4 text-gray-500">
                            <!--
  Heads up! 👋

  This component comes with some `rtl` classes. Please remove them if they are not needed in your project.
-->

                        <div class="overflow-x-auto rounded-lg border border-gray-200">
                            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                                <thead class="ltr:text-left rtl:text-right">
                                    <tr>
                                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">id</th>
                                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">createdAt
                                        </th>
                                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">url</th>
                                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">enabled</th>
                                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">verified</th>
                                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Action</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($webhooks as $hooks)
                                        <tr>
                                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                                {{ $hooks['id'] }}</td>
                                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                                {{ $hooks['createdAt'] }}</td>
                                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $hooks['url'] }}
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                                {{ $hooks['enabled'] }}</td>
                                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                                @if ($hooks['verified'])
                                                    <span
                                                        class="inline-flex items-center justify-center rounded-full bg-emerald-100 px-2.5 py-0.5 text-emerald-700">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="-ms-1 me-1.5 size-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>

                                                        <p class="whitespace-nowrap text-sm">Verified</p>
                                                    </span>
                                                @else 
                                                    <span
                                                        class="inline-flex items-center justify-center rounded-full border border-red-500 px-2.5 py-0.5 text-red-700">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="-ms-1 me-1.5 size-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                                        </svg>

                                                        <p class="whitespace-nowrap text-sm">Unverified</p>
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                                <a class="group relative inline-block text-sm font-medium text-white focus:outline-none focus:ring"
                                                    href="#" wire:click='verifyWebHook({{ $hooks['id'] }})'
                                                    wire:loading.class="hidden">
                                                    <span
                                                        class="absolute inset-0 border border-green-600 group-active:border-green-500"></span>
                                                    <span
                                                        class="block border border-green-600 bg-green-600 px-5 py-1 transition-transform active:border-green-500 active:bg-green-500 group-hover:-translate-x-1 group-hover:-translate-y-1">
                                                        Verify
                                                    </span>
                                                </a>
                                                <a class="group relative inline-block text-sm font-medium text-white focus:outline-none focus:ring"
                                                    href="#" wire:loading wire:target='verifyWebHook'>
                                                    <span class="absolute inset-0 border border-orange-600"></span>
                                                    <span
                                                        class="block border border-orange-600 bg-orange-600 px-5 py-1 transition-transform active:border-orange-500 active:bg-orange-500">
                                                        Fetching API...
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        </p>

                        <div class="mt-6 sm:flex sm:gap-4">

                            <a class="mt-2 inline-block w-full rounded-lg bg-gray-50 px-5 py-3 text-center text-sm font-semibold text-gray-500 sm:mt-0 sm:w-auto"
                                href="#" wire:click='closeWebHooks'>
                                Close
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

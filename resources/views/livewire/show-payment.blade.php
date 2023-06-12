<div>
    <div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">

        <div class="px-6 py-4 flex items-center">
            <x-label for="option" value="{{ __('Search by:') }}" />
            <select
                class="block mt-1 mr-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                id="option" wire:model="option">
                <option value="name">Name</option>
                <option value="id">id</option>
            </select>

            <x-input class="mt-1 mr-4 flex-1" type="text" wire:model="search" placeholder="Search"
                autocomplete="search" />

            @livewire('create-payment')

        </div>
        <table class="mt-2 w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="cursor-pointer px-6 py-3">
                        Id

                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3">
                        Nom
                    </th>

                    <th scope="col" class="cursor-pointer px-6 py-3">
                        Date_creation

                    </th>

                    <th scope="col" class="cursor-pointer px-6 py-3">
                        status
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3">
                        Amount
                    </th>

                    <th scope="col" class="px-6 py-3">
                        options
                    </th>
                </tr>
            </thead>

            <tbody>
                @if ($payes->count())
                    @foreach ($payes as $pay)
                        <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $pay->payment_id }}
                            </th>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $pay->Prenom }} , {{ $pay->Nom }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $pay->created_at }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                @if ($pay->statup == 1)
                                    <i class="fas fa-circle fa-xs" style="color: #25cc19;"></i> Pay
                                @else
                                    <i class="fas fa-circle fa-xs" style="color: #cc1928;"></i> no Pay
                                @endif
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $pay->amount }}
                            </td>
                            <td>
                                <div class="flex px-6 py-4">
                                    <div class="flex-1 ml-2">
                                        <a class="btn btn-green"  href="{{ route('payment.pdf', $pay->payment_id)}}" >
                                            <i class="far fa-file-pdf"></i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th COLSPAN="6" scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            There are not registers
                        </th>
                    </tr>
                @endif
            </tbody>

        </table>

    </div>

</div>

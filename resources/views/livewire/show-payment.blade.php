<div>
    <div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="px-6 py-4 flex items-center">
            <x-label for="option" value="{{ __('Chercher:') }}" />
            <select
                class="block mt-1 mr-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                id="option" wire:model="option">
                <option value="name">Nom</option>
                <option value="id">id</option>
                <option value="reporte">rapport</option>
            </select>

            <x-input class="mt-1 mr-4 flex-1" type="text" wire:model="search" placeholder="chercher"
                autocomplete="chercher" />

            @if ($option == 'reporte')
                <div class="px-6 py-4 flex items-center">
                    <div class="flex-1">
                        <x-label for="DateIn" value="{{ __('DateIn:') }}" />
                        <x-input id="DateIn" class="block mt-1 w-full" type="date" wire:model="dateIn" placeholder="dateIn"
                            autocomplete="dateIn" />
                    </div>
                    <div class="flex-1 mr-3">
                        <x-label for="dateFn" value="{{ __('DateFn:') }}" /> 
                        <x-input id="dateFn" class="block mt-1 w-full" type="date" wire:model="dateFn" placeholder="dateFn"
                            autocomplete="dateFn" />
                    </div>
                </div>
            @endif
            
            <div class="px-3 py-2">
                <a class="btn btn-green" wire:click="createInform">
                    <i class="far fa-file-excel"></i>
                </a>
            </div>

            @livewire('create-payment')

        </div>
        <table class="mt-2 w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="cursor-pointer px-6 py-3" wire:click="order('payment_id')">
                        Id

                        @if ($sort == 'payment_id')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif

                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3" wire:click="order('Nom')">
                        Nom

                        @if ($sort == 'Nom')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Date_creation
                    </th>

                    <th scope="col" class="cursor-pointer px-6 py-3" wire:click="order('statup')">
                        status

                        @if ($sort == 'statup')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif

                    </th>
                    <th scope="col" class=" px-6 py-3">
                        Amount
                    </th>

                    <th scope="col" class="cursor-pointer px-6 py-3" wire:click="order('date')">
                        date_rendez-vous

                        @if ($sort == 'date')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>

                    <th scope="col" class="cursor-pointer px-6 py-3" wire:click="order('groupe')">
                        Groupe
                        @if ($sort == 'groupe')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>

                    <th scope="col" class="cursor-pointer px-6 py-3" wire:click="order('hourap')">
                        heure
                        @if ($sort == 'hourap')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>

                    <th scope="col" class="px-6 py-3">
                        choix
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
                                    <i class="fas fa-circle fa-xs" style="color: #25cc19;"></i> payé
                                @else
                                    <i class="fas fa-circle fa-xs" style="color: #cc1928;"></i> pas payé

                                @endif
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $pay->amount }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $pay->date }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $pay->groupe }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $pay->hourap }}
                            </td>
                            <td>
                                <div class="flex px-6 py-4">
                                    <div class="flex-1">
                                        <a class="btn btn-green" href="{{ route('payment.pdf', $pay->payment_id) }}">
                                            <i class="far fa-file-pdf"></i>
                                        </a>
                                    </div>
                                    @if ($option == 'id')
                                        <div class="flex-1 ml-2">
                                            @livewire('edit-payment', ['pay' => $pay], key($pay->payment_id))
                                        </div>
                                    @endif
                                    <div class="flex-1 ml-2">
                                        <a class="btn btn-red" wire:click="$emit('removePay','{{ $pay->payment_id }}')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th COLSPAN="7" scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            pas d'enregistrements
                        </th>
                    </tr>
                @endif
            </tbody>

        </table>
        @if ($payes->hasPages())
            <div class="px-6 py-3">
                {{ $payes->links() }}
            </div>
        @endif
    </div>

    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            livewire.on('removePay', payId => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        livewire.emitTo('show-payment', 'deletePay', payId);

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush

</div>

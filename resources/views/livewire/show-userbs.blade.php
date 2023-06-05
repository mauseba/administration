<div>
    <div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="px-6 py-4 flex items-center">

            <select
                class=" mt-1 mr-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                wire:model="status">
                <option value="all" selected>Status</option>
                <option value="1">active</option>
                <option value="2">inactive</option>
            </select>

            <x-input class="flex-1 mt-1 mr-4" type="text" wire:model="search" placeholder="Search"
                autocomplete="search" />
            @livewire('create-userbs')
        </div>
        <table class="mt-2 w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="cursor-pointer px-6 py-3" wire:click="order('id')">
                        Id

                        @if ($sort == 'id')
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
                    <th scope="col" class="cursor-pointer px-6 py-3" wire:click="order('Prenom')">
                        Prenom

                        @if ($sort == 'Prenom')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif

                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3" wire:click="order('Ville')">
                        ville

                        @if ($sort == 'Ville')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif

                    </th>

                    <th scope="col" class="cursor-pointer px-6 py-3">
                        status
                    </th>

                    <th scope="col" class="px-6 py-3">
                        options
                    </th>
                </tr>
            </thead>

            <tbody>
                @if ($users->count())
                    @foreach ($users as $user)
                        <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->id }}
                            </th>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->Nom }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->Prenom }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->Ville }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                @if ($user->status == 1)
                                    <i class="fas fa-circle fa-xs" style="color: #25cc19;"></i> active
                                @else
                                    <i class="fas fa-circle fa-xs" style="color: #cc1928;"></i> inactive
                                @endif
                            </td>
                            <td>
                                <div class="flex px-6 py-4">
                                    <div class="flex-1 ml-2">
                                        @livewire('edit-userb', ['user' => $user], key($user->id))
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
        @if ($users->hasPages())
            <div class="px-6 py-3">
                {{ $users->links() }}
            </div>
        @endif
    </div>

</div>

<div>

    <div class="flex -mx-3">
        <div class="flex-1 w-1/4 px-3 mb-6 ">
            <x-label for="NomCom" value="{{ __('Nom complet') }}" />
            <x-input id="NomCom" class="block mt-1 w-full" type="text" name="NomCom" wire:model="NomCom" required
                autofocus />

            <x-input-error for="NomCom" />
        </div>
        <div class="flex-1 w-1/4 ml-2 px-3">
            <x-label for="LienP" value="{{ __('LienP') }}" />
            <x-input id="LienP" class="block mt-1 w-full" type="text" wire:model="LienP" required autofocus />

            <x-input-error for="LienP" />
        </div>
        <div class="flex-1 w-1/4 px-3 mb-6 ">
            <x-label for="Sex" value="{{ __('Sex') }}" />
            <select
                class=" block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                id="Sex" name="Sex" wire:model="Sex" required>
                <option value="">Select</option>
                <option value="M">Homme</option>
                <option value="F">Femme</option>
                <option value="O">Autre</option>
            </select>

            <x-input-error for="Sex" />

        </div>
        <div class="flex-1 w-1/4 px-3 mb-6 ">
            <x-label for="Age" value="{{ __('Age') }}" />
            <x-input id="Age" class="block mt-1 w-full" type="number" wire:model="Age" required autofocus />

            <x-input-error for="Age" />
        </div>
    </div>
    <div class="flex items-center justify-end mb-4">
        <x-button class="ml-2" wire:click="save" wire:loading.attr="disabled" wire:target="save">
            {{ __('submit') }}
        </x-button>
    </div>
    <table class="mt-2 w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class=" px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Nom
                </th>
                <th scope="col" class=" px-6 py-3">
                    LienP
                </th>
                <th scope="col" class=" px-6 py-3">
                    Sex

                </th>
                <th scope="col" class="px-6 py-3">
                    Age
                </th>

                <th scope="col" class="px-6 py-3">
                    Operation
                </th>
            </tr>
        </thead>

        <tbody>

            @foreach ($fams as $fam)
                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $fam->id }}
                    </th>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $fam->NomCom }}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $fam->LienP }}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $fam->Sex }}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $fam->Age }}
                    </td>
                    <td class="px-6 py-4">
                        <a class="btn btn-red" wire:click="$emit('deleteFam', {{ $fam->id }})">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            livewire.on('deleteFam', famId => {

                Swal.fire({
                    title: 'es-tu sûr?',
                    text: "Vous ne pourrez pas revenir en arrière !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, supprime le!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        livewire.emitTo('show-userbs','deletePer', famId);

                        Swal.fire(
                            'Supprimé!',
                            'Votre fichier a été supprimé.',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush
</div>

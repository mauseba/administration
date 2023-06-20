<div>
    <x-dialog-modal wire:model="open" class="overflow-y-scroll">
        <x-slot name="title">
            <h1>créer un rendez-vous</h1>
        </x-slot>
        <x-slot name="content">
            <div>
                <x-label for="option" value="{{ __('utilisateurs: ') }}" />
                <select wire:model="user_id" id="option" class="block mt-1 mr-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required autofocus>
                    <option value="">sélectionner...</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->Prenom }}, {{ $user->Nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex -mx-3 mb-2">
                <div class="flex-1 w-1/3 px-3 mb-6 ">
                    <x-label for="id" value="{{ __('horeIn') }}" />
                    <x-input id="horeIn" wire:model="horeIn" class="block mt-1 w-full" type="time" name="horeIn"  required autofocus  />
                    
                </div>
                <div class="flex-1 w-1/3 px-3 mb-6 ">
                    <x-label for="horeFn" value="{{ __('horeFn') }}" />
                    <x-input id="horeFn" wire:model="horeFn" class="block mt-1 w-full" type="time" name="horeFn" required autofocus  />
                    
                </div>
                <div class="flex-1 w-1/2 ml-2 px-3">
                    <x-label for="dateApp" value="{{ __('date') }}" />
                    <x-input id="dateApp" wire:model="dateApp"  class="block mt-1 w-full" type="date" name="dateApp"  required autofocus  />
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="flex items-center justify-end">
                <x-danger-button wire:click="$set('open',false)">
                    {{ __('Cancel') }}
                </x-danger-button>
                <x-button class="ml-2" wire:click="save" wire:loading.attr="disabled" wire:target="save">
                    {{ __('submit') }}
                </x-button>
            </div>
        </x-slot>
    </x-dialog-modal>

</div>

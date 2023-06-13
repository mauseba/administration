<div>
    <x-button wire:click="$set('open',true)" >
        créer un enregistrement
    </x-button>
    <x-dialog-modal wire:model="open" class="overflow-y-scroll">
        <x-slot name="title">
            créer un enregistrement
        </x-slot>
        <x-slot name="content">

            <div>
                <x-label for="option" value="{{ __('utilisateurs: ') }}" />
                <select wire:model="selectedOption" id="option" class="block mt-1 mr-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">sélectionner...</option>
                    @if(!empty($options))
                        @foreach ($options as $option)
                            <option value="{{ $option->id }}">{{ $option->Prenom }}, {{ $option->Nom }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            

            @if ($info)
                <div class="flex -mx-3 mb-2">
                    <div class="flex-1 w-1/3 px-3 mb-6 ">
                        <x-label for="id" value="{{ __('Id') }}" />
                        <x-input id="id" class="block mt-1 w-full" type="number" name="id" value="{{$info->id}}" required autofocus readonly />
                        
                    </div>
                    <div class="flex-1 w-1/2 px-3 mb-6 ">
                        <x-label for="Nom" value="{{ __('Nom') }}" />
                        <x-input id="Nom" class="block mt-1 w-full" type="text" name="Nom" value="{{$info->Nom}}" required autofocus readonly />
                        
                    </div>
                    <div class="flex-1 w-1/2 ml-2 px-3">
                        <x-label for="Prenom" value="{{ __('Prenom') }}" />
                        <x-input id="Prenom" class="block mt-1 w-full" type="text" name="Prenom" value="{{$info->Prenom}}" required autofocus readonly />
                        
                    </div>

                    <div class="flex-1 w-1/2 ml-2 px-3">
                        <x-label for="Value" value="{{ __('Value') }}" />
                        <x-input id="Value" class="block mt-1 w-full" type="number" name="Value" value="3.00" wire:model="amount" required autofocus readonly />
                        
                    </div>
                </div>
             @endif

        </x-slot>
        <x-slot name="footer">
            <div class="flex items-center justify-end">
                <x-danger-button wire:click="$set('open',false)">
                    {{ __('Cancel') }}
                </x-danger-button>
                <x-button class="ml-2" wire:click="save"  wire:loading.attr="disabled" wire:target="save">
                    {{ __('submit') }}
                </x-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>

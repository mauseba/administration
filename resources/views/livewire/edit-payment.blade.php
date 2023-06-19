<div>
    <a class="btn btn-blue" wire:click="$set('open',true)">
        <i class="fas fa-receipt"></i>
    </a>
    <x-dialog-modal wire:model="open" class="overflow-y-scroll">
        <x-slot name="title">
            créer un enregistrement
        </x-slot>
        <x-slot name="content">
            
            <div class="flex -mx-3 mb-2">
                <div class="flex-1 w-1/3 px-3 mb-6 ">
                    <x-label for="id" value="{{ __('Id') }}" />
                    <x-input id="id" class="block mt-1 w-full" type="number" name="id" wire:model="id_user" required autofocus readonly />
                    
                </div>
                <div class="flex-1 w-1/2 px-3 mb-6 ">
                    <x-label for="Nom" value="{{ __('Nom') }}" />
                    <x-input id="Nom" class="block mt-1 w-full" type="text" name="Nom" wire:model="Nom" required autofocus readonly />
                    
                </div>
                <div class="flex-1 w-1/2 ml-2 px-3">
                    <x-label for="Prenom" value="{{ __('Prenom') }}" />
                    <x-input id="Prenom" class="block mt-1 w-full" type="text" name="Prenom" wire:model="Prenom" required autofocus readonly />
                    
                </div>
            </div>

            <div class="flex -mx-3 mb-2">
                <div class="flex-1 w-1/3 ml-2 px-3">
                    <x-label for="Value" value="{{ __('Value') }}" />
                    <x-input id="Value" class="block mt-1 w-full" type="number" name="Value" wire:model="amount" required autofocus/>
                    
                </div>

                <div class="flex-1 w-1/3 ml-2 px-3">
                    <x-label for="group" value="{{ __('Group: ') }}" />
                    <select wire:model="group" id="group" class="block mt-1 mr-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="1">groupe 1</option>
                        <option value="2">groupe 2</option>
                    </select>
                </div>

                <div class="flex-1 w-1/3 ml-2 px-3">
                    <x-label for="interval" value="{{ __('Intervalle') }}" />
                    <x-input id="interval" class="block mt-1 w-full" type="number" name="interval" wire:model="interval" step="7" min="7" required autofocus />
                </div>

                @if ($group == 1)
                    <div class="flex-1 w-1/3 ml-2 px-3">
                        <x-label for="hourap" value="{{ __('houre de RV') }}" />
                        <x-input id="hourap" class="block mt-1 w-full" type="Time" name="hourap" wire:model="hourap" min="13:00" max="14:30" step="300" required autofocus />
                        <span color="red"> doit être entre 13h00 et 14h30</span>
                    </div>
                @else
                    <div class="flex-1 w-1/3 ml-2 px-3">
                        <x-label for="hourap" value="{{ __('houre de RV') }}" />
                        <x-input id="hourap" class="block mt-1 w-full" type="Time" name="hourap" wire:model="hourap" min="14:31" max="16:50" required autofocus />
                        <span color="red"> doit être entre 14h31 et 16h50</span>
                    </div>
                @endif
                
            </div>


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

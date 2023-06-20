<div>
    <x-dialog-modal wire:model="open" class="overflow-y-scroll">
        <x-slot name="title">
            <h1>modifier un rendez-vous</h1>
        </x-slot>
        <x-slot name="content">
            <div>
                <div  class="block w-full px-3 mb-6 ">
                    <x-label for="title" value="{{ __('Le titre : ') }}" />
                    <x-input id="title" wire:model="title" class="block mt-1 w-full" type="text" name="title"  required autofocus readonly />

                </div>
            </div>
            <div class="flex -mx-3 mb-2">
                <div  class="flex-1 w-1/3 px-3 mb-6 ">
                    <x-label for="user_id" value="{{ __('utilisateurs: ') }}" />
                    <x-input id="user_id" wire:model="user_id" class="block mt-1 w-full" type="number" name="user_id"  required autofocus readonly />

                </div>
                <div  class="flex-1 w-1/3 px-3 mb-6 ">
                    <x-label for="Nom" value="{{ __('Nom: ') }}" />
                    <x-input id="Nom" wire:model="Nom" class="block mt-1 w-full" type="text" name="Nom"  required autofocus readonly  />

                </div>
                <div  class="flex-1 w-1/3 px-3 mb-6 ">
                    <x-label for="Prenom" value="{{ __('Prenom: ') }}" />
                    <x-input id="Prenom" wire:model="Prenom" class="block mt-1 w-full" type="text" name="Prenom"  required autofocus readonly  />

                </div>
            </div>
            <div class="flex -mx-3 mb-2">
                <div class="flex-1 w-1/3 px-3 mb-6 ">
                    <x-label for="id" value="{{ __('horeIn') }}" />
                    <x-input id="horeIn" wire:model="horain"  class="block mt-1 w-full" type="time" name="horeIn"  required autofocus  />
                    
                </div>
                <div class="flex-1 w-1/3 px-3 mb-6 ">
                    <x-label for="horeFn" value="{{ __('horeFn') }}" />
                    <x-input id="horeFn" wire:model="horaFn"  class="block mt-1 w-full" type="time" name="horeFn" required autofocus  />
                    
                </div>
                <div class="flex-1 w-1/2 ml-2 px-3">
                    <x-label for="dateApp" value="{{ __('date') }}" />
                    <x-input id="dateApp" wire:model="date"  class="block mt-1 w-full" type="date" name="dateApp"  required autofocus  />
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="flex items-center justify-end">
                <x-button wire:click="$set('open',false)">
                    {{ __('Cancel') }}
                </x-button>
                <x-danger-button class="ml-2" wire:click="$emit('removeApp','{{$app_id}}')">
                    {{ __('Delete') }}
                </x-danger-button>
                <x-button class="ml-2" wire:click="save" wire:loading.attr="disabled" wire:target="save">
                    {{ __('Modifier') }}
                </x-button>
            </div>
        </x-slot>
    </x-dialog-modal>
    @push('script3')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        livewire.on('removeApp', appId => {
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
                    livewire.emitTo('edit-appointment', 'delete', appId);

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

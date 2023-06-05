<div>
    <a class="btn btn-green" wire:click="$set('open',true)">
        <i class="fas fa-edit"></i>
    </a>
    <x-dialog-modal wire:model="open" class="overflow-y-scroll">
        <x-slot name="title">
            Edit User
        </x-slot>
        <x-slot name="content">
            <div class="mb-2 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center">
                    <li class="-mb-px mr-1">
                        <x-button
                            class="inline-block border-l border-t border-r rounded-t py-2 px-4 {{ $tab === 'tab1' ? 'text-blue-500 font-semibold' : 'text-gray-500' }}"
                            wire:click="$set('tab', 'tab1')">User Data</x-button>
                    </li>
                    <li class="-mb-px mr-1">
                        <x-button
                            class="inline-block py-2 px-4 text-blue-500 font-semibold {{ $tab === 'tab2' ? 'text-blue-500 font-semibold' : 'text-gray-500' }}"
                            wire:click="$set('tab', 'tab2')">Renseignement</x-button>
                    </li>
                    <li class="-mb-px mr-1">
                        <x-button wire:click="$set('tab', 'tab3')">Family</x-button>
                    </li>
                </ul>

                <div class="p-4">
                    <div class="{{ $tab === 'tab1' ? 'block' : 'hidden' }}">

                        <div class="flex -mx-3 mb-2">
                            <div class="flex-1 w-1/2 px-3 mb-6 ">
                                <x-label for="Nom" value="{{ __('Nom') }}" />
                                <x-input id="Nom" class="block mt-1 w-full" type="text" name="Nom"
                                    wire:model="user.Nom" required autofocus />

                                <x-input-error for="Nom" />
                            </div>
                            <div class="flex-1 w-1/2 ml-2 px-3">
                                <x-label for="Prenom" value="{{ __('Prenom') }}" />
                                <x-input id="Prenom" class="block mt-1 w-full" type="text" name="Prenom"
                                    wire:model="user.Prenom" required autofocus />

                                <x-input-error for="Prenom" />
                            </div>

                        </div>
                        <div class="flex -mx-3 mb-2">
                            <div class="flex-1 w-1/4 px-3 mb-6 ">
                                <x-label for="Ville" value="{{ __('Ville') }}" />
                                <x-input id="Ville" class="block mt-1 w-full" type="text" name="Ville"
                                    wire:model="user.Ville" required autofocus />

                                <x-input-error for="Ville" />
                            </div>
                            <div class="flex-1 w-1/4 ml-2 px-3">
                                <x-label for="Province" value="{{ __('Province') }}" />
                                <x-input id="Province" class="block mt-1 w-full" type="text"
                                    wire:model="user.Province" name="Province" required autofocus />

                                <x-input-error for="Province" />
                            </div>
                            <div class="flex-1 w-1/4 px-3 mb-6 ">
                                <x-label for="CodePostal" value="{{ __('Code Postal') }}" />
                                <x-input id="CodePostal" class="block mt-1 w-full" type="text"
                                    wire:model="user.CodePostal" name="CodePostal" required autofocus />

                                <x-input-error for="CodePostal" />

                            </div>
                            <div class="flex-1 w-1/4 px-3 mb-6 ">
                                <x-label for="Adresse" value="{{ __('Adresse') }}" />
                                <x-input id="Adresse" class="block mt-1 w-full" type="text"
                                    wire:model="user.Adresse" name="Adresse" required autofocus />

                                <x-input-error for="Adresse" />
                            </div>
                        </div>

                        <div class="flex -mx-3 mb-2">
                            <div class="flex-auto w-64 px-3 mb-6 ">
                                <x-label for="Telephone" value="{{ __('Telephone') }}" />
                                <x-input id="Telephone" class="block mt-1 w-full" type="number" name="Telephone"
                                    wire:model="user.Telephone" required autofocus />

                                <x-input-error for="Telephone" />
                            </div>
                            <div class="flex-auto w-full px-3 mb-6">
                                <x-label for="Courriel" value="{{ __('Email') }}" />
                                <x-input id="Courriel" class="block mt-1 w-full " wire:model="user.Courriel"
                                    type="email" name="Courriel" required />

                                <x-input-error for="Courriel" />
                            </div>
                        </div>
                        <div class="flex -mx-3 mb-2">
                            <div class="flex-1 w-1/4 px-3 mb-6 ">
                                <x-label for="Langue" value="{{ __('langue') }}" />
                                <x-input id="Langue" class="block mt-1 w-full" type="text"
                                    wire:model="user.Langue" name="Langue" required autofocus />

                                <x-input-error for="Langue" />
                            </div>
                            <div class="flex-1 w-1/4 px-3 mb-6 ">
                                <x-label for="EtatMatrimonial" value="{{ __('EtatMatrimonial') }}" />
                                <select
                                    class=" block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    id="EtatMatrimonial" name="EtatMatrimonial" wire:model="user.EtatMatrimonial"
                                    required>
                                    <option value="">Select</option>
                                    <option value="célibataire">célibataire</option>
                                    <option value="marié">marié</option>
                                    <option value="conjoint de fait">conjoint de fait</option>
                                    <option value="divorcé">divorcé</option>
                                    <option value="séparé">séparé</option>
                                    <option value="veuf">veuf</option>
                                </select>

                                <x-input-error for="EtatMatrimonial" />
                            </div>
                            <div class="flex-1 w-1/4 px-3 mb-6 ">
                                <x-label for="StatutCanada" value="{{ __('Status Canada') }}" />
                                <select
                                    class=" block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    id="StatutCanada" name="StatutCanada" wire:model="user.StatutCanada" required>
                                    <option value="">Select</option>
                                    <option value="Visiteur">Visiteur</option>
                                    <option value="Étudiant">Étudiant int</option>
                                    <option value="Travailleur">Travailleur temp</option>
                                    <option value="Réfugié">Réfugié</option>
                                    <option value="Résident">Résident</option>
                                    <option value="Citoyen">Citoyen</option>
                                </select>

                                <x-input-error for="StatutCanada" />
                            </div>
                            <div class="flex-1 w-1/4 px-3 mb-6 ">
                                <x-label for="DateNaiss" value="{{ __('DateNaiss') }}" />
                                <x-input id="DateNaiss" class="block mt-1 w-full" wire:model="user.DateNaiss"
                                    type="date" name="DateNaiss" required autofocus />

                                <x-input-error for="DateNaiss" />
                            </div>
                        </div>
                        <div class="flex -mx-3 mb-2">
                            <div class="flex-1 w-1/3 px-3 mb-6 ">
                                <x-label for="Pays" value="{{ __('Pays origin') }}" />
                                <x-input id="Pays" class="block mt-1 w-full" type="text"
                                    wire:model="user.Pays" name="Pays" required autofocus />

                                <x-input-error for="Pays" />
                            </div>
                            <div class="flex-1 w-1/3 ml-2 px-3">
                                <x-label for="Genre" value="{{ __('Sexe') }}" />
                                <select
                                    class=" block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    id="Genre" name="Genre" wire:model="user.Genre" required>
                                    <option value="">Select</option>
                                    <option value="M">Homme</option>
                                    <option value="F">Femme</option>
                                    <option value="O">Autre</option>
                                </select>

                                <x-input-error for="Genre" />
                            </div>
                            <div class="flex-1 w-1/3 px-3 mb-6 ">
                                <x-label for="Menage" value="{{ __('Type menage') }}" />
                                <select
                                    class=" block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required id="Menage" wire:model="user.Menage" name="Menage">
                                    <option value="">Select</option>
                                    <option value="Couple">Couple</option>
                                    <option value="Couple avec enfant(s)">Couple avec enfant(s)</option>
                                    <option value="Famille monoparentale">Famille monoparentale</option>
                                    <option value="Presonne seule">Presonne seule</option>
                                    <option value="Ensamble d'adultes">Ensamble d'adultes</option>
                                </select>
                                <x-input-error for="Menage" />

                            </div>
                        </div>
                    </div>
                    <div class="{{ $tab === 'tab2' ? 'block' : 'hidden' }}">
                        <div class="flex -mx-3 mb-2">
                            <div class="flex-1 w-1/3 px-3 mb-6 ">
                                <x-label for="Revenu" value="{{ __('Revenue du menage: ') }}" />
                                <x-input id="Revenu" class="block mt-1 w-full" type="number" name="Revenu"
                                    wire:model="user.Revenu" required autofocus />

                                <x-input-error for="Revenu" />
                            </div>
                            <div class="flex-1 w-1/3 ml-2 px-3">
                                <x-label for="Type_logement" value="{{ __('Type de logement') }}" />
                                <x-input id="Type_logement" class="block mt-1 w-full" type="text"
                                    name="Type_logement" wire:model="user.Type_logement" required autofocus />

                                <x-input-error for="Type_logement" />
                            </div>

                            <div class="flex-1 w-1/3 ml-2 px-3">
                                <x-label for="status" value="{{ __('Status: ') }}" />
                                <select
                                    class=" block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    id="status" name="status" wire:model="user.status" required>
                                    <option value="">Select</option>
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                </select>

                                <x-input-error for="Type_logement" />
                            </div>
                        </div>
                        <div class="mb-2 ">
                            <x-label for="Q1"
                                value="{{ __('Etes-vous déjà inscrit(e) dans une banque alimentaire?: ') }}" />
                            <select
                                class=" block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="Q1" name="Q1" wire:model="user.Q1" required>
                                <option value="">Select</option>
                                <option value="OUI">Oui</option>
                                <option value="NO">No</option>
                            </select>
                            <x-input-error for="Q1" />
                        </div>
                        <div class="mb-2 ">
                            <x-label for="Q2"
                                value="{{ __('Études postsecondaire - Cegep + Universite(+18)? ') }}" />
                            <select
                                class=" block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="Q2" name="Q2" wire:model="user.Q2" required>
                                <option value="">Select</option>
                                <option value="OUI">Oui</option>
                                <option value="NO">No</option>
                            </select>
                            <x-input-error for="Q2" />
                        </div>
                        <div class="mb-2 ">
                            <x-label for="Q3"
                                value="{{ __('Nouv. inmigrant/refugie depuis moins de 10 ans? ') }}" />
                            <select
                                class=" block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="Q3" name="Q3" wire:model="user.Q3" required>
                                <option value="">Select</option>
                                <option value="OUI">Oui</option>
                                <option value="NO">No</option>
                            </select>
                            <x-input-error for="Q3" />
                        </div>
                        <div class="mb-2 ">
                            <x-label for="Q4" value="{{ __('Diète particuliere? ') }}" />
                            <select
                                class=" block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="Q4" name="Q4" wire:model="user.Q4" required>
                                <option value="">Select</option>
                                <option value="OUI">Oui</option>
                                <option value="NO">No</option>
                            </select>
                            <x-input-error for="Q4" />
                        </div>
                        <div class="mb-2 ">
                            <x-label for="Q5" value="{{ __('Première Nation, Metis, Inuits(+18)? ') }}" />
                            <select
                                class=" block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="Q5" name="Q5" wire:model="user.Q5" required>
                                <option value="">Select</option>
                                <option value="OUI">Oui</option>
                                <option value="NO">No</option>
                            </select>
                            <x-input-error for="Q5" />
                        </div>
                        <div class="flex items-center justify-end">
                            <x-button class="ml-2" wire:click="save"  wire:loading.attr="disabled" wire:target="save">
                                {{ __('mettre à jour ') }}
                            </x-button>
                        </div>
                    </div>
                    <div class="{{ $tab === 'tab3' ? 'block' : 'hidden' }}">
                        @livewire('show-fam', ['user' => $user])
                    </div>
                </div>

            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="flex items-center justify-end">
                <x-danger-button wire:click="$set('open',false)">
                    {{ __('Cancel') }}
                </x-danger-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>

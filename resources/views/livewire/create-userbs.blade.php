<div>
    <x-button wire:click="$set('open',true)">
        Créer un utilisateur
    </x-button>
    <x-dialog-modal wire:model="open" class="overflow-y-scroll">
        <x-slot name="title">
            Créer un utilisateur
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
                            wire:click="$set('tab', 'tab2')">Family</x-button>
                    </li>
                    <li class="-mb-px mr-1">
                        <x-button
                            class="inline-block py-2 px-4 text-blue-500 font-semibold {{ $tab === 'tab3' ? 'text-blue-500 font-semibold' : 'text-gray-500' }}"
                            wire:click="$set('tab', 'tab3')">Renseignement</x-button>
                    </li>
                </ul>

                <div class="p-4">
                    <div class="{{ $tab === 'tab1' ? 'block' : 'hidden' }}">

                        <div class="flex -mx-3 mb-2">
                            <div class="flex-1 w-1/2 px-3 mb-6 ">
                                <x-label for="Nom" value="{{ __('Nom') }}" />
                                <x-input id="Nom" class="block mt-1 w-full" type="text" name="Nom"
                                    wire:model="Nom" required autofocus />
                                
                                <x-input-error for="Nom" />
                            </div>
                            <div class="flex-1 w-1/2 ml-2 px-3">
                                <x-label for="Prenom" value="{{ __('Prenom') }}" />
                                <x-input id="Prenom" class="block mt-1 w-full" type="text" name="Prenom"
                                    wire:model="Prenom" required autofocus />
                                
                                <x-input-error for="Prenom" />
                            </div>

                        </div>
                        <div class="flex -mx-3 mb-2">
                            <div class="flex-1 w-1/4 px-3 mb-6 ">
                                <x-label for="Ville" value="{{ __('Ville') }}" />
                                <x-input id="Ville" class="block mt-1 w-full" type="text" name="Ville"
                                    wire:model="Ville" required autofocus />
                                
                                <x-input-error for="Ville" />
                            </div>
                            <div class="flex-1 w-1/4 ml-2 px-3">
                                <x-label for="Province" value="{{ __('Province') }}" />
                                <x-input id="Province" class="block mt-1 w-full" type="text" wire:model="Province"
                                    name="Province" required autofocus />
                                
                                <x-input-error for="Province" />
                            </div>
                            <div class="flex-1 w-1/4 px-3 mb-6 ">
                                <x-label for="CodePostal" value="{{ __('Code Postal') }}" />
                                <x-input id="CodePostal" class="block mt-1 w-full" type="text"
                                    wire:model="CodePostal" name="CodePostal" required autofocus />
                                
                                <x-input-error for="CodePostal" />

                            </div>
                            <div class="flex-1 w-1/4 px-3 mb-6 ">
                                <x-label for="Adresse" value="{{ __('Adresse') }}" />
                                <x-input id="Adresse" class="block mt-1 w-full" type="text" wire:model="Adresse"
                                    name="Adresse" required autofocus />
                                
                                <x-input-error for="Adresse" />
                            </div>
                        </div>

                        <div class="flex -mx-3 mb-2">
                            <div class="flex-auto w-64 px-3 mb-6 ">
                                <x-label for="Telephone" value="{{ __('Telephone') }}" />
                                <x-input id="Telephone" class="block mt-1 w-full" type="tel" name="Telephone"
                                    wire:model="Telephone" required autofocus />
                                
                                <x-input-error for="Telephone" />
                            </div>
                            <div class="flex-auto w-full px-3 mb-6">
                                <x-label for="Courriel" value="{{ __('Email') }}" />
                                <x-input id="Courriel" class="block mt-1 w-full " wire:model="Courriel" type="email"
                                    name="Courriel" required />
                                    
                                <x-input-error for="Courriel" />
                            </div>
                        </div>
                        <div class="flex -mx-3 mb-2">
                            <div class="flex-1 w-1/4 px-3 mb-6 ">
                                <x-label for="Langue" value="{{ __('langue') }}" />
                                <x-input id="Langue" class="block mt-1 w-full" type="text" wire:model="Langue"
                                    name="Langue" required autofocus />
                                
                                <x-input-error for="Langue" />
                            </div>
                            <div class="flex-1 w-1/4 px-3 mb-6 ">
                                <x-label for="EtatMatrimonial" value="{{ __('EtatMatrimonial') }}" />
                                <select
                                    class=" block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    id="EtatMatrimonial" name="EtatMatrimonial" wire:model="EtatMatrimonial" required>
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
                                    id="StatutCanada" name="StatutCanada" wire:model="StatutCanada" required>
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
                                <x-input id="DateNaiss" class="block mt-1 w-full" wire:model="DateNaiss"
                                    type="date" name="DateNaiss" required autofocus />
                                    
                                <x-input-error for="DateNaiss" />
                            </div>
                        </div>
                        <div class="flex -mx-3 mb-2">
                            <div class="flex-1 w-1/3 px-3 mb-6 ">
                                <x-label for="Pays" value="{{ __('Pays origin') }}" />
                                <x-input id="Pays" class="block mt-1 w-full" type="text" wire:model="Pays"
                                    name="Pays" required autofocus />
                                
                                 <x-input-error for="Pays" />
                            </div>
                            <div class="flex-1 w-1/3 ml-2 px-3">
                                <x-label for="Genre" value="{{ __('Sexe') }}" />
                                <select
                                    class=" block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    id="Genre" name="Genre" wire:model="Genre" required>
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
                                    required id="Menage" wire:model="Menage" name="Menage">
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
                        <div class="block w-1/2 -mx-3 mb-2">
                            <x-label for="num_family_members" value="{{ __('Number Fam') }}" />
                            <x-input id="num_family_members" class="block mt-1 w-full" type="number" name="num_family_members" min="0" wire:model="numFamilyMembers" required autofocus readonly/>

                            <x-input-error for="num_family_members" />
                        </div>
                        @foreach ($familyMembers as $index => $familyMember)
                            <div class="flex -mx-3 mb-2">
                                <div class="flex-1 w-1/2 px-3 mb-4 ">
                                    <label for="NomCom_{{ $index }}" class="block font-medium text-sm text-gray-700 dark:text-gray-300">NomCom_{{$index}}</label>
                                    <x-input id="NomCom_{{ $index }}" class="block mt-1 w-full" type="text" name="NomCom_{{ $index }}"
                                        wire:model="familyMembers.{{ $index }}.NomCom" required autofocus />

                                    <x-input-error for="familyMembers.{{ $index }}.NomCom" />

                                </div>
                                <div class="flex-1 w-1/2 ml-2 px-3">
                                    <label for="LienP_{{ $index }}" class="block font-medium text-sm text-gray-700 dark:text-gray-300">LienP_{{$index}}</label>
                                    <x-input id="LienP_{{ $index }}" class="block mt-1 w-full" type="text" name="LienP_{{ $index }}"
                                        wire:model="familyMembers.{{ $index }}.LienP" required autofocus />

                                    <x-input-error for="familyMembers.{{ $index }}.LienP" />
                                </div>
                            </div>
                            <div class="flex -mx-3 mb-2">
                                <div class="flex-1 w-1/2 px-3 mb-6 ">
                                    <label for="Sex_{{ $index }}" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Sex_{{$index}}</label>
                                    <select
                                        class=" block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        id="Sex_{{ $index }}" name="Sex_{{ $index }}" wire:model="familyMembers.{{ $index }}.Sex" required>
                                        <option value="">Select</option>
                                        <option value="M">Homme</option>
                                        <option value="F">Femme</option>
                                        <option value="O">Autre</option>
                                    </select>

                                    <x-input-error for="familyMembers.{{ $index }}.Sex" />

                                </div>
                                <div class="flex-1 w-1/2 ml-2 px-3">
                                    <label for="Age_{{ $index }}" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Age_{{$index}}</label>
                                    <x-input id="Age_{{ $index }}" class="block mt-1 w-full" type="number" name="Age_{{ $index }}"
                                        wire:model="familyMembers.{{ $index }}.Age" required autofocus />

                                    <x-input-error for="familyMembers.{{ $index }}.Age" />
                                </div>
                            </div>
                            <div class="flex items-center justify-end">
                                <x-danger-button wire:click="removeFamilyMember({{ $index }})" wire:loading.attr="disabled" wire:target="removeFamilyMember({{ $index }})">
                                   -
                                </x-danger-button>
                            </div>
                        @endforeach
                        <div class="mt-4">
                            <x-button wire:click="addFamilyMember" wire:loading.attr="disabled" wire:target="addFamilyMember">
                               +
                            </x-button>
                        </div>
                    </div>
                    <div class="{{ $tab === 'tab3' ? 'block' : 'hidden' }}">
                        <x-validation-errors class="mb-4" />
                        <div class="flex -mx-3 mb-2">
                            <div class="flex-1 w-1/2 px-3 mb-6 ">
                                <x-label for="Revenu" value="{{ __('Revenue du menage: ') }}" />
                                <x-input id="Revenu" class="block mt-1 w-full" type="number" name="Revenu"
                                    wire:model="Revenu" required autofocus />
                                
                                <x-input-error for="Revenu" />
                            </div>
                            <div class="flex-1 w-1/2 ml-2 px-3">
                                <x-label for="Type_logement" value="{{ __('Type de logement') }}" />
                                <x-input id="Type_logement" class="block mt-1 w-full" type="text"
                                    name="Type_logement" wire:model="Type_logement" required autofocus />
                                
                                <x-input-error for="Type_logement" />
                            </div>
                        </div>
                        <div class="mb-2 ">
                            <x-label for="Q1"
                                value="{{ __('Etes-vous déjà inscrit(e) dans une banque alimentaire?: ') }}" />
                            <label for="Q1" class="flex items-center" wire:model="Q1">
                                <x-radio id="Q1" name="Q1" value="OUI" />
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Oui') }}</span>
                                <x-radio id="Q1" name="Q1" class="ml-2" value="NO" />
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('No') }}</span>
                            </label>
                            <x-input-error for="Q1" />
                        </div>
                        <div class="mb-2 ">
                            <x-label for="Q2"
                                value="{{ __('Études postsecondaire - Cegep + Universite(+18)? ') }}" />
                            <label for="Q2" class="flex items-center" wire:model="Q2">
                                <x-radio id="Q2" name="Q2" value="OUI" />
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Oui') }}</span>
                                <x-radio id="Q2" name="Q2" class="ml-2" value="NO" />
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('No') }}</span>
                            </label>
                            <x-input-error for="Q2" />
                        </div>
                        <div class="mb-2 ">
                            <x-label for="Q3"
                                value="{{ __('Nouv. inmigrant/refugie depuis moins de 10 ans? ') }}" />
                            <label for="Q3" class="flex items-center" wire:model="Q3">
                                <x-radio id="Q3" name="Q3" value="OUI" />
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Oui') }}</span>
                                <x-radio id="Q3" name="Q3" class="ml-2" value="NO" />
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('No') }}</span>
                            </label>
                            
                            <x-input-error for="Q3" />
                        </div>
                        <div class="mb-2 ">
                            <x-label for="Q4" value="{{ __('Diète particuliere? ') }}" />
                            <label for="Q4" class="flex items-center" wire:model="Q4">
                                <x-radio id="Q4" name="Q4" value="OUI" />
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Oui') }}</span>
                                <x-radio id="Q4" name="Q4" class="ml-2" value="NO" />
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('No') }}</span>
                            </label>

                            <x-input-error for="Q4" />
                        </div>
                        <div class="mb-2 ">
                            <x-label for="Q5" value="{{ __('Première Nation, Metis, Inuits(+18)? ') }}" />
                            <label for="Q5" class="flex items-center" wire:model="Q5">
                                <x-radio id="Q5" name="Q5" value="OUI" />
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Oui') }}</span>
                                <x-radio id="Q5" name="Q5" class="ml-2" value="NO" />
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('No') }}</span>
                            </label>

                            <x-input-error for="Q5" />
                        </div>
                    </div>
                </div>

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

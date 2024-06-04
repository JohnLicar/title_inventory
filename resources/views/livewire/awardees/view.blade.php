<div>
    <div class="inline-flex w-full mb-4 overflow-hidden bg-white rounded-lg shadow-md">
        <div class="flex items-center justify-center w-12 bg-blue-500">
            <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z">
                </path>
            </svg>
        </div>

        <div class="px-4 py-2 -mx-3">
            <div class="mx-3">
                <span class="font-semibold text-blue-500">Info</span>
                <p class="text-sm text-gray-600">Sample table page</p>
            </div>
        </div>
    </div>
    <form autocomplete="off" class="space-y-3">
        <div class="p-6 bg-white shadow sm:p-8 sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Awardees complete and exact information') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Update your account's profile information and email address.") }}
                        </p>
                    </header>


                    <div class="mt-6 space-y-6">
                        <div>
                            <x-inputs.group>
                                <x-inputs.floating disabled name="'last_name'" wire:model='last_name' />
                                <x-inputs.label>Last Name</x-inputs.label>
                            </x-inputs.group>
                        </div>

                        <div>
                            <x-inputs.group>
                                <x-inputs.floating disabled name="'first_name'" wire:model='first_name' />
                                <x-inputs.label>First Name</x-inputs.label>
                            </x-inputs.group>
                        </div>

                        <div>
                            <x-inputs.group>
                                <x-inputs.floating disabled name="'middle_name'" wire:model='middle_name' />
                                <x-inputs.label>Middle Name</x-inputs.label>
                            </x-inputs.group>
                        </div>

                        <div>
                            <x-inputs.group>
                                <x-date-picker disabled name='birthday' wire:model='birthday' />
                                <x-inputs.label>Birth Day</x-inputs.label>
                            </x-inputs.group>
                        </div>

                        <div>
                            <x-inputs.group>
                                <x-date-picker disabled name='civil_status' wire:model='civil_status' />
                                <x-inputs.label>Civil Status</x-inputs.label>
                            </x-inputs.group>
                        </div>
                    </div>

                    <div class="mt-6 space-y-6">

                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Spouse complete and exact information') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Update your account's profile information and email address.") }}
                            </p>
                        </header>
                        <div>
                            <x-inputs.group>
                                <x-inputs.floating disabled name="spouse_last_name" wire:model='spouse_last_name' />
                                <x-inputs.label>Last Name</x-inputs.label>
                            </x-inputs.group>
                        </div>

                        <div>
                            <x-inputs.group>
                                <x-inputs.floating disabled name="spouse_first_name" wire:model='spouse_first_name' />
                                <x-inputs.label>First Name</x-inputs.label>
                            </x-inputs.group>
                        </div>

                        <div>
                            <x-inputs.group>
                                <x-inputs.floating disabled name="spouse_middle_name" wire:model='spouse_middle_name' />
                                <x-inputs.label>Middle Name</x-inputs.label>
                            </x-inputs.group>
                        </div>

                        <div>
                            <x-inputs.group>
                                <x-date-picker disabled name='spouse_birthday' wire:model='spouse_birthday' />
                                <x-inputs.label>Birth Day</x-inputs.label>
                            </x-inputs.group>
                        </div>

                    </div>

                    <div class="mt-6 space-y-6">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Awardee unit information') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Please make sure the Unit information is correct") }}
                            </p>
                        </header>

                        <div class="grid grid-cols-2 gap-y-4 gap-x-2">
                            <div>
                                <x-inputs.group>
                                    <x-inputs.floating disabled name="site" wire:model='site' />
                                    <x-inputs.label>Phase</x-inputs.label>
                                </x-inputs.group>
                            </div>

                            <div>
                                <x-inputs.group>
                                    <x-inputs.floating disabled name="'phase'" wire:model='phase' />
                                    <x-inputs.label>Phase</x-inputs.label>
                                </x-inputs.group>
                            </div>

                            <div>
                                <x-inputs.group>
                                    <x-inputs.floating disabled name="'block'" wire:model='block' />
                                    <x-inputs.label>Block</x-inputs.label>
                                </x-inputs.group>
                            </div>

                            <div>
                                <x-inputs.group>
                                    <x-inputs.floating disabled name="'lot'" wire:model='lot' />
                                    <x-inputs.label>Lot</x-inputs.label>
                                </x-inputs.group>
                            </div>
                        </div>

                        @if ($reblocking_block || $reblocking_lot || $reblocking_phase)
                        <div class="grid grid-cols-2 gap-y-4 gap-x-2">
                            <div>
                                <x-inputs.group>
                                    <x-inputs.floating disabled name="'reblocking_phase'"
                                        wire:model='reblocking_phase' />
                                    <x-inputs.label>Phase</x-inputs.label>
                                </x-inputs.group>
                            </div>

                            <div>
                                <x-inputs.group>
                                    <x-inputs.floating disabled name="'reblocking_block'"
                                        wire:model='reblocking_block' />
                                    <x-inputs.label>Block</x-inputs.label>
                                </x-inputs.group>
                            </div>

                            <div>
                                <x-inputs.group>
                                    <x-inputs.floating disabled name="'reblocking_lot'" wire:model='reblocking_lot' />
                                    <x-inputs.label>Lot</x-inputs.label>
                                </x-inputs.group>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="flex flex-row-reverse gap-2 mt-6">
                        <x-primary-button type="submit">Save Information</x-primary-button>
                        <x-secondary-button class="text-red-400" href="{{ route('awardees.index') }}" wire:navigate>
                            Cancel</x-secondary-button>

                    </div>
                </section>
            </div>
        </div>
    </form>
</div>
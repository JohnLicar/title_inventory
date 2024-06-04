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

    <div class="flex items-center justify-between p-5 mb-4 bg-white rounded">

        <div>
            <x-inputs.group>
                <x-primary-button class="py-3" href="{{ route('awardees.create') }}" wire:navigate>{{ __('Add awardees')
                    }}
                </x-primary-button>
            </x-inputs.group>
        </div>


        <div class="flex gap-x-3">
            <x-inputs.group>
                <x-inputs.floating wire:model.live='search' name="search" placeholder=" " value="{{ old('search') }}" />
                <x-inputs.label icon="search">Search</x-inputs.label>
            </x-inputs.group>
        </div>
    </div>

    {{-- Table --}}

    <div class="container mt-6 overflow-x-auto">
        <x-table>
            <x-slot name="head">
                <x-table.heading>
                    #
                </x-table.heading>

                <x-table.heading>
                    Full Name
                </x-table.heading>

                <x-table.heading>
                    Birthday
                </x-table.heading>

                <x-table.heading>
                    Civil Status
                </x-table.heading>

                <x-table.heading>
                    Full Name
                </x-table.heading>

                <x-table.heading>
                    Birthday
                </x-table.heading>

                <x-table.heading>

                </x-table.heading>
            </x-slot>
            <x-slot name="body">
                @forelse ($awardees as $awardee)
                <x-table.row striped wire:key="{{$awardee->id}}" wire:loading.class="opacity-50">
                    <x-table.cell class="py-5">
                        {{$awardees->firstItem() + $loop->index }}
                    </x-table.cell>

                    <x-table.cell>
                        <div class="font-medium ">{{$awardee->full_name}}
                        </div>
                    </x-table.cell>

                    <x-table.cell>
                        {{$awardee->birthday->format('F j, Y')}}
                    </x-table.cell>

                    <x-table.cell>
                        {{$awardee->civil_status}}
                    </x-table.cell>

                    <x-table.cell>
                        <div class="font-medium ">{{$awardee->spouse?->fullName}}</div>
                    </x-table.cell>

                    <x-table.cell>
                        {{$awardee->spouse?->spouse_birthday->format('F j, Y')}}
                    </x-table.cell>

                    <x-table.cell>
                        <x-button.text btn-type="success" isLink href="{{ route('awardees.view', $awardee) }}"
                            wire:navigate>
                            View
                        </x-button.text>
                        <x-button.text isLink btn-type="info" href="{{ route('awardees.update', $awardee) }}"
                            wire:navigate>
                            Update
                        </x-button.text>
                        <x-button.text btn-type="error">
                            Delete
                        </x-button.text>
                    </x-table.cell>

                </x-table.row>
                @empty
                <x-no-data />
                @endforelse
            </x-slot>
        </x-table>
    </div>
    <div class="mt-5 mb-5">
        {{ $awardees->onEachSide(0)->links() }}
    </div>
</div>
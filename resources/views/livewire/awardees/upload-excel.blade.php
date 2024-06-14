<section x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
    x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
    x-on:livewire-upload-error="uploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress"
    class="space-y-6">
    <x-modal name="upload-excel">
        <form method="post" wire:submit="importFile" class="p-6" enctype="multipart/form-data">
            @csrf
            @method('post')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Please make sure the correct template of excel file is correct') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once you upload file make sure you add all the correct info and use the correct templete to
                prevent unneccessary error.') }}
            </p>

            <x-inputs.group :error="$errors->first('file')">
                <div class="flex items-center justify-center w-full mt-4">
                    <label @class(['flex flex-col items-center justify-center w-full h-64 border-2 border-dashed
                        rounded-lg cursor-pointer hover:bg-gray-100', 'border-gray-300 bg-gray-50'=>
                        !$errors->first('file'),
                        'border-red-500 bg-red-50'=> $errors->first('file')])>
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 "><span class="font-semibold">Click
                                    to
                                    upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 ">PDF only (MAX.
                                100MB)</p>
                        </div>
                        <input wire:model='file' name="dropzone-file" type="file" class="hidden" />
                    </label>
                </div>
            </x-inputs.group>

            <div x-show="uploading" class="w-full">
                <progress class=" flex h-2.5 w-full overflow-hidden rounded-xl  mt-2" max="100"
                    x-bind:value="progress"></progress>
            </div>

            @if ($file)
            <ul class="mt-4 ml-4 font-medium text-gray-900 list-disc">
                <li>
                    {{ $file->getClientOriginalName()}}
                </li>
            </ul>
            @endif

            <div class="flex justify-end mt-6">
                <x-secondary-button x-on:click="$dispatch('close')" class="cursoor-pointer" wire:click='resetFile'>
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button type="submit" class="ms-3">
                    {{ __('Upload File') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>

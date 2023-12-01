<div class="mt-10 p-5 bg-gra-100 flex flex-col justify-center items-center">
    <h3>Postularme a esta vacante</h3>
    @if (session()->has('mensaje'))
        <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bolt p-2 my-5 text-sm">
            {{ session('mensaje') }}
        </div>
    @else

        <form wire:submit.prevent='postularme' class="w-96 mt-5" >
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Currículum o Vida Laboral (PDF)')"/>
                <x-text-input id="cv" type="file" wire:model="cv" accept=".pdf" class="block mt-1 w-full"/>
            </div>

            @error('cv')
                <livewire:mostrar-alerta :message="$message"/>
            @enderror

            <x-primary-button class="my-5" wire:loading.attr="disabled">
                {{__('Postularme')}}
                <div 
                    wire:loading wire:target="postularme"
                    class="inline-block h-4 w-4 ml-2 animate-spin rounded-full border-4 border-solid border-current border-r-transparent align-[-0.125em] text-white motion-reduce:animate-[spin_1.5s_linear_infinite]" 
                    role="status"
                ></div>
            </x-primary-button>
        </form>

    @endif

</div>

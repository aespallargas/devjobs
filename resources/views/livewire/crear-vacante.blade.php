<form class="md:w-1/2 space-y-5" wire:submit.prevent='crearVacante'>
    
    <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" /> 
        <x-text-input 
            id="titulo" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="titulo"
            :value="old('titulo')" 
            placeholder="Titulo Vacante" />

        @error('titulo')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" /> 
        <select 
            wire:model="salario" 
            id="salario" 
            class="rounded-md w-full shadow-sm border-gray-300 block text-sm text-grary-500 font-bold mb-2 uppercase">
            <option value="">-- Seleccione --</option>
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
            @endforeach
        </select>
        @error('salario')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="categoria" :value="__('Categoría')" /> 
        <select 
            wire:model="categoria" 
            id="categoria" 
            class="rounded-md w-full shadow-sm border-gray-300 block text-sm text-grary-500 font-bold mb-2 uppercase">
            <option value="">-- Seleccione --</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
            @endforeach
        </select>
        @error('categoria')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="empresa" :value="__('Empresa')" /> 
        <x-text-input 
            id="empresa" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="empresa" 
            :value="old('empresa')" 
            placeholder="Empresa: ej: netfil, uber, shopify" />
        @error('empresa')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="ultimo_dia" :value="__('Último día para postularse')" /> 
        <x-text-input 
            id="ultimo_dia" 
            class="block mt-1 w-full" 
            type="date" 
            wire:model="ultimo_dia" 
            :value="old('ultimo_dia')" />
        @error('ultimo_dia')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="descripcion" :value="__('Descripción Puesto')" /> 
        <textarea 
            wire:model="descripcion" 
            id="descripcion"
            placeholder="Descripción general del puesto, experiencia"
            class="rounded-md h-72 w-full shadow-sm border-gray-300 block text-sm text-grary-500 font-bold mb-2 uppercase">
        </textarea>
        @error('descripcion')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="imagen" :value="__('Imagen')" /> 
        <x-text-input 
            id="imagen" 
            class="block mt-1 w-full" 
            type="file" 
            accept="image/*"
            wire:model="imagen"  />

        <!--
            La variable $imagen la obtenemos del atributo wire:model=image 
        -->
        <div class="my-5 w-80">
            @if ($imagen)
                Imagen:
                <img src="{{ $imagen->temporaryUrl() }}">
            @endif
        </div>

        @error('imagen')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>
    <x-primary-button class="w-full justify-center">
        {{ __('Crear Vacante') }}
    </x-primary-button>

</form>
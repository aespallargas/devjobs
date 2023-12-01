@php
    $classes = "text-sm text-gray-600 hover:text-gray-900 rounded-md font-bold";
    //El parámetro $attributes recoje todos los componentes que le enviemos al componente, ene ste caso desde login.blade
    //le pasamos el href
    //<x-link
    //    :href="route('register')"
    //>
    //Y lo une con las classes que tenemos arriba
@endphp

<a 
    {{ $attributes->merge(['class' => $classes]) }} 
    href="{{ route('password.request') }}"
>
    {{ $slot }}
</a>
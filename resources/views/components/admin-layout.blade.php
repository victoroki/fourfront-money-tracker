@props(['pageTitle' => null])

<x-layouts.admin {{ $attributes }}>
    @if($pageTitle)
        <x-slot name="pageTitle">
            {{ $pageTitle }}
        </x-slot>
    @endif
    
    {{ $slot }}
</x-layouts.admin>
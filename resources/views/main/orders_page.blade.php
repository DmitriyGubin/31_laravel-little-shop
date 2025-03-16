<x-layout>
	<x-slot:title>
		Заказы
	</x-slot>
    @if($auth)
    <x-order/>
    @else
    <section class="authh wrap" id="vue_form"></section>
    @endif
</x-layout>
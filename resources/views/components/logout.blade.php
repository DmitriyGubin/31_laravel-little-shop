@if($auth)
<form class="log_out_form" method="post" action="{{ route('log_out') }}">
	@csrf
     <button class="univ_button">
        Выйти из кабинета
    </button>
</form>
@endif
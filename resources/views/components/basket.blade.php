<section class="make_order wrap">
@if($total != 0)
	<h2 class="title">Список товаров в корзине</h2>
	@foreach ($prods as $item)
	<form class="prod_item" method="post" action="{{ route('delete_from_basket') }}">
		@csrf
		<div class="title_prod">{{ $item['name'] }}</div>
		<div class="quant_price">
			<div class="price"><span>Цена:</span> {{ $item['price'] }}</div>
			&nbsp;&nbsp;
			<div class="price"><span>Кол-во:</span> {{ $item['quant'] }}</div>
			<button type="submit" class="univ_button">
				Удалить
			</button>
		</div>
		<input type="hidden" name="id_prod" value="{{ $item['id'] }}">
	</form>
	 @endforeach
	<form action="{{ route('add_order') }}" class="total_butt" method="post">
		@csrf
		<button type="submit" id="make_order" class="univ_button">
			Оформить заказ
		</button>

		<div class="price total">
			<span>Общая стоимость:</span> {{ $total }}
		</div>
	</form>
@else
   <h2 class="title">Корзина пуста</h2>
   @if(isset($_GET['add_order']) && $_GET['add_order'] == 'yes')
		<div class="succes">
			Заказ успешно создан!
		</div>
   @endif
@endif

</section>
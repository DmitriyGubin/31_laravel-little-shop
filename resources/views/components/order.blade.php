<section class="orders wrap">
@if($price_total != 0)
    <h2 class="title">Заказы</h2>

    @foreach ($orders as $item)
    <form action="{{ route('delete_order') }}" class="prod_item" method="post">
        @csrf
        <div class="title_order">
            Заказ № {{ $item['id'] }} от {{ $item['date'] }}
        </div>

        <div class="name_prods price center">
            <span>Названия товаров в заказе:</span>
            {{ $item['names'] }}
        </div>

        <div class="total price center">
            <span>Общая стоимость всех товаров в заказе:</span>
            {{ $item['price'] }}
        </div>

        <input type="hidden" name="order_id" value="{{ $item['id'] }}">

        <button class="univ_button delete_butt">
            Удалить заказ
        </button>
    </form>
    @endforeach

    <div class="price center">
        <span>Итоговая стоимость всех заказов:</span>
        {{ $price_total }}
    </div>
@else
   <h2 class="title">Заказов пока нет</h2>
@endif
</section>
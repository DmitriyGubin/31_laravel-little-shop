<section class="catalog wrap">
    <h2 class="title">Каталог</h2>
    @foreach ($prods as $item)
    <div class="prod_item">
        <div class="title_prod">{{ $item['name'] }}</div>
        <form action="{{ route('add_to_basket') }}" class="form_box" method="post">
            @csrf
            <div class="price marg"><span>Цена:</span> {{ $item['price'] }}</div>
            <div>
                <input name="quant" class="univ_inp marg" type="text" placeholder="Количество">
                <button type="submit" class="univ_button marg {{ Cookie::get($item['id']) == '' ? null : 'black'; }}">
                @if(Cookie::get($item['id']) == '')
                    Добавить в корзину
                @else
                    В корзине - {{ Cookie::get($item['id']) }} шт.
                @endif
                </button>
            </div>
            <input name="prod_id" type="hidden" value="{{ $item['id'] }}">
            <input name="cur_page" type="hidden" value="{{ $cur_page }}">
        </form>
    </div>
    @endforeach

    {{ $prods->links() }}
</section>
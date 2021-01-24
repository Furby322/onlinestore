{{--<p>@lang('mail.order_created.dear') {{ $name }}</p>--}}

{{--<p>@lang('mail.order_created.your_order') {{ $fullSum }} @lang('mail.order_created.created')</p>--}}

<p>Уважаемый {{ $name }}</p>

<p>Заш заказ на сумму {{ $fullSum }} создан</p>

{{--<table>--}}
{{--    <tbody>--}}
{{--    @foreach($order->skus as $sku)--}}
{{--        <tr>--}}
{{--            <td>--}}
{{--                <a href="{{ route('sku', [$sku->product->category->code, $sku->product->code, $sku]) }}">--}}
{{--                    <img height="56px" src="{{ Storage::url($sku->product->image) }}">--}}
{{--                    {{ $sku->product->__('name') }}--}}
{{--                </a>--}}
{{--            </td>--}}
{{--            <td><span class="badge">{{ $sku->countInOrder }}</span>--}}
{{--                <div class="btn-group form-inline">--}}
{{--                    {!! $sku->product->__('description') !!}--}}
{{--                </div>--}}
{{--            </td>--}}
{{--            <td>{{ $sku->price }} {{ $currencySymbol }}.</td>--}}
{{--            <td>{{ $sku->getPriceForCount() }} {{ $currencySymbol }}.</td>--}}
{{--        </tr>--}}
{{--    @endforeach--}}
{{--    </tbody>--}}
{{--</table>--}}

<table>
    <tbody>
    @foreach($order->products as $product)
        <tr>
            <td>
                <a href="{{ route('product', [$product->category->code, $product->code]) }}">
                    <img height="56px" src="{{ Storage::url($product->image) }}">
                    {{ $product->name }}
                </a>
            </td>
            <td><span class="badge">{{ $product->pivot->count }}</span>
                <div class="btn-group form-inline">
                    {!! $product->description !!}
                </div>
            </td>
            <td>{{ $product->price }} руб.</td>
            <td>{{ $product->getPriceForCount() }} руб.</td>
        </tr>
    @endforeach
    </tbody>
</table>
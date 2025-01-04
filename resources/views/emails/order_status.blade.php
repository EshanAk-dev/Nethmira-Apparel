@component('mail::message')

<p style="text-transform: capitalize;">Dear <b>{{ $order->first_name }}</b>,</p>
<p>Order Status : 
    <strong style="color:
        @if($order->status == 0) #f39c12;
        @elseif($order->status == 1) #3498db;
        @elseif($order->status == 2) #2ecc71;
        @elseif($order->status == 3) #27ae60;
        @elseif($order->status == 4) #e74c3c;
        @endif">
        @if($order->status == 0)
            Pending
        @elseif($order->status == 1)
            In progress
        @elseif($order->status == 2)
            Delivered
        @elseif($order->status == 3)
            Completed
        @elseif($order->status == 4)
            Cancelled
        @endif
    </strong>
</p>


<p><strong>Order Details:</strong></p>
<ul>
    <li>Order Number: {{ $order->order_number }}</li>
    <li>Date of Purches: {{ date('d-m-Y', strtotime( $order->created_at )) }}</li>
</ul>

<p><strong>Items Purchased:</strong></p>
<table style="width: 100%; border-collapse: collapse;">
    <tr>
        <th style="text-align: left; padding: 8px; border-bottom: 1px solid #ddd;">Item</th>
        <th style="text-align: right; padding: 8px; border-bottom: 1px solid #ddd;">Quantity</th>
        <th style="text-align: right; padding: 8px; border-bottom: 1px solid #ddd;">Unit Price</th>
    </tr>
    @foreach($order->getItem as $item)
    <tr>
        <td style="padding: 8px; border-bottom: 1px solid #ddd;">
            {{ $item->getProduct->title }}
            <br>
            Color : {{ $item->color_name }}
            <br>
            Size : {{ $item->size_name }}
        </td>
        <td style="text-align: right; padding: 8px; border-bottom: 1px solid #ddd;">{{ $item->quantity }}</td>
        <td style="text-align: right; padding: 8px; border-bottom: 1px solid #ddd;">Rs.{{ number_format($item->total_price, 2) }}</td>
    </tr>
    @endforeach
</table>

@if(!empty($order->discount_code))
<p style="margin-top: 20px;"><strong>Discount Amount:</strong> Rs.{{ number_format($order->discount_amount, 2) }}</p>
@endif

<p style="margin-top: 20px;"><strong>Delivery Type:</strong> {{ $order->getShipping->name }}</p>

<p style="margin-top: 20px;"><strong>Delivery Amount:</strong> Rs.{{ number_format($order->shipping_amount, 2) }}</p>

<p style="margin-top: 20px;"><strong>Total Amount:</strong> <u>Rs.{{ number_format($order->total_amount, 2) }}</u></p>

<p style="text-transform: capitalize;"><strong>Payment Method:</strong> {{ $order->payment_method }}</p>

<hr style="border: none; border-top: 1px solid #ddd;">

Thanks,<br>
<strong>{{ config('app.name') }}</strong> Team.

@endcomponent
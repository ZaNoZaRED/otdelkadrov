
</html>
<h1>Новая заявка</h1>
<p>Имя: {{ $order['name'] }}</p>
<p>Телефон: {{ $order['phone'] }}</p>
<p>Email: {{ $order['email'] }}</p>
<h2>Заказанные специальности:</h2>
<ul>
@foreach($order['items'] as $item)
    <li>{{ $item['name'] }} - {{ $item['quantity'] }}</li>
@endforeach
</ul>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Ваш Отдел Кадров</title>
    <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(99665810, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/99665810" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</head>
<body>
<div class="container">
    <a href = "/staff"><h3>Назад</h3></a>
    <h3>Корзина</h3>
    @if(session('cart'))
        <table class="table">
            <thead>
                <tr>
                    <th>Специальность</th>
                    <th>Количество</th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('cart') as $id => $details)
                    <tr>
                        <td>{{ $details['name'] }}</td>
                        <td>{{ $details['quantity'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Имя" required>
            </div>
            <div class="form-group">
                <input type="tel" name="phone" class="form-control" placeholder="Телефон" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <button type="submit" class="btn btn-primary">Отправить заявку</button>
        </form>
    @else
        <p>Ваша заявка пуста.</p>
    @endif
</div>
</body>
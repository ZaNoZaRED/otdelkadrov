    
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        
        <title>Document</title>
    </head>
    <body>
        
    
    @auth
    <section class="our_personal">
    <h3>Наш Персонал</h3>
    <div class="specialization-cards">
            @foreach($specializations as $specialization)
                <div class="specialization-card">
                    <div class="card">
                        <img src="{{ $specialization->photo_url }}" alt="{{ $specialization->name }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $specialization->name }}</h5>
                        </div>
                    </div>
                    <div>
                        <button class="btn-send openModalBtn">Оставить заявку</button>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="more">
            <a href="/special" class="more-btn">Показать все специализации</a>
        </div>
    </div>
</section>
    @else
        <h2>Вы должны <a href="/" id="openLoginModalBtn">войти</a> или <a href="/" id="openRegisterModalBtn">зарегистрироваться</a> для доступа к этой странице.</h2>
    @endauth

    </body>
    </html>

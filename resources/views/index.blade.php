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
    <header>
        <nav>
            <ul>
                <li><img src="{{ asset('img/logo.svg') }}" width="400"></li> 
                <li><a href="#">Работа с иностранными специалистами</a></li>
                <li><a href="#">О нас</a></li>
                <li><a href="#">Контакты</a></li>
                <li><button class="fixed-cart-button" onclick="window.location.href='/cart'">Мой заказ</button></li>
            </ul>
        </nav>
    </header>

    <section class="main">
    @if(session('success'))
    <div class='alert'>
        {{ session('success') }}
    </div>
    @endif
    <h1>Оформление сотрудников вне штата</h1>
    <h2>Работаем по всему Татарстану и РФ</h2>
    <h3>Наш рабочий персонал работает ежедневно/без выходных/праздничных дней, по 10-11 часов в день</h3>
    <button class="btn-send" onclick="redirectToCart()">Оставить заявку<img src="{{ asset('img/btn-email.svg') }}"></button>

</section>

<div class="modal" id="modalForm">
    <div class="modal-content">
        <span class="close-btn" id="closeModalBtn">&times;</span>
        <h2>Оставить заявку</h2>
        <form action="/" method="POST" id="applicationForm">
    @csrf
    @if(auth()->check())
        <input type='text' name='name' value='{{ auth()->user()->name }}'>
        <input type='text' name='surname' value='{{ auth()->user()->surname }}'>
        <input type='text' name='patronymic' value='{{ auth()->user()->patronymic }}'>
        <input type='tel' name='phone' value='{{ auth()->user()->phone }}'>
        <input type='email' name='email' value='{{ auth()->user()->email }}'>
    @else
        <input type='text' name='name' placeholder='Имя' required>
        <input type='text' name='surname' placeholder='Фамилия' required>
        <input type='text' name='patronymic' placeholder='Отчество' required>
        <input type='tel' name='phone' placeholder='Телефон' required>
        <input type='email' name='email' placeholder='Почта' required>
    @endif

    <h5>Выбор сотрудников</h5>
    <p> (До 5 спец. в одной заявке)</p>

    <div id="specializationsContainer">

    <div class="specialty-group">
        <select name="specialization[]">
            <option value="" disabled selected>Выберите из списка</option> <!-- По умолчанию -->
            @foreach($specializations as $specialization)
                <option value="{{ $specialization->name }}">{{ $specialization->name }}</option>
            @endforeach
        </select>
        <input type="number" name="quantity[]" placeholder="Количество">
    </div>
</div>
    <div id="specializationsContainer">
    <div class="specialty-group">
        <select name="specialization[]">
            <option value="" disabled selected>Выберите из списка</option> <!-- По умолчанию -->
            @foreach($specializations as $specialization)
                <option value="{{ $specialization->name }}">{{ $specialization->name }}</option>
            @endforeach
        </select>
        <input type="number" name="quantity[]" placeholder="Количество">
    </div>
</div>
    <div id="specializationsContainer">
    <div class="specialty-group">
        <select name="specialization[]">
            <option value="" disabled selected>Выберите из списка</option> <!-- По умолчанию -->
            @foreach($specializations as $specialization)
                <option value="{{ $specialization->name }}">{{ $specialization->name }}</option>
            @endforeach
        </select>
        <input type="number" name="quantity[]" placeholder="Количество">
    </div>
</div>
    <div id="specializationsContainer">
    <div class="specialty-group">
        <select name="specialization[]">
            <option value="" disabled selected>Выберите из списка</option> <!-- По умолчанию -->
            @foreach($specializations as $specialization)
                <option value="{{ $specialization->name }}">{{ $specialization->name }}</option>
            @endforeach
        </select>
        <input type="number" name="quantity[]" placeholder="Количество">
    </div>
</div>
    <div id="specializationsContainer">
    <div class="specialty-group">
        <select name="specialization[]">
            <option value="" disabled selected>Выберите из списка</option> <!-- По умолчанию -->
            @foreach($specializations as $specialization)
                <option value="{{ $specialization->name }}">{{ $specialization->name }}</option>
            @endforeach
        </select>
        <input type="number" name="quantity[]" placeholder="Количество">
    </div>
</div>

    
    
    <p id="maxSpecialtiesError" style="color: red; display: none;">Нельзя добавить больше 5 специальностей.</p>

    <button class="btn-send" type="submit">
        Отправить заявку
        <img src="{{ asset('img/btn-email.svg') }}" alt="Отправить">
    </button>
</form>
    </div>
</div>




<section class="our_personal">
    <h3>Наш Персонал</h3>
    <div class="row">
        @foreach($specializationss as $specialization)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $specialization->photo_url }}" class="card-img-top" alt="{{ $specialization->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $specialization->name }}</h5>
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="specialization_id" value="{{ $specialization->id }}">
                            <button type="submit" class="btn btn-primary">Заказать</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <a href="/staff" class="moree">Смотреть все</a>

</section>


<section class="steps">
    <h4>Шаги наших клиентов</h4>
    <div class="step-1">
        <img src="{{ asset('img/step-1.svg') }}">
        <div class="step-text-1">
            <h5>Обращение в нашу организацию</h5>
            <p>Заполните форму или свяжитесь с нами напрямую 8 888 888-88-88</p>
        </div>
    </div>
    <div class="step-2">
        <img src="{{ asset('img/step-2.svg') }}">
        <div class="step-text-2">
            <h5>Консультация с нами</h5>
            <p>Выбирайте время и получайте ответы на интересующие вас вопросы  </p>
        </div>
    </div>
    <div class="step-3">
        <img src="{{ asset('img/step-3.svg') }}">
        <div class="step-text-3">
            <h5>Заключение договора</h5>
            <p>Подготовка всех необходимых документов</p>
        </div>
    </div>
    <div class="step-4">
        <img src="{{ asset('img/step-4.svg') }}">
        <div class="step-text-4">
            <h5>Уменьшение нагрузки Вашей компании  </h5>
            <p>Возьмем на себя кадровый вопрос </p>
        </div>
    </div>
    <div class="step-5">
        <img src="{{ asset('img/step-5.svg') }}">
        <div class="step-text-5">
            <h5>Сокращение затрат</h5>
            <p>Экономия более 80 тыс. руб. в год за одного человека</p>
        </div>
        <button class="btn-send openModalBtn">Оставить заявку<img src="{{ asset('img/btn-email.svg') }}"></button>
    </div>
</section>
<section class = "about">
    <h4>Ваш Отдел Кадров – это для вас, если Вы хотите</h4>
    <ul>
        <li><img src="{{ asset('img/checkbox.svg') }}"> <p>Сэкономить время и деньги</p></li>
        <li><img src="{{ asset('img/checkbox.svg') }}"> <p>Нанять сотрудников на временные должности</p></li>
        <li><img src="{{ asset('img/checkbox.svg') }}"> <p>Быстро найти специалиста с редкими навыками</p></li>
    </ul>
</section>
<section class = "why-we">
    <h4>Почему именно мы?</h4>
    <ul>
    <li><img src="{{ asset('img/why-we3.svg') }}"> <p>Более 1000 сотрудников выведено за штат</p></li>
    <li><img src="{{ asset('img/why-we2.svg') }}"> <p>Более 500 договоров аутстаффинга</p></li>
    <li><img src="{{ asset('img/why-we1.svg') }}"> <p>Работаем более 3 лет</p></li>
    </ul>
</section>
<section class="callback">
    <h4>Закажите обратный звонок для консультации</h4>
        <form id="callbackForm" action ='/c' method='POST'>
            @csrf
            <div class="form-input" >
                <input type="text" name="callname" placeholder="Имя" required>
                <input type="text" name="callsurname" placeholder="Фамилия" required>
                <input type="tel" name="callphone" placeholder="Телефон" required>
            </div>
            <div class="form-info">
                <p>Мы индивидуально рассчитаем для Вас оптимальный план по оптимизации рассходов на кадры</p>
                <button type="submit">
                    Заказать обратный звонок
                    <img src="{{ asset('img/btn-email.svg') }}" alt="Отправить">
                </button>
            </div>
        </form>
</section>

<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
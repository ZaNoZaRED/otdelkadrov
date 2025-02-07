<div>
    <h2>Новая заявка на персонал</h2>

    <p>Имя: {{ $data['name'] }}</p>
    <p>Фамилия: {{ $data['surname'] }}</p>
    <p>Отчество: {{ $data['patronymic'] }}</p>
    <p>Телефон: {{ $data['phone'] }}</p>
    <p>Email: {{ $data['email'] }}</p>

    <h3>Выбранные специальности:</h3>
    <ul>
        @foreach($data['specializations'] as $index => $specialization)
            <li>{{ $specialization }} - {{ $data['quantities'][$index] }} чел.</li>
        @endforeach
    </ul>
</div>
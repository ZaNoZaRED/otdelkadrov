<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specialization;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $specializations = [

            [
                'name' => 'Подсобный рабочий',
                'photo_url' => 'https://avatars.mds.yandex.net/get-altay/9724410/2a000001892f47a56ccbff5c0e539c72871a/orig',
            ],
            [
                'name' => 'Бетонщик',
                'photo_url' => 'https://education-chance.by/uploads/product/106262600/106262677/betonschik.jpg',
            ],
            [
                'name' => 'Арматурщик',
                'photo_url' => 'https://uchiprof.ru/wp-content/uploads/4-1024x576-1.png',
            ],
            [
                'name' => 'Машинист экскаватора',
                'photo_url' => 'https://sib-univer.ru/wp-content/uploads/2023/09/excavator.jpeg',
            ],
            [
                'name' => 'Машинист автогрейдера',
                'photo_url' => 'https://avatars.mds.yandex.net/get-ydo/4397410/2a00000185ddf08e8e38deab09101a42663b/diploma',
            ],
            [
                'name' => 'Машинист бульдозера',
                'photo_url' => 'https://rk.karelia.ru/wp-content/uploads/2020/09/nkcg4leq7tc84s48cg4.jpg',
            ],
            [
                'name' => 'Машинист катка на пневматических шинах',
                'photo_url' => 'https://specavto.ru/upload/iblock/44e/44ea3da26ac31589f44753b3f5d0a5aa.jpg',
            ],
            [
                'name' => 'Машинист катка с гладкими вальцами',
                'photo_url' => 'https://scpk.pro/media/img/courses/каток_С.jpg',
            ],
            [
                'name' => 'Каменщик',
                'photo_url' => 'https://media.makler.md/production/an/original/000/051/500/000051500127.jpg',
            ],
            [
                'name' => 'Плотник',
                'photo_url' => 'https://dom-k.by/images/editor/76a950438f7b80e179f639c0475b5ebc.jpg',
            ],
            [
                'name' => 'Электрик',
                'photo_url' => 'https://www.johnacademy.co.uk/wp-content/uploads/2022/01/Electrical-Technician-1.jpg',
            ],
            [
                'name' => 'Сварщик',
                'photo_url' => 'https://cdnstatic.rg.ru/uploads/images/219/27/37/iStock-1185871218.jpg',
            ],
            [
                'name' => 'Водитель погрузчика',
                'photo_url' => 'https://profit-staff.su/wp-content/uploads/2023/12/voditel.jpg',
            ],
            [
                'name' => 'Машинист фрезы',
                'photo_url' => 'https://avatars.mds.yandex.net/get-ydo/4397410/2a0000018a8dd4c5691ae54911e58bfa91d6/diploma',
            ],
            [
                'name' => 'Тракторист',
                'photo_url' => 'https://i.siteapi.org/5bu5GCBR52IrShrdHwlok9U909M=/0x0:1200x864/s2.siteapi.org/0995d1eb19b84f6/img/48sfjz5iz5ics0cgw8go4wk08cwkog',
            ],
            [
                'name' => 'Машинист компрессорных установок',
                'photo_url' => 'https://i.vuzopedia.ru/storage/app/uploads/public/630/df7/18c/630df718c21f2719269980.jpg',
            ],
            [
                'name' => 'Дорожный рабочий',
                'photo_url' => 'https://avatars.mds.yandex.net/i?id=c6412a7f2d984ace473bce545cfaaba70ef0ab43-4251345-images-thumbs&n=13',
            ],
        ];

        foreach ($specializations as $specialization) {
            Specialization::create([
                'name' => $specialization['name'],
                'photo_url' => $specialization['photo_url'],
            ]);
    }
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Adana'],
            ['name' => 'Adıyaman'],
            ['name' => 'Afyonkarahisar'],
            ['name' => 'Ağrı'],
            ['name' => 'Aksaray'],
            ['name' => 'Amasya'],
            ['name' => 'Ankara'],
            ['name' => 'Antalya'],
            ['name' => 'Ardahan'],
            ['name' => 'Artvin'],
            ['name' => 'Aydın'],
            ['name' => 'Balıkesir'],
            ['name' => 'Bartın'],
            ['name' => 'Batman'],
            ['name' => 'Bayburt'],
            ['name' => 'Bilecik'],
            ['name' => 'Bingöl'],
            ['name' => 'Bitlis'],
            ['name' => 'Bolu'],
            ['name' => 'Burdur'],
            ['name' => 'Bursa'],
            ['name' => 'Çanakkale'],
            ['name' => 'Çankırı'],
            ['name' => 'Çorum'],
            ['name' => 'Denizli'],
            ['name' => 'Diyarbakır'],
            ['name' => 'Düzce'],
            ['name' => 'Edirne'],
            ['name' => 'Elazığ'],
            ['name' => 'Erzincan'],
            ['name' => 'Erzurum'],
            ['name' => 'Eskişehir'],
            ['name' => 'Gaziantep'],
            ['name' => 'Giresun'],
            ['name' => 'Gümüşhane'],
            ['name' => 'Hakkari'],
            ['name' => 'Hatay'],
            ['name' => 'Iğdır'],
            ['name' => 'Isparta'],
            ['name' => 'İstanbul'],
            ['name' => 'İzmir'],
            ['name' => 'Kahramanmaraş'],
            ['name' => 'Karabük'],
            ['name' => 'Karaman'],
            ['name' => 'Kars'],
            ['name' => 'Kastamonu'],
            ['name' => 'Kayseri'],
            ['name' => 'Kırıkkale'],
            ['name' => 'Kırklareli'],
            ['name' => 'Kırşehir'],
            ['name' => 'Kilis'],
            ['name' => 'Kocaeli'],
            ['name' => 'Konya'],
            ['name' => 'Kütahya'],
            ['name' => 'Malatya'],
            ['name' => 'Manisa'],
            ['name' => 'Mardin'],
            ['name' => 'Mersin'],
            ['name' => 'Muğla'],
            ['name' => 'Muş'],
            ['name' => 'Nevşehir'],
            ['name' => 'Niğde'],
            ['name' => 'Ordu'],
            ['name' => 'Osmaniye'],
            ['name' => 'Rize'],
            ['name' => 'Sakarya'],
            ['name' => 'Samsun'],
            ['name' => 'Siirt'],
            ['name' => 'Sinop'],
            ['name' => 'Sivas'],
            ['name' => 'Şanlıurfa'],
            ['name' => 'Şırnak'],
            ['name' => 'Tekirdağ'],
            ['name' => 'Tokat'],
            ['name' => 'Trabzon'],
            ['name' => 'Tunceli'],
            ['name' => 'Uşak'],
            ['name' => 'Van'],
            ['name' => 'Yalova'],
            ['name' => 'Yozgat'],
            ['name' => 'Zonguldak']
        ];

        City::insert($data);
    }
}

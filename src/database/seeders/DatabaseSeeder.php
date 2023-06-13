<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plastic;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Plastic::create([
            'jenis_plastik' => 'PET',
            'masa_pakai' => 'Berulang kali (umumnya), tetapi juga digunakan sekali pakai.',
            'tingkat_bahaya' => 'Aman',
            'detail_jenis_plastik' => 'PET atau PETE (Polyethylene Terephthalate) biasanya digunakan untuk botol air minum, botol minuman bersoda, dan wadah makanan. Kode ini mengindikasikan bahwa plastik tersebut dapat didaur ulang dan digunakan kembali.',
            'detail_masa_pakai' => 'PET atau PETE dirancang untuk penggunaan berulang kali, seperti botol minuman yang bisa diisi ulang. Namun, dalam praktiknya, banyak produk PET atau PETE digunakan sekali pakai. Masa pakai bergantung pada kondisi penggunaan dan perawatan yang dilakukan.',
            'detail_tingkat_bahaya' => 'PET atau PETE digunakan secara luas dalam botol minuman, kemasan makanan, dan serat tekstil. Plastik ini umumnya dianggap aman karena tidak mengandung bahan berbahaya dan memiliki tingkat daur ulang yang baik.'
        ]);

        Plastic::create([
            'jenis_plastik' => 'HDPE',
            'masa_pakai' => 'Berulang kali',
            'tingkat_bahaya' => 'Aman',
            'detail_jenis_plastik' => 'HDPE (High-Density Polyethylene) biasanya digunakan untuk botol susu, botol sampo, pipa air, dan wadah makanan. HDPE juga dapat didaur ulang.',
            'detail_masa_pakai' => 'HDPE memiliki kekuatan dan ketahanan yang baik, membuatnya cocok untuk digunakan berulang kali. Botol susu, botol sampo, dan pipa air sering terbuat dari HDPE. Masa pakai tergantung pada kondisi penggunaan, perawatan, dan paparan lingkungan.',
            'detail_tingkat_bahaya' => 'HDPE digunakan dalam botol susu, botol sampo, kemasan deterjen, dan pipa air. Plastik ini aman karena tidak mengandung bahan berbahaya dan memiliki sifat yang tahan terhadap bahan kimia.'
        ]);

        Plastic::create([
            'jenis_plastik' => 'PVC',
            'masa_pakai' => 'Berulang kali (terbatas) dan sekali pakai',
            'tingkat_bahaya' => 'Berpotensi berbahaya',
            'detail_jenis_plastik' => 'PVC (Polyvinyl Chloride) biasanya digunakan untuk pipa, tirai shower, botol obat, dan mainan anak-anak. PVC memiliki risiko kesehatan dan lingkungan yang lebih tinggi dan biasanya sulit didaur ulang.',
            'detail_masa_pakai' => 'PVC biasanya digunakan dalam produk berulang kali seperti pipa dan fitting. Namun, dalam bentuk kemasan sekali pakai, seperti blister pack atau kemasan makanan, PVC digunakan hanya sekali.',
            'detail_tingkat_bahaya' => 'PVC digunakan dalam pipa air, kabel listrik, kemasan makanan, dan barang-barang plastik lainnya. Plastik ini mengandung bahan aditif berbahaya seperti phthalate dan dioxin yang dapat berdampak negatif pada kesehatan manusia dan lingkungan. Penggunaan PVC dalam makanan dan minuman harus dihindari.'
        ]);

        Plastic::create([
            'jenis_plastik' => 'LDPE',
            'masa_pakai' => 'Berulang kali (terbatas) dan sekali pakai',
            'tingkat_bahaya' => 'Aman',
            'detail_jenis_plastik' => 'LDPE (Low-Density Polyethylene) biasanya digunakan untuk kantong belanja, film pelindung, dan wadah makanan. LDPE dapat didaur ulang.',
            'detail_masa_pakai' => 'LDPE digunakan dalam berbagai produk, termasuk kantong plastik, kantong belanja, dan kemasan makanan. Masa pakai bergantung pada penggunaan dan perawatan, tetapi umumnya lebih cocok untuk digunakan sekali pakai.',
            'detail_tingkat_bahaya' => 'LDPE digunakan dalam kemasan plastik, kantong belanja, dan bungkus makanan. Plastik ini umumnya dianggap aman karena tidak mengandung bahan berbahaya dan memiliki tingkat daur ulang yang baik.'
        ]);

        Plastic::create([
            'jenis_plastik' => 'PP',
            'masa_pakai' => 'Berulang kali (terbatas) dan sekali pakai',
            'tingkat_bahaya' => 'Aman',
            'detail_jenis_plastik' => 'PP (Polypropylene) biasanya digunakan untuk botol minuman, wadah makanan, dan mainan anak-anak. PP dapat didaur ulang.',
            'detail_masa_pakai' => 'PP memiliki kekuatan yang baik dan tahan terhadap panas, sehingga sering digunakan dalam wadah makanan, botol, dan peralatan dapur. Beberapa produk PP dirancang untuk digunakan berulang kali, seperti tupperware, tetapi dalam beberapa kasus juga digunakan sekali pakai.',
            'detail_tingkat_bahaya' => 'PP digunakan dalam wadah makanan, botol obat, dan produk-produk rumah tangga. Plastik ini umumnya dianggap aman karena tidak mengandung bahan berbahaya dan memiliki sifat yang tahan terhadap suhu tinggi.'
        ]);

        Plastic::create([
            'jenis_plastik' => 'PS',
            'masa_pakai' => 'Sekali pakai',
            'tingkat_bahaya' => 'Berpotensi berbahaya',
            'detail_jenis_plastik' => 'PS (Polystyrene) biasanya digunakan untuk styrofoam, bungkus makanan, dan kotak berbentuk poligon. PS sulit didaur ulang.',
            'detail_masa_pakai' => 'PS sering digunakan dalam kemasan sekali pakai, seperti wadah makanan polystyrene (foam). Namun, PS juga digunakan dalam bentuk berulang kali, seperti casing CD/DVD.',
            'detail_tingkat_bahaya' => 'PS digunakan dalam styrofoam, wadah makanan, dan gelas sekali pakai. Plastik ini mengandung bahan berbahaya yang dapat bocor ke dalam makanan atau minuman. Penggunaan PS dalam kontak langsung dengan makanan sebaiknya dihindari.'
        ]);

        Plastic::create([
            'jenis_plastik' => 'Other',
            'masa_pakai' => 'Berulang kali',
            'tingkat_bahaya' => 'Berpotensi berbahaya',
            'detail_jenis_plastik' => 'Jenis plastik Other mencakup berbagai jenis plastik seperti polycarbonate (PC), polylactic acid (PLA), dan acrylic (PMMA). Jenis plastik ini seringkali sulit didaur ulang karena merupakan campuran atau jenis plastik yang tidak termasuk dalam kategori lainnya.',
            'detail_masa_pakai' => 'Jenis plastik Other umumnya digunakan dalam produk yang dirancang untuk penggunaan berulang kali, seperti botol minum bertutup kaku, perlengkapan elektronik, dan komponen otomotif. Masa pakai tergantung pada jenis dan kondisi penggunaan.',
            'detail_tingkat_bahaya' => 'Jenis plastik Other mencakup berbagai jenis plastik seperti polycarbonate (PC) yang digunakan dalam botol air dan CD, serta polylactic acid (PLA) yang digunakan dalam kemasan ramah lingkungan. Plastik dalam kategori ini memiliki variasi yang luas dan beberapa jenis dapat mengandung bahan berbahaya seperti bisphenol A (BPA). Perlu memperhatikan petunjuk penggunaan dan sumber informasi yang terpercaya.'
        ]);
    }
}
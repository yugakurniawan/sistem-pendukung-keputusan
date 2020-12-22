<?php

use Illuminate\Database\Seeder;
use App\Model\Warga;
use Faker\Factory as Faker;
class wargaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $status_pernikahan = array('Menikah','Belum Menikah','Cerai Hidup','Cerai Mati');
    protected $pekerjaan = array('PNS','TNI','POLRI','Wirausaha', 'Karyawan', 'Petani', 'Nelayan', 'Pengangguran');
    protected $status_tinggal = array('Rumah Permanen','Kontrakan','Rumah Semi Permanen','Rumah Kayu', 'Rumah Gubuk');
    
     public function run()
    {
        //
        DB::table('warga')->truncate();
        $faker = Faker::create('id_ID');
        $i = 0;
        while ($i <100) {
            # code...
            $nikah = array_rand($this->status_pernikahan);
            $kerja = array_rand($this->pekerjaan);
            $rumah = array_rand($this->status_tinggal);
            Warga::create([
                'nama' => $faker->name,
                'usia' => rand(17,80),
                'status_pernikahan' => $this->status_pernikahan[$nikah],
                'pekerjaan' => $this->pekerjaan[$kerja],
                'pendapatan' => rand(300000,3000000),
                'status_tinggal' => $this->status_tinggal[$rumah],
                'tanggungan' => rand(0,12)
            ]);
            $i++;
        }
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Warga;
use Yajra\Datatables\Datatables;

class analisaTopsis extends Controller
{
    //
    
    public function get_linguistik()
    {
        # code...
        $warga = \App\Model\Warga::all();
        //usia
        foreach ($warga as $key) {
            # code...
            if (($key->usia > 0) and ($key->usia < 20)) {
                # code...
                $key->l_usia = 1;
            }elseif (($key->usia >= 20) and ($key->usia <= 30)) {
                # code...
                $key->l_usia = 2;
            }elseif (($key->usia > 30) and ($key->usia <= 40)) {
                # code...
                $key->l_usia = 3;
            }elseif (($key->usia > 40) and ($key->usia <= 50)) {
                # code...
                $key->l_usia = 4;
            }elseif ($key->usia > 50) {
                # code...
                $key->l_usia = 5;
            }
        }

        //karya tulis ilmiah
        foreach ($warga as $key) {
            # code...
            if (($key->status_pernikahan == "Belum Menikah")) {
                # code...
                $key->l_status_pernikahan = 1;
            }elseif (($key->status_pernikahan == "Menikah")) {
                # code...
                $key->l_status_pernikahan = 2;
            }elseif (($key->status_pernikahan == "Cerai Hidup")) {
                # code...
                $key->l_status_pernikahan = 3;
            }elseif (($key->status_pernikahan == "Cerai Mati")) {
                # code...
                $key->l_status_pernikahan = 4;
            }
        }
        //bahasa asing
        foreach ($warga as $key) {
            # code...
            if (($key->pekerjaan == "PNS")) {
                # code...
                $key->l_pekerjaan = 1;
            }elseif (($key->pekerjaan == "TNI")) {
                # code...
                $key->l_pekerjaan = 1;
            }elseif (($key->pekerjaan == "POLRI")) {
                # code...
                $key->l_pekerjaan = 1;
            }elseif (($key->pekerjaan == "Wirausaha")) {
                # code...
                $key->l_pekerjaan = 2;
            }elseif (($key->pekerjaan == "Karyawan")) {
                # code...
                $key->l_pekerjaan = 3;
            }elseif (($key->pekerjaan == "Petani")) {
                # code...
                $key->l_pekerjaan = 4;
            }elseif (($key->pekerjaan == "Nelayan")) {
                # code...
                $key->l_pekerjaan = 4;
            }elseif (($key->pekerjaan == "Pengangguran")) {
                # code...
                $key->l_pekerjaan = 5;
            }
        }

        //IPK
        foreach ($warga as $key) {
            # code...
            if (($key->pendapatan > 3000000)) {
                # code...
                $key->l_pendapatan = 1;
            }elseif (($key->pendapatan > 2500000) and ($key->pendapatan <= 3000000)) {
                # code...
                $key->l_pendapatan = 2;
            }elseif (($key->pendapatan > 1750000) and ($key->pendapatan <= 2500000)) {
                # code...
                $key->l_pendapatan = 3;
            }elseif (($key->pendapatan >= 750000) and ($key->pendapatan <= 1750000)) {
                # code...
                $key->l_pendapatan = 4;
            }elseif (($key->pendapatan < 750000)) {
                # code...
                $key->l_pendapatan = 5;
            }
        }
        //indeks_sks
        foreach ($warga as $key) {
            # code...
            if (($key->status_tinggal == "Rumah Permanen")) {
                # code...
                $key->l_status_tinggal = 1;
            }elseif (($key->status_tinggal == "Rumah Semi Permanen")) {
                # code...
                $key->l_status_tinggal = 2;
            }elseif (($key->status_tinggal == "Kontrakan")) {
                # code...
                $key->l_status_tinggal = 3;
            }elseif (($key->status_tinggal == "Rumah Kayu")) {
                # code...
                $key->l_status_tinggal = 4;
            }elseif (($key->status_tinggal == "Rumah Gubuk")) {
                # code...
                $key->l_status_tinggal = 5;
            }
        }

        foreach ($warga as $key) {
            # code...
            if ($key->tanggungan == 0) {
                # code...
                $key->l_tanggungan = 1;
            }elseif ($key->tanggungan == 1) {
                # code...
                $key->l_tanggungan = 2;
            }elseif ($key->tanggungan == 2) {
                # code...
                $key->l_tanggungan = 3;
            }elseif ($key->tanggungan == 3) {
                # code...
                $key->l_tanggungan = 4;
            }elseif ($key->tanggungan > 3) {
                # code...
                $key->l_tanggungan = 5;
            }
        }

        return $warga->all();
    }
    public function get_normalized()
    {
        # code...
        $warga = $this->get_linguistik();
        $temp_usia = 0;
        $temp_status_pernikahan = 0;
        $temp_pekerjaan = 0;
        $temp_pendapatan = 0;
        $temp_status_tinggal = 0; 
        $temp_tanggungan = 0; 
        foreach ($warga as $key) {
            # code...
            $temp_usia += $key->l_usia*$key->l_usia;
            $temp_status_pernikahan += $key->l_status_pernikahan*$key->l_status_pernikahan;
            $temp_pekerjaan += $key->l_pekerjaan*$key->l_pekerjaan;
            $temp_pendapatan += $key->l_pendapatan*$key->l_pendapatan;
            $temp_status_tinggal += $key->l_status_tinggal*$key->l_status_tinggal;
            $temp_tanggungan += $key->l_tanggungan*$key->l_tanggungan;
        }
        foreach ($warga as $key) {
            # code...
            $key->r_usia = $key->l_usia/(sqrt($temp_usia));
            $key->r_status_pernikahan = $key->l_status_pernikahan/(sqrt($temp_status_pernikahan));
            $key->r_pekerjaan = $key->l_pekerjaan/(sqrt($temp_pekerjaan));
            $key->r_pendapatan = $key->l_pendapatan/(sqrt($temp_pendapatan));
            $key->r_status_tinggal = $key->l_status_tinggal/(sqrt($temp_status_tinggal));
            $key->r_tanggungan = $key->l_tanggungan/(sqrt($temp_tanggungan));
        }

        // dd($temp_tanggungan);

        return $warga;        
    }

    public function get_terbobot()
    {
        # code...
        $warga = $this->get_normalized();
        $options = \App\Model\Setting::getAllKeyValue();
        $c1 = json_decode($options['c1']);
        $c2 = json_decode($options['c2']);
        $c3 = json_decode($options['c3']);
        $c4 = json_decode($options['c4']);
        $c5 = json_decode($options['c5']);
        $c6 = json_decode($options['c6']);
        foreach ($warga as $key) {
            # code...
            $key->v_usia = $key->r_usia*$c1->weight;
            $key->v_status_pernikahan = $key->r_status_pernikahan*$c2->weight;
            $key->v_pekerjaan = $key->r_pekerjaan*$c3->weight;
            $key->v_pendapatan = $key->r_pendapatan*$c4->weight;
            $key->v_status_tinggal = $key->r_status_tinggal*$c5->weight;
            $key->v_tanggungan = $key->r_tanggungan*$c6->weight;
        }

        return $warga;
    }
    public function get_ideal()
    {
        # code...
        $options = \App\Model\Setting::getAllKeyValue();
        $c1 = json_decode($options['c1']);
        $c2 = json_decode($options['c2']);
        $c3 = json_decode($options['c3']);
        $c4 = json_decode($options['c4']);
        $c5 = json_decode($options['c5']);
        $c6 = json_decode($options['c6']);
        $warga = $this->get_terbobot();
        $temp_usia = [];
        $temp_status_pernikahan = [];
        $temp_pekerjaan = [];
        $temp_pendapatan = [];
        $temp_status_tinggal = [];
        $temp_tanggungan = [];
        foreach ($warga as $key) {
            # code...
            $temp_usia[] = $key->v_usia;
            $temp_status_pernikahan[] = $key->v_status_pernikahan;
            $temp_pekerjaan[] = $key->v_pekerjaan;
            $temp_pendapatan[] = $key->v_pendapatan;
            $temp_status_tinggal[] = $key->v_status_tinggal;
            $temp_tanggungan[] = $key->v_tanggungan;
        }
        
        $solusi = array(
            'c1' => array('positif' => (!$c1->is_cost) ?  max($temp_usia) :  min($temp_usia),'negatif' => ($c1->is_cost) ?  max($temp_usia) :  min($temp_usia)),
            'c2' => array('positif' => (!$c2->is_cost) ?  max($temp_status_pernikahan) :  min($temp_status_pernikahan),'negatif' => ($c2->is_cost) ?  max($temp_status_pernikahan) :  min($temp_status_pernikahan)),
            'c3' => array('positif' => (!$c3->is_cost) ?  max($temp_pekerjaan) :  min($temp_pekerjaan),'negatif' => ($c3->is_cost) ?  max($temp_pekerjaan) :  min($temp_pekerjaan)),
            'c4' => array('positif' => (!$c4->is_cost) ?  max($temp_pendapatan) :  min($temp_pendapatan),'negatif' => ($c4->is_cost) ?  max($temp_pendapatan) :  min($temp_pendapatan)),
            'c5' => array('positif' => (!$c5->is_cost) ?  max($temp_status_tinggal) :  min($temp_status_tinggal),'negatif' => ($c5->is_cost) ?  max($temp_status_tinggal) :  min($temp_status_tinggal)),
            'c6' => array('positif' => (!$c6->is_cost) ?  max($temp_tanggungan) :  min($temp_tanggungan),'negatif' => ($c6->is_cost) ?  max($temp_tanggungan) :  min($temp_tanggungan)),
        );

        return $solusi;
    }
    public function get_positif_distance()
    {
        # code...
        $warga = $this->get_terbobot();
        $solusi_ideal = $this->get_ideal();
        foreach ($warga as $key) {
            # code...
            $key->a_usia = pow(($key->v_usia - $solusi_ideal['c1']['positif']),2);
            $key->a_status_pernikahan = pow(($key->v_status_pernikahan - $solusi_ideal['c2']['positif']),2);
            $key->a_pekerjaan = pow(($key->v_pekerjaan - $solusi_ideal['c3']['positif']),2);
            $key->a_pendapatan = pow(($key->v_pendapatan - $solusi_ideal['c4']['positif']),2);
            $key->a_status_tinggal = pow(($key->v_status_tinggal - $solusi_ideal['c5']['positif']),2);
            $key->a_tanggungan = pow(($key->v_tanggungan - $solusi_ideal['c6']['positif']),2);
            $key->a_total = sqrt($key->a_usia+$key->a_status_pernikahan+$key->a_pekerjaan+$key->a_pendapatan+$key->a_status_tinggal+$key->a_tanggungan);
        }
        return $warga;
    }
    public function get_negatif_distance()
    {
        # code...
        $warga = $this->get_positif_distance();
        $solusi_ideal = $this->get_ideal();
        foreach ($warga as $key) {
            # code...
            $key->b_usia = pow(($key->v_usia - $solusi_ideal['c1']['negatif']),2);
            $key->b_status_pernikahan = pow(($key->v_status_pernikahan - $solusi_ideal['c2']['negatif']),2);
            $key->b_pekerjaan = pow(($key->v_pekerjaan - $solusi_ideal['c3']['negatif']),2);
            $key->b_pendapatan = pow(($key->v_pendapatan - $solusi_ideal['c4']['negatif']),2);
            $key->b_status_tinggal = pow(($key->v_status_tinggal - $solusi_ideal['c5']['negatif']),2);
            $key->b_tanggungan = pow(($key->v_tanggungan - $solusi_ideal['c6']['negatif']),2);
            $key->b_total = sqrt($key->b_usia+$key->b_status_pernikahan+$key->b_pekerjaan+$key->b_pendapatan+$key->b_status_tinggal+$key->b_tanggungan);
        }
        return $warga;
    }
    public function get_nilai_preferensi()
    {
        # code...
        $warga = $this->get_negatif_distance();
        foreach ($warga as $key) {
            # code...
            $key->nilai_preferensi = $key->b_total/($key->a_total + $key->b_total);
        }
        return $warga;
    }
    public function linguistik()
    {
        # code...
        $warga = $this->get_linguistik();
        return Datatables::of($warga)
                ->setRowId(function(Warga $warga){
                    return $warga->id;
                })->editColumn('l_usia',function($warga){
                    if ($warga->l_usia == 1 ) {
                        # code...
                        return "sangat rendah";
                    }elseif ($warga->l_usia == 2) {
                        # code...
                        return "Rendah";
                    }elseif ($warga->l_usia == 3) {
                        # code...
                        return "Sedang";
                    }elseif ($warga->l_usia == 4) {
                        # code...
                        return "Tinggi";
                    }elseif ($warga->l_usia == 5) {
                        # code...
                        return "Sangat Tinggi";
                    }
                })->editColumn('l_status_pernikahan',function($warga){
                    if ($warga->l_status_pernikahan == 1 ) {
                        # code...
                        return "Rendah";
                    }elseif ($warga->l_status_pernikahan == 2) {
                        # code...
                        return "Cukup";
                    }elseif ($warga->l_status_pernikahan == 3) {
                        # code...
                        return "Tinggi";
                    }elseif ($warga->l_status_pernikahan == 4) {
                        # code...
                        return "Sangat Tinggi";
                    }
                })->editColumn('l_pekerjaan',function($warga){
                    if ($warga->l_pekerjaan == 1 ) {
                        # code...
                        return "sangat rendah";
                    }elseif ($warga->l_pekerjaan == 2) {
                        # code...
                        return "Rendah";
                    }elseif ($warga->l_pekerjaan == 3) {
                        # code...
                        return "Sedang";
                    }elseif ($warga->l_pekerjaan == 4) {
                        # code...
                        return "Tinggi";
                    }elseif ($warga->l_pekerjaan == 5) {
                        # code...
                        return "Sangat Tinggi";
                    }
                })->editColumn('l_pendapatan',function($warga){
                    if ($warga->l_pendapatan == 1 ) {
                        # code...
                        return "sangat rendah";
                    }elseif ($warga->l_pendapatan == 2) {
                        # code...
                        return "Rendah";
                    }elseif ($warga->l_pendapatan == 3) {
                        # code...
                        return "Sedang";
                    }elseif ($warga->l_pendapatan == 4) {
                        # code...
                        return "Tinggi";
                    }elseif ($warga->l_pendapatan == 5) {
                        # code...
                        return "Sangat Tinggi";
                    }
                })->editColumn('l_status_tinggal',function($warga){
                    if ($warga->l_status_tinggal == 1 ) {
                        # code...
                        return "sangat rendah";
                    }elseif ($warga->l_status_tinggal == 2) {
                        # code...
                        return "Rendah";
                    }elseif ($warga->l_status_tinggal == 3) {
                        # code...
                        return "Sedang";
                    }elseif ($warga->l_status_tinggal == 4) {
                        # code...
                        return "Tinggi";
                    }elseif ($warga->l_status_tinggal == 5) {
                        # code...
                        return "Sangat Tinggi";
                    }
                })->editColumn('l_tanggungan',function($warga){
                    if ($warga->l_tanggungan == 1 ) {
                        # code...
                        return "sangat rendah";
                    }elseif ($warga->l_tanggungan == 2) {
                        # code...
                        return "Rendah";
                    }elseif ($warga->l_tanggungan == 3) {
                        # code...
                        return "Sedang";
                    }elseif ($warga->l_tanggungan == 4) {
                        # code...
                        return "Tinggi";
                    }elseif ($warga->l_tanggungan == 5) {
                        # code...
                        return "Sangat Tinggi";
                    }
                })
                ->make(true);
         
    }
    public function matrix_keputusan()
    {
        # code...
        $warga = $this->get_linguistik();
        return Datatables::of($warga)
                ->setRowId(function(Warga $warga){
                    return $warga->id;
                })->make(true);

        // dd($warga);
    }
    public function matrix_keputusan_ternormalisasi()
    {
        # code...
        $warga = $this->get_normalized();
        return Datatables::of($warga)
                ->setRowId(function(Warga $warga){
                    return $warga->id;
                })->make(true);

    }
    public function matrix_keputusan_terbobot()
    {
        # code...
        $warga = $this->get_terbobot();
        return Datatables::of($warga)
                ->setRowId(function(Warga $warga){
                    return $warga->id;
                })->make(true);
    }
    
    public function solusi_ideal()
    {
        # code...
        $data['solusi'] = $this->get_ideal();
        return view('admin.topsis.matrix_solusi_ideal',$data);
    }
    public function jarak_solusi_positif()
    {
        # code...
        $warga = $this->get_positif_distance();
        return Datatables::of($warga)
                ->setRowId(function(Warga $warga){
                    return $warga->id;
                })->make(true);
    }
    public function jarak_solusi_negatif()
    {
        # code...
        $warga = $this->get_negatif_distance();
        return Datatables::of($warga)
                ->setRowId(function(Warga $warga){
                    return $warga->id;
                })->make(true);
    }
    public function nilai_preferensi()
    {
        # code...
        $warga = $this->get_nilai_preferensi();
        return Datatables::of($warga)
                ->setRowId(function(Warga $warga){
                    return $warga->id;
                })->make(true);
    }

}

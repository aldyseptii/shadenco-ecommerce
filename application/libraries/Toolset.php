<?php
class Toolset {
    function rupiah($angka){
	
        $hasil_rupiah = "Rp " . number_format($angka);
        return $hasil_rupiah;
    }    

    function tourl($string) {
        $name = strtolower(str_replace(" ","-",$string));
        $name = preg_replace('/[^\w-]/', '', $name);

        return $name;
    }

    function rupiah_short($angka) {
        if($angka < 1000000) {
            $hasil = $angka / 1000;
            $hasil .= " rb";
        } else {
            $hasil = $angka / 1000000;
            $hasil .= " jt";
        }
        
        $hasil = "Rp ".$hasil;

        return $hasil;
    }

    function rating($angka) {
        $span = "";
        for($i=0;$i<5;$i++) {
            $span .= '<span class="fa fa-stack mr-2">';
            $span .= '<i class="fa fa-star-o fa-stack-2x"></i>';
            if($i < $angka) {
                $span .= '<i class="fa fa-star fa-stack-2x"></i>';
            }
            $span .= '</span>';
        }

        return $span;
    }

    function order_status($var) {
        if($var == 1) {
            $status = '<span class="label label-warning">Belum Dibayar</span>';
        } else if($var == 2) {
            $status = '<span class="label label-default">Perlu Acc';
        } else if($var == 3) {
            $status = '<span class="label label-info">Dikemas</span>';
        } else if($var == 4) {
            $status = '<span class="label label-primary">Dikirim</span>';
        } else {
            $status = '<span class="label label-success">Selesai</span>';
        }

        return $status;
    }
}
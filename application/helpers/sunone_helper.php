<?php
if(!function_exists('level_help')){
	function level_help($params){

		if($params == 1){
			$res = 'superadmin';
		}else if($params == 2){
			$res = 'ppic';
		}else if($params == 3){
			$res = 'admin produksi';
		}else if($params == 4){
			$res = 'purchasing';
		}else if($params == 5){
			$res = 'supervisor';
		}else if($params == 6){
			$res = 'admin warehouse';
		}else{
			$res = 'not found';
		}

		return $res;
	}


if (!function_exists('tanggalan')) {

    function tanggalan($tanggal) {
        $getyear = substr($tanggal, 0, 4);
        $getmonth = substr($tanggal, 5, 2);
        $getdate = substr($tanggal, 8, 2);

        switch ($getmonth) {
            case "01":
                $bulan = "Januari";
                break;

            case "02":
                $bulan = "Februari";
                break;

            case "03":
                $bulan = "Maret";
                break;

            case "04":
                $bulan = "April";
                break;

            case "05":
                $bulan = "Mei";
                break;

            case "06":
                $bulan = "Juni";
                break;

            case "07":
                $bulan = "Juli";
                break;

            case "08":
                $bulan = "Agustus";
                break;

            case "09":
                $bulan = "September";
                break;

            case "10":
                $bulan = "Oktober";
                break;

            case "11":
                $bulan = "November";
                break;

            case "12":
                $bulan = "Desember";
                break;

            default:
                $bulan = "Bulan tidak diketahui";
                break;
        }

        $hasil = $getdate . ' ' . $bulan . ' ' . $getyear;

        return $hasil;
    }

}

}
?>

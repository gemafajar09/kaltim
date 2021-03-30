<?php
function bulantahun($tgl)
{
     $nama_bulan = array(
          1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
          "September", "Oktober", "November", "Desember"
     );
     $tahun = substr($tgl, 0, 4);
     $bulan = $nama_bulan[(int)substr($tgl, 5, 2)];
     $text = "";

     $text .= $bulan ." ". $tahun;
     return $text;
}
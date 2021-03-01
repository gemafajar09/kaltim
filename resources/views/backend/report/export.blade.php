<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Mahasiswa.xls");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th rowspan="2" colspan="13" style="font-size:22px">Laporan SIM Polda Kalimantan Timur Tanggal : <?= tanggal_indonesia(date('Y-m-d')) ?> </th>
            </tr>
        </thead>
    </table>
    <table border="2">
        <thead>
            <tr>
                <th rowspan="3">NO</th>
                <th rowspan="3">SATPAS</th>
                <th colspan="16">JENIS GOLONGAN SIM</th>
                <th rowspan="2" colspan="2">JUMLAH PRODUKSI TERMASUK SIM RUSAK</th>
            </tr>
            <tr>
                <th colspan="3">BARU</th>
                <th colspan="8">PERPANJANG</th>
                <th colspan="5">PENINGKATAN</th>
            </tr>
            <tr>
                <th>A</th>
                <th>C</th>
                <th>D</th>

                <th>A</th>
                <th>AU</th>
                <th>C</th>
                <th>D</th>
                <th>B1</th>
                <th>B1U</th>
                <th>B2</th>
                <th>B2U</th>

                <th>AU</th>
                <th>B1</th>
                <th>B1U</th>
                <th>B2</th>
                <th>B2U</th>

                <th>PENERBITAN</th>
                <th>RUSAK</th>
            </tr>
        </thead>
        <tbody>
        
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2" rowspan="3">JUMLAH</th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
                <th>8</th>
                <th>9</th>
                <th>10</th>
                <th>11</th>
                <th>12</th>
                <th>13</th>
                <th>14</th>
                <th>15</th>
                <th>16</th>
                <th>17</th>
                <th>18</th>
            </tr>
            <tr>
                <th colspan="3">1</th>
                <th colspan="8">2</th>
                <th colspan="5">3</th>
                <th colspan="2">&nbsp;</th>
            </tr>
            <tr>
                <th colspan="16">1</th>
                <th colspan="2">&nbsp;</th>
            </tr>
        </tfoot>
    </table>
</body>
</html>
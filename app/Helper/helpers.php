<?php

function formattedDate($date){
    $daftar_bulan = [
        'Jan' => 'Jan',
        'Feb' => 'Feb',
        'Mar' => 'Mar',
        'Apr' => 'Apr',
        'May' => 'Mei',
        'Jun' => 'Jun',
        'Jul' => 'Jul',
        'Aug' => 'Agu',
        'Sep' => 'Sep',
        'Oct' => 'Okt',
        'Nov' => 'Nov',
        'Dec' => 'Des',
    ];

    $date = \Carbon\Carbon::parse($date);
    $bulan = $daftar_bulan[$date->format('M')];
    $tahun = $date->format('Y');
    $time = $date->format('H:i');

    return "{$date->format('j')} {$bulan} {$tahun} {$time}";
}

function customStatus($status){
    if ($status === 'Delivered') {
        return '<span class="badge bg-secondary mb-2">Terkirim</span>';
    } elseif ($status === 'In Process') {
        return '<span class="badge bg-warning mb-2">Diproses</span>';
    } elseif ($status === 'Complete') {
        return '<span class="badge bg-success mb-2">Selesai</span>';
    } elseif ($status === 'Rejected') {
        return '<span class="badge bg-danger mb-2">Ditolak</span>';
    } else {
        return '<span class="badge bg-secondary mb-2">Terkirim</span>';
    }
}
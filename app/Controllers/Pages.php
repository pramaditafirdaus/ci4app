<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Home | Reiza'
        ];

        return view('Pages/home', $data);
    }

    public function about()
    {

        $data = [
            'tittle' => 'About Me | Reiza'
        ];

        return view('Pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'tittle' => 'Contact Us',
            'alamat' => [
                [
                    'tipe' => 'rumah',
                    'alamat' => 'Perum IKIP Tegalgondo Asri',
                    'kota' => 'Malang'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jl. Priangan No.50',
                    'kota' => 'Jogja'
                ]
            ]
        ];
        return view('Pages/contact', $data);
    }
}

<?php

namespace App\Controllers;


use App\Models\DiecastModel;

class Diecast extends BaseController
{
    protected $DiecastModel;
    public function __construct()
    {
        $this->DiecastModel = new DiecastModel();
    }
    public function index()
    {
        //$diecast = $this->DiecastModel->findAll();

        $data = [
            'tittle' => 'Daftar Diecast Mobil',
            'diecast' => $this->DiecastModel->getDiecast()
        ];

        //$KomikModel = new \App\Models\KomikModels();
        //$DiecastModel = new DiecastModel();


        return view('diecast/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'tittle' => 'Detail Diecast',
            'diecast' => $this->DiecastModel->getDiecast($slug)
        ];


        //jika komik tidak ada
        if (empty($data['diecast'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk ' . $slug . ' tidak 
            ditemukan.');
        }
        return view('diecast/detail', $data);
    }

    public function create()
    {

        $data = [
            'tittle' => 'Form Tambah Data Diecast',
            'validation' => \Config\Services::validation()
        ];

        return view('diecast/create', $data);
    }

    public function save()
    {

        //validasi input
        if (!$this->validate([
            'produk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ],

            ]

        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to('/diecast/create')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('produk'), '-', true);
        $this->DiecastModel->save([
            'produk' => $this->request->getVar('produk'),
            'slug' => $slug,
            'nama' => $this->request->getVar('nama'),
            'kategori' => $this->request->getVar('kategori'),
            'sampul' => $this->request->getVar('sampul')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/diecast');
    }

    public function delete($id)
    {
        $this->DiecastModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/diecast');
    }

    public function edit($slug)
    {
        $data = [
            'tittle' => 'Form Edit Data Diecast',
            'validation' => \Config\Services::validation(),
            'diecast' => $this->DiecastModel->getDiecast($slug)
        ];

        return view('diecast/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'produk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ],

            ]

        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to('/diecast/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('produk'), '-', true);
        $this->DiecastModel->save([
            'id' => $id,
            'produk' => $this->request->getVar('produk'),
            'slug' => $slug,
            'nama' => $this->request->getVar('nama'),
            'kategori' => $this->request->getVar('kategori'),
            'sampul' => $this->request->getVar('sampul')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/diecast');
    }
}

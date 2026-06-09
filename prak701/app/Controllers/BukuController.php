<?php

namespace App\Controllers;

use App\Models\BukuModel;

class BukuController extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }

    // READ 
    public function index()
    {
        $data['buku'] = $this->bukuModel->findAll();
        return view('buku/index', $data);
    }

    // CREATE 
    public function create()
    {
        return view('buku/create');
    }

    // STORE 
    public function store()
    {
        $rules = [
            'judul'        => 'required|string',
            'penulis'      => 'required|string',
            'penerbit'     => 'required|string',
            'tahun_terbit' => 'required|numeric|greater_than[1800]|less_than[2024]',
        ];

        $messages = [
            'judul' => [
                'required' => 'Judul harus diisi.',
                'string'   => 'Judul harus berupa teks.',
            ],
            'penulis' => [
                'required' => 'Penulis harus diisi.',
                'string'   => 'Penulis harus berupa teks.',
            ],
            'penerbit' => [
                'required' => 'Penerbit harus diisi.',
                'string'   => 'Penerbit harus berupa teks.',
            ],
            'tahun_terbit' => [
                'required'     => 'Tahun terbit harus diisi.',
                'numeric'      => 'Tahun terbit harus berupa angka.',
                'greater_than' => 'Tahun terbit harus lebih besar dari 1800.',
                'less_than'    => 'Tahun terbit harus lebih kecil dari 2024.',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return view('buku/create', [
                'validation' => $this->validator,
            ]);
        }

        $this->bukuModel->insert([
            'judul'        => $this->request->getPost('judul'),
            'penulis'      => $this->request->getPost('penulis'),
            'penerbit'     => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
        ]);

        session()->setFlashdata('success', 'Buku berhasil ditambahkan!');
        return redirect()->to('/buku');
    }

    // EDIT 
    public function edit($id)
    {
        $data['buku'] = $this->bukuModel->find($id);
        if (!$data['buku']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Buku tidak ditemukan.");
        }
        return view('buku/edit', $data);
    }

    // UPDATE
    public function update($id)
    {
        $this->bukuModel->update($id, [
            'judul'        => $this->request->getPost('judul'),
            'penulis'      => $this->request->getPost('penulis'),
            'penerbit'     => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
        ]);

        session()->setFlashdata('success', 'Buku berhasil diperbarui!');
        return redirect()->to('/buku');
    }

    // DELETE
    public function delete($id)
    {
        $this->bukuModel->delete($id);
        session()->setFlashdata('success', 'Buku berhasil dihapus!');
        return redirect()->to('/buku');
    }
}
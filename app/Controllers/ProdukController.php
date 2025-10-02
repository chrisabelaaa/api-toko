<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\MProduk;
class ProdukController extends ResourceController
{
protected $format = 'json';
public function index()
{
$model = new MProduk();
$produk = $model->findAll();
return $this->respond($produk);
}
// Membuat fungsi create produk
public function create()
{
$data = [
'kode_produk' => $this->request->getVar('kode_produk'),
'nama_produk' => $this->request->getVar('nama_produk'),
'harga' => $this->request->getVar('harga')
];
$model = new MProduk();
$model->insert($data);
$produk = $model->find($model->getInsertID());
return $this->respondCreated($produk);
}
//Membuat fungsi list produk
public function list()
{
$model = new MProduk();
$produk = $model->findAll();
return $this->respond($produk);
}

//Membuat fungsi tampil produk
public function detail($id)
{
$model = new MProduk();
$produk = $model->find($id);
if($produk!=null){
return $this->respond($produk);
}else{
return $this->fail("Data Tidak Ditemukan");
}
}
//Membuat fungsi update produk
public function ubah($id)
{
$data = [
'kode_produk' => $this->request->getVar('kode_produk'),
'nama_produk' => $this->request->getVar('nama_produk'),
'harga' => $this->request->getVar('harga')
];
$model = new MProduk();
$model->update($id, $data);
$produk = $model->find($id);
return $this->respond($produk);
}
//Membuat fungsi delete produk
public function hapus($id)
{
$model = new MProduk();
$produk = $model->delete($id);
return $this->respondDeleted($produk);
}
}
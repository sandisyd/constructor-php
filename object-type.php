<?php

class Produk
{
    public $judul,
        $penulis,
        $penerbit,
        $harga;

    public function __construct($judul, $penulis, $penerbit, $harga)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }
    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }
}


class DetailInfoProduk
{
    public function detail(Produk $produk)
    {
        $str = "{$produk->judul} | {$produk->getLabel()}, (Rp. {$produk->harga})";
        return $str;
    }
}

$produk1 = new Produk("Making Indonesia 4.0", "Ngakan Timur Antara DKK", "Badan Penelitian dan Pengembangan Industri", 200000);
$produk2 = new Produk("Resident Evil", "Capcom", "Capcom", 300000);


echo "Buku : " . $produk1->getLabel();
echo "<hr>";
echo "Game : " . $produk2->getLabel();
echo "<hr>";
// var_dump($produk1);

$infoProduk1 = new DetailInfoProduk();
echo $infoProduk1->detail($produk1);

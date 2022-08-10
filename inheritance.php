<?php
// inheritance
class Produk
{
    public $judul,
        $penulis,
        $penerbit,
        $harga, $jmlHalaman, $waktuMain;

    public function __construct($judul, $penulis, $penerbit, $harga, $jmlHalaman, $waktuMain)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlHalaman = $jmlHalaman;
        $this->waktuMain = $waktuMain;
    }
    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }

    public function getDetailProduk(){
        $str = "{$this->judul}| {$this->getLabel()}, (Rp. {$this->harga})";
        return $str;
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

class Komik extends Produk{
    public function getDetailProduk(){
        $str = "Komik : {$this->judul}| {$this->getLabel()}, (Rp. {$this->harga}) - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}
class Game extends Produk{
    public function getDetailProduk(){
        $str = "Game : {$this->judul}| {$this->getLabel()}, (Rp. {$this->harga}) - {$this->waktuMain} Jam.";
        return $str;
    }
}

$produk1 = new Komik("Making Indonesia 4.0", "Ngakan Timur Antara DKK", "Badan Penelitian dan Pengembangan Industri", 200000, 200, 0);
$produk2 = new Game("Resident Evil", "Capcom", "Capcom", 300000, 0, 50);


echo "Buku : " . $produk1->getLabel();
echo "<hr>";
echo "Game : " . $produk2->getLabel();
echo "<hr>";
// var_dump($produk1);

echo $produk1->getDetailProduk();
echo "<br>";
echo $produk2->getDetailProduk();

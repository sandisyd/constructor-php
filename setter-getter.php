<?php
// inheritance
class Produk
{
    private $judul,
        $penulis,
        $penerbit, $harga;

    protected $diskon;

    public function __construct($judul, $penulis, $penerbit, $harga)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function setJudul($judul){
        return $this->judul = $judul;
    }

    public function getJudul(){
        return $this->judul;
    }
    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }

    public function getDetailProduk()
    {
        $str = "{$this->judul}| {$this->getLabel()}, (Rp. {$this->harga})";
        return $str;
    }
    //get harga using private
    public function getHarga()
    {
        return $this->harga - ($this->harga * $this->diskon /100);
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

class Komik extends Produk
{
    public $jmlHalaman;

    public function __construct($judul, $penulis, $penerbit, $harga, $jmlHalaman)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);

        $this->jmlHalaman = $jmlHalaman;
    }
    public function getDetailProduk()
    {
        $str = "Komik : " . parent::getDetailProduk() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}
class Game extends Produk
{
    public $waktuMain;

    public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);

        $this->waktuMain = $waktuMain;
    }


    //set diskon using protected
    public function setDiskon($diskon){
        return $this->diskon = $diskon;
    }


    public function getDetailProduk()
    {
        $str = "Game : " . parent::getDetailProduk() . " - {$this->waktuMain} Jam.";
        return $str;
    }
}

$produk1 = new Komik("Making Indonesia 4.0", "Ngakan Timur Antara DKK", "Badan Penelitian dan Pengembangan Industri", 200000, 200);
$produk2 = new Game("Resident Evil", "Capcom", "Capcom", 300000, 50);


echo "Buku : " . $produk1->getLabel();
echo "<hr>";
echo "Game : " . $produk2->getLabel();
echo "<hr>";
// var_dump($produk1);

echo $produk1->getDetailProduk();
echo "<br>";
echo $produk2->getDetailProduk();
echo "<hr>";
$produk2->setDiskon(50);
echo $produk2->getHarga();
$produk2->setJudul("Devil My Cry");
echo "<hr>";
echo $produk2->getJudul();

<?php
    // membuat class Studio
    class Studio
    {
        // deklarasi private attribut
        private string $kode;
        private string $lokasi;
        private string $jaringan;
        private int $kapasitas;

        // constructor
        public function __construct(string $kode, string $lokasi, string $jaringan, int $kapasitas)
        {
            $this->kode = $kode;
            $this->lokasi = $lokasi;
            $this->jaringan = $jaringan;
            $this->kapasitas = max($kapasitas, 5);
        }

        // setter method
        public function setKode(string $kode)
        {
            $this->kode = $kode;
        }
        public function setLokasi(string $lokasi)
        {
            $this->lokasi = $lokasi;
        }
        public function setJaringan(string $jaringan)
        {
            $this->jaringan = $jaringan;
        }
        public function setKapasitas(int $kapasitas)
        {
            $this->kapasitas = max($kapasitas, 5);
        }
        
        // getter method
        public function getKode()
        {
            return $this->kode;
        }
        public function getLokasi()
        {
            return $this->lokasi;
        }
        public function getJaringan()
        {
            return $this->jaringan;
        }
        public function getKapasitas()
        {
            return $this->kapasitas;
        }
    }
?>
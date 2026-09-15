<?php
    class Bioskop
    {
        private $kode;
        private $lokasi;
        private $jaringan;
        private $kapasitas;

        public function __construct($kode, $lokasi, $jaringan, $kapasitas)
        {
            $this->kode = $kode;
            $this->lokasi = $lokasi;
            $this->jaringan = $jaringan;
            $this->kapasitas = max($kapasitas, 5);
        }

        public function setKode($kode)
        {
            $this->kode = $kode;
        }
        public function setLokasi($lokasi)
        {
            $this->lokasi = $lokasi;
        }
        public function setJaringan($jaringan)
        {
            $this->jaringan = $jaringan;
        }
        public function setKapasitas($kapasitas)
        {
            $this->kapasitas = max($kapasitas, 5);
        }
        
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
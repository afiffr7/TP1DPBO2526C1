package java;

class Bioskop
{
    private String kode;
    private String lokasi;
    private String jaringan;
    private int kapasitas;

    public Bioskop(String kode, String lokasi, String jaringan, int kapasitas)
    {
        this.kode = kode;
        this.lokasi = lokasi;
        this.jaringan = jaringan;
        this.kapasitas = kapasitas;
    }

    public String getKode()
    {
        return kode;
    }
    public String getLokasi()
    {
        return lokasi;
    }
    public String getJaringan()
    {
        return jaringan;
    }
    public int getKapasitas()
    {
        return kapasitas;
    }

    public void setKode(String kode)
    {
        this.kode = kode;
    }
    public void setLokasi(String lokasi)
    {
        this.lokasi = lokasi;
    }
    public void setJaringan(String jaringan)
    {
        this.jaringan = jaringan;
    }
    public void setKapasitas(int kapasitas)
    {
        this.kapasitas = kapasitas;
    }
}
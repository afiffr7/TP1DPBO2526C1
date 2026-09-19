package Java;

import java.lang.Math;

public class Studio
{
    // deklarasi attribut private
    private String kode;
    private String lokasi;
    private String jaringan;
    private int kapasitas;

    // constructor
    public Studio(String kode, String lokasi, String jaringan, int kapasitas)
    {
        this.kode = kode;
        this.lokasi = lokasi;
        this.jaringan = jaringan;
        this.kapasitas = Math.max(kapasitas,5);
    }

    // getter method
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

    // setter method
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
        this.kapasitas = Math.max(kapasitas,5);
    }
}
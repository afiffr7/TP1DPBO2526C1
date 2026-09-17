#include<bits/stdc++.h>
using namespace std;

class Studio
{
    // mendefinisikan private atribut
    private:
    string kode;
    string lokasi;
    string jaringan;
    int kapasitas;

    // mendefinisikan public constructor, method, dan destructor
    public:
    Studio(){}; // constructor kosong

    // constructor dengan parameter
    Studio(string kode, string lokasi, string jaringan, int kapasitas)
    {
        this->kode = kode;
        this->lokasi = lokasi;
        this->jaringan = jaringan;
        this->kapasitas = max(kapasitas,5);
    };

    // setter method
    void setKode(string kode)
    {
        this->kode = kode;
    }
    void setLokasi(string lokasi)
    {
        this->lokasi = lokasi;
    }
    void setJaringan(string jaringan)
    {
        this->jaringan = jaringan;
    }
    void setKapasitas(int kapasitas)
    {
        this->kapasitas = max(kapasitas,5);
    }

    // getter method
    string getKode()
    {
        return kode;
    }
    string getLokasi()
    {
        return lokasi;
    }
    string getJaringan()
    {
        return jaringan;
    }
    int getKapasitas()
    {
        return kapasitas;
    }

    // other method

    // destructor
    ~Studio(){};
};
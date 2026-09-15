#include"bioskop.cpp"

int main()
{
    list<Bioskop*> dataBioskop;
    int menu = 0;
    do
    {
        if(menu == 1)
        {
            string kode, lokasi, jaringan;
            int kapasitas;
            cout<<"masukkan kode (string), lokasi (string), jaringan (string), dan kapasitas (int) bioskop\nkode: ";
            cin>>kode;
            cout<<"lokasi: ";
            cin>>lokasi;
            cout<<"jaringan: ";
            cin>>jaringan;
            cout<<"kapasitas: ";
            cin>>kapasitas;

            Bioskop* bioskopBaru = new Bioskop(kode, lokasi, jaringan, kapasitas);
            dataBioskop.push_back(bioskopBaru);
        }
        else if(menu == 2)
        {
            string kode, lokasi, jaringan;
            int kapasitas;
            cout<<"masukkan kode bioskop yang ingin diedit: ";
            cin>>kode;
            cout<<"lokasi: ";
            cin>>lokasi;
            cout<<"jaringan: ";
            cin>>jaringan;
            cout<<"kapasitas: ";
            cin>>kapasitas;

            bool flag = false;
            for(auto it = dataBioskop.begin(); it != dataBioskop.end() && !flag; ++it)
            {
                if((*it)->getKode() == kode)
                {
                    (*it)->setLokasi(lokasi);
                    (*it)->setJaringan(jaringan);
                    (*it)->setKapasitas(kapasitas);
                    flag = true;
                }
            }
        }
        else if(menu == 3)
        {
            string kode;
            cout<<"masukkan kode bioskop yang ingin dihapus: ";
            cin>>kode;

            bool flag = false;
            for(auto it = dataBioskop.begin(); it != dataBioskop.end() && !flag; ++it)
            {
                if((*it)->getKode() == kode)
                {
                    dataBioskop.erase(it);
                    flag = true;
                }
            }
        }

        int nomor = 1;
        for(Bioskop* it : dataBioskop)
        {
            cout<<endl<<nomor<<". "<<it->getKode()<<" | "<<it->getLokasi()<<" | "<<it->getJaringan()<<" | "<<it->getKapasitas();
            nomor++;
        }
        cout<<"\npilih menu:\n1. Tambahkan data\n2. Edit data\n3. Hapus data\n";
    }
    while(cin>>menu);

    return 0;
}
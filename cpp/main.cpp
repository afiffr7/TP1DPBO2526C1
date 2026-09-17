#include"bioskop.cpp"

int main()
{
    list<Studio*> dataStudio;
    int menu = 0;
    do
    {
        if(menu == 1)
        {
            int nomor = 1;
            for(Studio* it : dataStudio)
            {
                cout<<endl<<nomor<<". "<<it->getKode()<<" | "<<it->getLokasi()<<" | "<<it->getJaringan()<<" | "<<it->getKapasitas();
                nomor++;
            }
        }
        else if(menu == 2)
        {
            string kode, lokasi, jaringan;
            int kapasitas;
            cout<<"masukkan kode (string), lokasi (string), jaringan (string), dan kapasitas (int) Studio\nkode: ";
            cin>>kode;
            cout<<"lokasi: ";
            cin>>lokasi;
            cout<<"jaringan: ";
            cin>>jaringan;
            cout<<"kapasitas: ";
            cin>>kapasitas;

            Studio* StudioBaru = new Studio(kode, lokasi, jaringan, kapasitas);
            dataStudio.push_back(StudioBaru);
        }
        else if(menu == 4)
        {
            string kode, lokasi, jaringan;
            int kapasitas;
            cout<<"masukkan kode Studio yang ingin diedit: ";
            cin>>kode;
            cout<<"lokasi: ";
            cin>>lokasi;
            cout<<"jaringan: ";
            cin>>jaringan;
            cout<<"kapasitas: ";
            cin>>kapasitas;

            bool flag = false;
            for(auto it = dataStudio.begin(); it != dataStudio.end() && !flag; ++it)
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
        else if(menu == 5)
        {
            string kode;
            cout<<"masukkan kode Studio yang ingin dihapus: ";
            cin>>kode;

            bool flag = false;
            for(auto it = dataStudio.begin(); it != dataStudio.end() && !flag; ++it)
            {
                if((*it)->getKode() == kode)
                {
                    dataStudio.erase(it);
                    flag = true;
                }
            }
        }

        cout<<"\npilih menu:\n1. Tampilkan data\n2. Tambahkan data\n3. Cari data\n4. Edit data\n5. Hapus data\n";
    }
    while(cin>>menu);

    return 0;
}
#include"bioskop.cpp"

int main()
{
    list<Studio*> listStudio; // deklarasi list of object
    char makeChanges = 'Y'; // variabel penampung decision
    while(makeChanges != 'N')
    {
        int menu = 0; // variabel pilihan menu
        cout<<"\npilih menu:\n1. Tampilkan data\n2. Tambahkan data\n3. Cari data\n4. Edit data\n5. Hapus data\n";
        cout<<"masukkan menu: ";
        cin>>menu;

        if(menu == 1)
        {
            if(listStudio.empty())
            {
                cout<<"List studio kosong!\n";
            }
            else
            {
                cout<<"List data studio:\n";
                int nomor = 1;
                for(Studio* stud : listStudio)
                {
                    cout<<nomor<<". "<<stud->getKode()<<" | "<<stud->getLokasi()<<" | "<<stud->getJaringan()<<" | "<<stud->getKapasitas()<<endl;
                    nomor++;
                }
            }
            
        }
        else if(menu == 2)
        {
            string kode, lokasi, jaringan;
            int kapasitas;
            cout<<"masukkan kode (string), lokasi (string), jaringan (string), dan kapasitas (int) Studio\n";

            bool found = true;
            while(found)
            {
                found = false;
                cout<<"kode: ";
                cin>>kode;
                for(Studio* stud : listStudio)
                {
                    if(stud->getKode() == kode)
                    {
                        found = true;
                    }
                }
                if(found)
                {
                    cout<<"kode sudah digunakan!"<<endl;
                }
            }

            cout<<"lokasi: ";
            cin>>lokasi;
            cout<<"jaringan: ";
            cin>>jaringan;
            cout<<"kapasitas: ";
            cin>>kapasitas;

            Studio* studioBaru = new Studio(kode, lokasi, jaringan, kapasitas);
            listStudio.push_back(studioBaru);
            studioBaru = NULL;
            cout<<"data berhasil ditambahkan!\n";
        }
        else if(menu == 3)
        {
            bool found = false;
            string kode;
            cout<<"masukkan kode target: ";
            cin>>kode;
            for(auto it = listStudio.begin(); it != listStudio.end() && !found; ++it)
            {
                if((*it)->getKode() == kode)
                {
                    found = true;
                    cout<<"data ditemukan!\n";
                    cout<<(*it)->getKode()<<" | "<<(*it)->getLokasi()<<" | "<<(*it)->getJaringan()<<" | "<<(*it)->getKapasitas()<<endl;
                }
            }
            if(!found)
            {
                cout<<"data tidak ada!\n";
            }
        }
        else if(menu == 4)
        {
            string kode, lokasi, jaringan;
            int kapasitas;
            cout<<"masukkan kode Studio yang ingin diedit: ";
            cin>>kode;

            bool found = false;
            for(auto it = listStudio.begin(); it != listStudio.end() && !found; ++it)
            {
                if((*it)->getKode() == kode)
                {
                    cout<<"lokasi baru: ";
                    cin>>lokasi;
                    cout<<"jaringan baru: ";
                    cin>>jaringan;
                    cout<<"kapasitas baru: ";
                    cin>>kapasitas;

                    (*it)->setLokasi(lokasi);
                    (*it)->setJaringan(jaringan);
                    (*it)->setKapasitas(kapasitas);
                    found = true;

                    cout<<"data berhasil diubah!\n";
                }
            }
            if(!found)
            {
                cout<<"data tidak ada!\n";
            }
        }
        else if(menu == 5)
        {
            string kode;
            cout<<"masukkan kode Studio yang ingin dihapus: ";
            cin>>kode;

            bool found = false;
            for(auto it = listStudio.begin(); it != listStudio.end() && !found; ++it)
            {
                if((*it)->getKode() == kode)
                {
                    listStudio.erase(it);
                    found = true;
                    cout<<"data berhasil dihapus!\n";
                }
            }
            if(!found)
            {
                cout<<"data tidak ada!\n";
            }
        }
        else
        {
            printf("menu %d tidak ada!\n", menu);
        }
        cout<<"Apakah ingin melakukan perubahan? (Y/N): ";
        cin>>makeChanges;
    }

    cout<<"Program selesai. Data dihapus.";
    return 0;
}
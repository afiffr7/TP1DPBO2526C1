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
        cin>>menu; // input menu

        if(menu == 1) // Menampilkan data
        {
            if(listStudio.empty()) // jika list kosong
            {
                cout<<"List studio kosong!\n";
            }
            else
            {
                cout<<"List data studio:\n";
                int nomor = 1; // variabel untuk penomoran index
                for(Studio* stud : listStudio) // menampilkan data dengan foreach
                {
                    cout<<nomor<<". "<<stud->getKode()<<" | "<<stud->getLokasi()<<" | "<<stud->getJaringan()<<" | "<<stud->getKapasitas()<<endl;
                    nomor++;
                }
            }
            
        }
        else if(menu == 2) // menambah data
        {
            // deklarasi nilai attribut
            string kode, lokasi, jaringan;
            int kapasitas;
            cout<<"masukkan kode (string), lokasi (string), jaringan (string), dan kapasitas (int) Studio\n";

            bool found = true;
            while(found) // ulangi input kode selama kode tidak unik
            {
                found = false; // set found false dahulu
                cout<<"kode: ";
                cin>>kode;
                for(Studio* stud : listStudio) // cek kode di dalam list
                {
                    if(stud->getKode() == kode)
                    {
                        found = true; // set found true jika terdeteksi kode sudah digunakan
                    }
                }
                if(found)
                {
                    cout<<"kode sudah digunakan!"<<endl;
                }
            }

            // input nilai attribut lainnya
            cout<<"lokasi: ";
            cin>>lokasi;
            cout<<"jaringan: ";
            cin>>jaringan;
            cout<<"kapasitas: ";
            cin>>kapasitas;

            // instansiasi object
            Studio* studioBaru = new Studio(kode, lokasi, jaringan, kapasitas);
            listStudio.push_back(studioBaru); // push ke list
            studioBaru = NULL; // clean pointer
            cout<<"data berhasil ditambahkan!\n";
        }
        else if(menu == 3) // mencari data
        {
            bool found = false; // flag
            string kode;
            cout<<"masukkan kode target: ";
            cin>>kode;
            for(auto it = listStudio.begin(); it != listStudio.end() && !found; ++it) // linear search
            {
                if((*it)->getKode() == kode) // cek kode
                {
                    found = true;
                    cout<<"data ditemukan!\n";
                    cout<<(*it)->getKode()<<" | "<<(*it)->getLokasi()<<" | "<<(*it)->getJaringan()<<" | "<<(*it)->getKapasitas()<<endl;
                }
            }
            if(!found) // alert jika tidak ditemukan
            {
                cout<<"data tidak ada!\n";
            }
        }
        else if(menu == 4) // edit data
        {
            // deklarasi nilai attribut
            string kode, lokasi, jaringan;
            int kapasitas;
            cout<<"masukkan kode Studio yang ingin diedit: ";
            cin>>kode;

            bool found = false;
            for(auto it = listStudio.begin(); it != listStudio.end() && !found; ++it)
            {
                if((*it)->getKode() == kode) // cek kode target
                {
                    // input nilai attribut baru
                    cout<<"lokasi baru: ";
                    cin>>lokasi;
                    cout<<"jaringan baru: ";
                    cin>>jaringan;
                    cout<<"kapasitas baru: ";
                    cin>>kapasitas;

                    // update data
                    (*it)->setLokasi(lokasi);
                    (*it)->setJaringan(jaringan);
                    (*it)->setKapasitas(kapasitas);
                    found = true;

                    cout<<"data berhasil diubah!\n";
                }
            }
            if(!found) // alert jika tidak ditemukan
            {
                cout<<"data tidak ada!\n";
            }
        }
        else if(menu == 5)
        {
            string kode;
            cout<<"masukkan kode Studio yang ingin dihapus: ";
            cin>>kode;

            bool found = false; // flag
            for(auto it = listStudio.begin(); it != listStudio.end() && !found; ++it)
            {
                if((*it)->getKode() == kode) // cek kode target
                {
                    listStudio.erase(it); // hapus data
                    found = true;
                    cout<<"data berhasil dihapus!\n";
                }
            }
            if(!found) // alert jika tidak ditemukan
            {
                cout<<"data tidak ada!\n";
            }
        }
        else // jika menu tidak tersedia
        {
            printf("menu %d tidak ada!\n", menu);
        }
        cout<<"Apakah ingin melakukan perubahan? (Y/N): ";
        cin>>makeChanges;
    }

    cout<<"Program selesai. Data dihapus.";
    return 0;
}
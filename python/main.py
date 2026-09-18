from bioskop import Studio

# inisialisasi list
listStudio = []
makeChanges = "Y"

while makeChanges == "Y":
    # print deskripsi menu
    print("\npilih menu:\n1. Tampilkan data\n2. Tambahkan data\n3. Cari data\n4. Edit data\n5. Hapus data")
    menu = int(input("masukkan menu: "))    # input pilihan menu
    print("")

    if menu == 1:
        if listStudio:     # cek apakah list berisi
            for stud in listStudio:     # foreach list
                print(f"{stud.getKode()} | {stud.getLokasi()} | {stud.getJaringan()} | {stud.getKapasitas()}")
        else:     # alert jika list kosong
            print("List kosong!")

    elif menu == 2:
        # input nilai attribut untuk instance baru
        kode = input("kode (str): ")
        lokasi = input("lokasi (str): ")
        jaringan = input("jaringan (str): ")

        # error handling apabila inputan kapasitas bukan bilangan bulat
        capNotInt = 1
        while capNotInt == 1:
            try:
                kapasitas = int(input("kapasitas (int): "))
                capNotInt = 0
            except Exception:
                print("kapasitas harus bilangan bulat!")

        # instansiasi studio baru
        newStudio = Studio(kode, lokasi, jaringan, kapasitas)
        listStudio.append(newStudio)    # masukkan ke list
        print("Studio berhasil ditambahkan!")

    elif menu == 3:
        kode = input("kode target: ")
        found = 0   # isFound flag
        for stud in listStudio:     # foreach list linear search
            if stud.getKode() == kode:     # matching kode
                print("Studio ditemukan!")
                found = 1
                print(f"{stud.getKode()} | {stud.getLokasi()} | {stud.getJaringan()} | {stud.getKapasitas()}")
                break

        if found == 0:     # alert jika tidak ditemukan
            print("Studio tidak ada!")

    elif menu == 4:
        kode = input("kode studio: ")
        found = 0      # isFound flag
        for stud in listStudio:     # foreach list linear search
            if stud.getKode() == kode:     # matching kode
                print("studio ditemukan!")
                found = 1
                # input nilai attribut baru
                lokasi = input("lokasi baru: ")
                jaringan = input("jaringan baru: ")
                kapasitas = int(input("kapasitas baru: "))
                # update instance attribut
                stud.setLokasi(lokasi)
                stud.setJaringan(jaringan)
                stud.setKapasitas(kapasitas)
                print("data berhasil diperbarui!")
                break

        if found == 0:     # alert jika tidak ditemukan
            print("Studio tidak ada!")

    elif menu == 5:
        kode = input("kode studio: ")
        found = 0       # isFound flag
        for stud in listStudio:     # foreach list linear search
            if stud.getKode() == kode:     # matching kode
                listStudio.remove(stud)     # delete instance
                found = 1
                print(f"Studio {stud.getKode()} berhasil dihapus.")
                break

        if found == 0:      # alert jika tidak ditemukan
            print("Studio tidak ada!")

    else:
        print(f"menu {menu} tidak ada!")

    print("")
    makeChanges = input("Buat perubahan lain? (Y/N): ")

print("Program selesai. Data dihapus.")
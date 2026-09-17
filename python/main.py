import bioskop

listStudio = []
makeChanges = "Y"

while makeChanges == "Y":
    print("pilih menu:\n1. Tampilkan data\n2. Tambahkan data\n3. Cari data\n4. Edit data\n5. Hapus data\n")
    menu = int(input("masukkan menu: "))

    if menu == 1:
        for stud in listStudio:
            print(f"{stud.getKode()} | {stud.getLokasi()} | {stud.getJaringan()} | {stud.getKapasitas()}\n")
    # elif menu == 2:
        
    # elif menu == 3:

    # elif menu == 4:

    # elif menu == 5:

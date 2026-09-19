package Java;

import java.util.Scanner;
import java.util.LinkedList;
import java.util.List;

public class Main
{
    public static void main(String args[])
    {
        List<Studio> listStudio = new LinkedList<>(); // inisialisasi list of object
        char makeChanges = 'Y'; // variabel penampung decision
        Scanner input = new Scanner(System.in); // inisialisasi scanner

        while(makeChanges != 'N')
        {
            System.out.println("pilih menu:");
            System.out.println("1. Tampilkan data");
            System.out.println("2. Tambahkan data");
            System.out.println("3. Cari data");
            System.out.println("4. Edit data");
            System.out.println("5. Hapus data");

            // memilih menu
            int menu = 0;
            System.out.print("Masukkan menu: ");
            menu = input.nextInt();

            if(menu == 1) // menampilkan data
            {
                if(listStudio.isEmpty()) // alert jika list masih kosong
                {
                    System.out.println("List data Studio kosong!");
                }
                else
                {
                    System.out.println("List data Studio: ");
                    int num = 1;
                    for(Studio data : listStudio) // menggunakan foreach untuk output data Studio
                    {
                        System.out.printf("%d. %s | %s | %s | %d\n", num, data.getKode(), data.getLokasi(), data.getJaringan(), data.getKapasitas());
                        num++;
                    }
                }
                
            }
            else if(menu == 2) // menambahkan data
            {
                // deklarasi nilai dari attribut data baru
                String kode = "";
                String lokasi = "";
                String jaringan = "";
                int kapasitas = 0;

                System.out.println("Masukkan data: ");
                System.out.print("kode (String): ");
                kode = input.next();

                boolean found = true;
                while(found) // cek apakah kode sudah digunakan di list (kode harus unik)
                {
                    found = false;
                    for(Studio data : listStudio)
                    {
                        if(data.getKode().equals(kode))
                        {
                            found = true;
                        }
                    }
                    if(found) // jika kode terdeteksi sudah digunakan, input ulang dan cek kembali
                    {
                        System.out.printf("kode %s sudah ada!\n", kode);
                        System.out.print("kode (String): ");
                        kode = input.next();
                    }
                }

                System.out.print("lokasi (String): ");
                lokasi = input.next();
                System.out.print("jaringan (String): ");
                jaringan = input.next();
                System.out.print("kapasitas (int): ");

                boolean capNotInt = true;
                while(capNotInt) // perulangan apabila inputan kapasitas tidak bilangan bulat
                {
                    try // cek error
                    {
                        kapasitas = input.nextInt();
                        capNotInt = false;
                    }
                    catch(Exception e) // jika terdeteksi error, input ulang
                    {
                        System.out.println("Kapasitas harus bilangan bulat!");
                        input.next();
                        System.out.print("kapasitas baru: ");
                    }
                }

                // instansiasi data baru
                Studio newStudio = new Studio(kode, lokasi, jaringan, kapasitas);
                listStudio.add(newStudio); // masukkan ke list
                System.out.println("Data berhasil ditambahkan!");
            }
            else if(menu == 3) // mencari data
            {
                String kode = ""; // deklarasi kode target
                System.out.print("masukkan kode target (String): ");

                boolean found = false;
                kode = input.next();
                for(Studio data : listStudio) // foreach untuk mencari dengan linear search
                {
                    if(data.getKode().equals(kode))
                    {
                        System.out.println("data ditemukan!");
                        System.out.println(data.getKode() + " | " + data.getLokasi() + " | " + data.getJaringan() + " | " + data.getKapasitas());
                        found = true;
                    }
                }
                if(!found) // alert jika data tidak ditemukan
                {
                    System.out.println("data tidak ada!");
                }
            }
            else if(menu == 4) // mengedit data
            {
                String kode = ""; // deklarasi kode target
                System.out.print("masukkan kode target (String): ");

                boolean found = false;
                kode = input.next();
                for(Studio data : listStudio) // cari data
                {
                    if(data.getKode().equals(kode))
                    {
                        // input nilai baru attribut
                        System.out.println("data ditemukan!");
                        System.out.print("lokasi baru (String): ");
                        String lokasi = input.next();
                        System.out.print("jaringan baru (String): ");
                        String jaringan = input.next();

                        int kapasitas = 0;
                        boolean capNotInt = true;
                        System.out.print("kapasitas baru (int): ");
                        while(capNotInt) // error handling apabila kapasitas bukan bil bulat
                        {
                            try
                            {
                                kapasitas = input.nextInt();
                                capNotInt = false;
                            }
                            catch(Exception e)
                            {
                                System.out.println("Kapasitas harus bilangan bulat!");
                                input.next();
                                System.out.print("kapasitas baru (int): ");
                            }
                        }
                        // update data
                        data.setLokasi(lokasi);
                        data.setJaringan(jaringan);
                        data.setKapasitas(kapasitas);
                        found = true;
                        System.out.println("Data berhasil diubah!");
                    }
                }
                if(!found) // alert
                {
                    System.out.println("data tidak ada!");
                }
            }
            else if(menu == 5) // hapus data
            {
                String kode = ""; // deklarasi target
                System.out.print("masukkan kode target (String): ");

                boolean found = false;
                kode = input.next();
                for(Studio data : listStudio) // cari data target
                {
                    if(data.getKode().equals(kode))
                    {
                        listStudio.remove(data); // hapus data dari list
                        System.out.println("data berhasil dihapus!");
                        found = true;
                    }
                }
                if(!found) // alert
                {
                    System.out.println("data tidak ada!");
                }
            }
            else // alert menu yang tidak ada
            {
                System.out.println("menu " + menu + " tidak ada!");
            }

            System.out.print("Ingin membuat perubahan lagi? (Y/N):  ");
            makeChanges = input.next().charAt(0);
        }

        System.out.println("Program selesai. Data dihapus.");
        input.close();
    }
}
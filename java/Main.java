package java;
import java.util.Scanner;
import java.util.LinkedList;
import java.util.List;

class Main
{
    public static void main(String args[])
    {
        List<Studio> listStudio = new LinkedList<>();
        boolean crud = true;
        while(crud)
        {
            System.out.println("pilih menu:");
            System.out.println("1. Tampilkan data");
            System.out.println("2. Tambahkan data");
            System.out.println("3. Cari data");
            System.out.println("4. Edit data");
            System.out.println("5. Hapus data");

            int menu = 0;
            Scanner input = new Scanner(System.in);
            menu = input.nextInt();
            if(menu == 1)
            {
                for(Studio data : listStudio)
                {
                    System.out.printf("%s | %s | %s | %d\n", data.getKode(), data.getLokasi(), data.getJaringan(), data.getKapasitas());
                }
            }
            else if(menu == 2)
            {
                String kode = "";
                String lokasi = "";
                String jaringan = "";
                int kapasitas = 0;
                System.out.println("Masukkan data: ");
                System.out.print("kode: ");
                kode = input.next();
                System.out.print("lokasi: ");
                lokasi = input.next();
                System.out.print("jaringan: ");
                jaringan = input.next();
                System.out.print("kapasitas: ");
                kapasitas = input.nextInt();

                Studio newStudio = new Studio(kode, lokasi, jaringan, kapasitas);
                listStudio.add(newStudio);
            }
            else if(menu == 3)
            {
                String kode = "";
                boolean found = false;
                System.out.print("masukkan kode target: ");
                kode = input.next();
                for(Studio data : listStudio)
                {
                    if(data.getKode() == kode)
                    {
                        System.out.println("data ditemukan!");
                        System.out.println(data.getKode() + " | " + data.getLokasi() + " | " + data.getJaringan() + " | " + data.getKapasitas());
                        found = true;
                    }
                }
                if(!found){
                    System.out.println("data tidak ada!");
                }
            }
            else if(menu == 4)
            {
                String kode = "";
                boolean found = false;
                System.out.print("masukkan kode target: ");
                kode = input.next();
                for(Studio data : listStudio)
                {
                    if(data.getKode() == kode)
                    {
                        System.out.println("data ditemukan!");
                        String lokasi = input.next();
                        String jaringan = input.next();
                        int kapasitas = 0;
                        boolean capNotInt = true;
                        while(capNotInt)
                        {
                            try
                            {
                                kapasitas = input.nextInt();
                                capNotInt = false;
                            }
                            catch(Exception e){}
                        }
                        data.setLokasi(lokasi);
                        data.setJaringan(jaringan);
                        data.setKapasitas(kapasitas);
                        found = true;
                    }
                }
                if(!found){
                    System.out.println("data berhasil diubah!");
                }
            }
            else if(menu == 5)
            {
                String kode = "";
                boolean found = false;
                System.out.print("masukkan kode target: ");
                kode = input.next();
                for(Studio data : listStudio)
                {
                    if(data.getKode() == kode)
                    {
                        listStudio.remove(data);
                        System.out.println("data berhasil dihapus!");
                        found = true;
                    }
                }
                if(!found){
                    System.out.println("data tidak ada!");
                }
            }
            else
            {
                System.out.println("menu " + menu + " tidak ada!");
            }

            crud = input.nextBoolean();

            input.close();
        }
    }
}
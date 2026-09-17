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

            }
            else if(menu == 4)
            {

            }
            else
            {

            }

            crud = input.nextBoolean();

            input.close();
        }
    }
}
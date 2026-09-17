class Studio:
    __kode = ""
    __lokasi = ""
    __jaringan = ""
    __kapasitas = 0

    def __init__(self, kode:str, lokasi:str, jaringan:str, kapasitas:int):
        self.__kode = kode
        self.__lokasi = lokasi
        self.__jaringan = jaringan
        self.__kapasitas = kapasitas

    def getKode(self):
        return self.__kode

    def getLokasi(self):
        return self.__lokasi

    def getJaringan(self):
        return self.__jaringan

    def getKapasitas(self):
        return self.__kapasitas

    def setKode(self, kode:str):
        self.__kode = kode

    def setLokasi(self, lokasi:str):
        self.__lokasi = lokasi

    def setJaringan(self, jaringan:str):
        self.__jaringan = jaringan

    def setKapasitas(self, kapasitas:int):
        self.__kapasitas = kapasitas
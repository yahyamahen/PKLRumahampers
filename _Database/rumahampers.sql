/*==============================================================*/
/* Table: BARANG                                             */
/*==============================================================*/
CREATE OR REPLACE TABLE barang 
(
   id_barang            CHAR(10) PRIMARY KEY       NOT NULL,
   nama_barang          VARCHAR(100)                     NOT NULL,
   harga_barang         INTEGER                          NOT NULL,
   jumlah_barang        INTEGER                          NOT NULL,
   warna_barang         VARCHAR(20)                      NULL
);


/*==============================================================*/
/* Table: CUSTOMERS                                             */
/*==============================================================*/
CREATE OR REPLACE TABLE customers 
(
   username    CHAR(100)         PRIMARY KEY    NOT NULL,
   pass              VARCHAR(100)            NOT NULL,
   nama_lengkap         VARCHAR(100)                     NOT NULL,
   email                VARCHAR(100)                 NOT NULL,
   no_telp              CHAR(15)                         NULL,
   tanggal_lahir        DATE                             NULL,
   provinsi             VARCHAR(50)                      NULL,
   kota                 VARCHAR(50)                      NULL,
   kecamatan            VARCHAR(50)                      NULL,   
   alamat_lengkap       VARCHAR(1024)                    NULL,
   kodepos           CHAR(10)                         NULL,
   foto_profil    VARCHAR(100)         NULL
);

SELECT * FROM `customers`;
DELETE FROM customers WHERE username = '123';
INSERT INTO customers (username, pass, nama_lengkap, email) 
VALUES ('123', '123', '123', '123@123');
/*==============================================================*/
/* Table: KURIR                                                 */
/*==============================================================*/
CREATE OR REPLACE TABLE kurir 
(
   id_kurir    CHAR(10) PRIMARY KEY       NOT NULL,
   nama_kurir           VARCHAR(50)                      NOT NULL,
   tipe_pengiriman      VARCHAR(50)                      NULL,
   harga_pengiriman     INTEGER                          NULL
);


/*==============================================================*/
/* Table: PEMESANAN                                             */
/*==============================================================*/
CREATE OR REPLACE TABLE pemesanan 
(
   id_pemesanan         CHAR(10) PRIMARY KEY NOT NULL,
   username             CHAR(50)                         NULL,
   id_kurir             CHAR(10)                         NULL,
   resi_pengiriman      CHAR(50)                         NULL,
   id_barang            CHAR(10)                         NULL,
   total                INTEGER                          NOT NULL,
   bank_pembayaran      VARCHAR(20)                      NULL,
   bukti_pembayaran     VARCHAR(200)                     NULL,
   status_pemesanan     VARCHAR(20)                      NULL,
   catatan_pemesanan VARCHAR(255)         NULL
);


/*==============================================================*/
/* Table: PENGIRIMAN                                            */
/*==============================================================*/
CREATE OR REPLACE TABLE pengiriman 
(
   resi_pengiriman      CHAR(50) PRIMARY KEY NOT NULL,
   id_kurir             CHAR(10)                         NULL,
   tujuan_pengiriman    VARCHAR(250)                     NULL,
   jenis_pengiriman     VARCHAR(25)                      NULL
);

ALTER TABLE pemesanan
   ADD FOREIGN KEY (resi_pengiriman) REFERENCES pengiriman (resi_pengiriman),
   ADD FOREIGN KEY (id_barang) REFERENCES barang (id_barang),
   ADD FOREIGN KEY (email) REFERENCES customers (email),
   ADD FOREIGN KEY (id_kurir) REFERENCES kurir (id_kurir);

ALTER TABLE pengiriman
   ADD FOREIGN KEY (id)kurir)
REFERENCES kurir (id_kurir);

INSERT INTO produk VALUES  
('PR1', 'Al-Qur\'an Madinah', '100000', '5', 'Hitam'),
('PR2', 'Al-Qur\'an Indonesia', '120000', '2', 'Putih'),
('PR3', 'Al-Qur\'an Madinah', '80000', '4', 'Cream'),
('PR4', 'Al-Qur\'an Istanbul', '140000', '3', 'Hijau');

INSERT INTO kurir VALUES
('K1', 'JNE', 'Cepat', '40000'),
('K2', 'SiCepat', 'Standar', '20000');

INSERT INTO pengiriman VALUES 
('PG01', 'K3', 'Jl. Jamabangan No.1 RT01 RW01', 'Cepat');
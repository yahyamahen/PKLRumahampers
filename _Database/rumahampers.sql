/*==============================================================*/
/* Table: produk                                                */
/*==============================================================*/
CREATE OR REPLACE TABLE produk 
(
   id_produk            CHAR(10)	PRIMARY KEY      NOT NULL,
   kategori            	VARCHAR(255)			 NOT NULL, 
   nama_produk          VARCHAR(100)                     NOT NULL,
   harga_produk         INTEGER                          NOT NULL,
   jumlah_produk        INTEGER                          NOT NULL,
   deskripsi_produk	VARCHAR(1024)			 NULL,
   foto_produk 		VARCHAR(50)			 NULL,
   warna_produk         VARCHAR(20)                      NULL
);

/*==============================================================*/
/* Table: foto_produk                                           */
/*==============================================================*/
CREATE OR REPLACE TABLE foto_produk (
   id			INTEGER		PRIMARY KEY	NOT NULL,
   id_produk		CHAR(10)			NULL,
   foto_produk		VARCHAR(255)			NULL
);


/*==============================================================*/
/* Table: wishlist                                              */
/*==============================================================*/
CREATE OR REPLACE TABLE wishlist (
   id			INTEGER		PRIMARY KEY	NOT NULL	AUTO_INCREMENT,
   username		CHAR(10)			NULL,
   id_produk		CHAR(10)			NULL
);


/*==============================================================*/
/* Table: trolley                                           */
/*==============================================================*/
CREATE OR REPLACE TABLE trolley (
   id			INTEGER		PRIMARY KEY	NOT NULL	AUTO_INCREMENT,
   username		CHAR(10)			NULL,
   id_produk		CHAR(10)			NULL
);


/*==============================================================*/
/* Table: CUSTOMERS                                             */
/*==============================================================*/
CREATE OR REPLACE TABLE customers 
(
   username    		CHAR(100)	PRIMARY KEY      NOT NULL,
   pass              	VARCHAR(100)            	 NOT NULL,
   nama_lengkap         VARCHAR(100)                     NOT NULL,
   email                VARCHAR(100)                	 NOT NULL,
   no_telp              CHAR(15)                         NULL,
   tanggal_lahir        DATE                             NULL,
   provinsi             VARCHAR(50)                      NULL,
   kota                 VARCHAR(50)                      NULL,
   kecamatan            VARCHAR(50)                      NULL,   
   alamat_lengkap       VARCHAR(1024)                    NULL,
   kodepos           	CHAR(10)                         NULL,
   foto_profil    	VARCHAR(100)         		 NULL
);


/*==============================================================*/
/* Table: KURIR                                                 */
/*==============================================================*/
CREATE OR REPLACE TABLE kurir 
(
   id_kurir    		CHAR(10) 	PRIMARY KEY 	NOT NULL,
   nama_kurir           VARCHAR(50)                     NOT NULL,
   tipe_pengiriman      VARCHAR(50)			NULL,
   harga_pengiriman     INTEGER				NULL
);


/*==============================================================*/
/* Table: PEMESANAN                                             */
/*==============================================================*/
CREATE OR REPLACE TABLE pemesanan 
(
   id_pemesanan         CHAR(10) 	PRIMARY KEY 	 NOT NULL,
   username             CHAR(50)                         NULL,
   id_kurir             CHAR(10)                         NULL,
   resi_pengiriman      CHAR(50)                         NULL,
   id_barang            CHAR(10)                         NULL,
   total                INTEGER                          NOT NULL,
   bank_pembayaran      VARCHAR(20)                      NULL,
   bukti_pembayaran     VARCHAR(200)                     NULL,
   status_pemesanan     VARCHAR(20)                      NULL,
   catatan_pemesanan 	VARCHAR(255)         		 NULL
);

/*==============================================================*/
/* Table: PENGIRIMAN                                            */
/*==============================================================*/
CREATE OR REPLACE TABLE pengiriman 
(
   resi_pengiriman      CHAR(50)	PRIMARY KEY 	 NOT NULL,
   id_kurir             CHAR(10)                         NULL,
   tujuan_pengiriman    VARCHAR(250)                     NULL,
   jenis_pengiriman     VARCHAR(25)                      NULL
);

/*==============================================================*/
/* Table: Alter Table                                            */
/*==============================================================*/
ALTER TABLE pemesanan
   ADD FOREIGN KEY (resi_pengiriman) REFERENCES pengiriman (resi_pengiriman),
   ADD FOREIGN KEY (id_barang) REFERENCES produk (id_produk),
   ADD FOREIGN KEY (username) REFERENCES customers (username),
   ADD FOREIGN KEY (id_kurir) REFERENCES kurir (id_kurir);

ALTER TABLE pengiriman
   ADD FOREIGN KEY (id_kurir) REFERENCES kurir (id_kurir);

ALTER TABLE foto_produk
   ADD FOREIGN KEY (id_produk) REFERENCES produk (id_produk);

ALTER TABLE wishlist
   ADD FOREIGN KEY (id_produk) REFERENCES produk (id_produk),
   ADD FOREIGN KEY (username) REFERENCES customers (username);

ALTER TABLE trolley
   ADD FOREIGN KEY (id_produk) REFERENCES produk (id_produk),
   ADD FOREIGN KEY (username) REFERENCES customers (username);

DROP TABLE trolley;
DROP TABLE wishlist;
DROP TABLE foto_produk;
DROP TABLE pengiriman;
DROP TABLE kurir;
DROP TABLE pemesanan;
DROP TABLE produk;


SELECT * FROM wishlist;
SELECT * FROM wishlist WHERE username = 'yahyamahen' && id_produk = 'PR2';

INSERT INTO customers VALUES 
('123', '$2y$10$9c0JVxlUE7BFwdgYxq/gVeOqt2YuWNz6y1Y4SWkRub68hnZPP/Pgm' ,'123' ,'123@123' ,'123' ,'2003-01-02' ,'Jawa Timur', 'Surabaya', 'Lakarsantri', 'Jl. Lakarsantri 1 No. 3 RT01 RW01', '123'),
('yahyamahen', '$2y$10$9c0JVxlUE7BFwdgYxq/gVeOqt2YuWNz6y1Y4SWkRub68hnZPP/Pgm' ,'Rizqi Yahya Mahendra' ,'kiky.mahendra21@gmail.com' ,'085649572121' ,'2000-07-11' ,'Jawa Timur', 'Surabaya', 'Lakarsantri', 'Jl. Lakarsantri 1 No. 3 RT01 RW01', '60211');

DELETE FROM customers WHERE username = 'yahyamahen';

INSERT INTO produk VALUES  
('PR1', 'Quran', 'Al-Quran Madinah', '100000', '5', 'Quran Dari Madinah', 'PR1_1.jpg', 'Hitam'),
('PR2', 'Quran', 'Al-Quran Indonesia', '120000', '2', 'Quran Dari Indonesia', 'PR2_1.jpg', 'Putih'),
('PR3', 'Quran', 'Al-Quran Madinah', '80000', '4', 'Quran Dari Madinah', 'PR3_1.jpg', 'Cream'),
('PR4', 'Quran', 'Al-Quran Istanbul', '140000', '3', 'Quran Dari Istanbul', 'PR4_1.jpg', 'Hijau');

INSERT INTO kurir VALUES
('K1', 'JNE', 'Cepat', '40000'),
('K2', 'SiCepat', 'Standar', '20000');


DELETE FROM wishlist WHERE  id_produk = 'PR1' && username = 'yahyamahen';
INSERT INTO wishlist VALUES
('0', '123', 'PR1'),
('1', '123','PR4'),
('2', 'yahyamahen', 'PR2'),
('3', 'yahyamahen','PR3');


INSERT INTO trolley VALUES
('0', '123', 'PR1'),
('1', '123','PR4'),
('2', 'yahyamahen', 'PR2'),
('3', 'yahyamahen','PR3');

SELECT * FROM customers;

SELECT customers.username, produk.nama_produk, produk.harga_produk, produk.jumlah_produk, produk.
FROM produk, wishlist, customers
WHERE produk.id_produk = wishlist.id_produk && customers.username = wishlist.username && customers.username = 'yahyamahen';

SELECT * FROM pemesanan;
INSERT INTO pemesanan VALUES 
('PM01', 'yahyamahen', 'K1', 'K09123012', 'PR2', '', '', '', '', ''),
('PM02', '123', 'K2', );

INSERT INTO pengiriman VALUES 
('PG01', 'K3', 'Jl. Jamabangan No.1 RT01 RW01', 'Cepat');

SELECT * FROM `customers`;
DELETE FROM customers WHERE username = '123';
INSERT INTO customers (username, pass, nama_lengkap, email) 
VALUES ('123', '123', '123', '123@123');
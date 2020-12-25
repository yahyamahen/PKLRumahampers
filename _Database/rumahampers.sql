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
/* Table: produk                                                */
/*==============================================================*/
CREATE OR REPLACE TABLE produk 
(
   id_produk            CHAR(10)	PRIMARY KEY     NOT NULL,
   kategori            	VARCHAR(255) 			NOT NULL, 
   nama_produk          VARCHAR(100)			NOT NULL,
   harga_produk         INTEGER				NOT NULL,
   jumlah_produk        INTEGER				NOT NULL,
   berat_produk		FLOAT 				NULL,
   deskripsi_produk	VARCHAR(1024)			NULL,
   foto_produk 		VARCHAR(50)			NULL,
   warna_produk         VARCHAR(20)			NULL
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
   id_produk		CHAR(10)			NULL,
   total_pcs		INTEGER				NULL
);


/*==============================================================*/
/* Table: PEMESANAN                                             */
/*==============================================================*/
CREATE OR REPLACE TABLE pemesanan 
(
   id_pemesanan		INTEGER		PRIMARY KEY 	NOT NULL 	AUTO_INCREMENT,
   username             CHAR(50)			NOT NULL,
   id_produk            CHAR(10)                        NOT NULL,
   id_kurir            	INTEGER				NOT NULL,
   resi_pengiriman      VARCHAR(50)			NOT NULL,
   id_tujuan 		INTEGER 		 	NOT NULL,
   total_harga_pengiriman	INTEGER			NOT NULL,
   total                INTEGER				NOT NULL,
   bank_pembayaran      VARCHAR(20)			NULL,
   bukti_pembayaran     VARCHAR(200)			NULL,
   waktu_pemesanan	TIMESTAMP			NULL,
   status_pemesanan     VARCHAR(20)			NULL,
   catatan_pemesanan 	VARCHAR(255)			NULL
);

/*==============================================================*/
/* Table: PENGIRIMAN                                            */
/*==============================================================*/
-- CREATE OR REPLACE TABLE pengiriman 
-- (
--    resi_pengiriman      	CHAR(50)	PRIMARY KEY 	NOT NULL,
--    id_kurir             	INTEGER				NULL,
--    id_tujuan			INTEGER 			NULL,
--    tujuan_pengiriman    	VARCHAR(250)			NULL,
--    pintpoint    		VARCHAR(250) 			NULL,
--    total_harga_pengiriman     	INTEGER				NULL
-- );

/*==============================================================*/
/* Table: KURIR                                                 */
/*==============================================================*/
CREATE OR REPLACE TABLE kurir 
(
   id_kurir 		INTEGER 	PRIMARY KEY 	NOT NULL 	AUTO_INCREMENT,
   nama_kurir           VARCHAR(50)                     NOT NULL,
   tipe_pengiriman      VARCHAR(50)			NULL,
   harga_per_4_kg	INTEGER				NULL
);

CREATE OR REPLACE TABLE list_tujuan_pengiriman
(
   id_tujuan 		INTEGER 	PRIMARY KEY 	NOT NULL 	AUTO_INCREMENT,
   provinsi		VARCHAR(50)			NULL,
   kota			VARCHAR(50)			NULL,
   harga_pengiriman	INTEGER  			NULL
);


/*==============================================================*/
/* Table: Alter Table                                            */
/*==============================================================*/
ALTER TABLE pemesanan
   ADD FOREIGN KEY (username) REFERENCES customers (username),
   ADD FOREIGN KEY (id_produk) REFERENCES produk (id_produk),
   -- ADD FOREIGN KEY (resi_pengiriman) REFERENCES pengiriman (resi_pengiriman),
   ADD FOREIGN KEY (id_tujuan) REFERENCES list_tujuan_pengiriman (id_tujuan),
   ADD FOREIGN KEY (id_kurir) REFERENCES kurir (id_kurir);

-- ALTER TABLE pengiriman
--    ADD FOREIGN KEY (id_kurir) REFERENCES kurir (id_kurir),
--    ADD FOREIGN KEY (id_tujuan) REFERENCES list_tujuan_pengiriman (id_tujuan);
   
ALTER TABLE foto_produk
   ADD FOREIGN KEY (id_produk) REFERENCES produk (id_produk);

ALTER TABLE wishlist
   ADD FOREIGN KEY (id_produk) REFERENCES produk (id_produk),
   ADD FOREIGN KEY (username) REFERENCES customers (username);

ALTER TABLE trolley
   ADD FOREIGN KEY (id_produk) REFERENCES produk (id_produk),
   ADD FOREIGN KEY (username) REFERENCES customers (username);
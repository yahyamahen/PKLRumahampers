/*==============================================================*/
/* Table: BARANG                                             */
/*==============================================================*/
CREATE OR REPLACE TABLE BARANG 
(
   ID_BARANG            CHAR(10)	PRIMARY KEY    	NOT NULL,
   NAMA_BARANG          VARCHAR(100)                   	NOT NULL,
   HARGA_BARANG         INTEGER                        	NOT NULL,
   JUMLAH_BARANG        INTEGER                        	NOT NULL,
   WARNA_BARANG         VARCHAR(20)                    	NULL
);


/*==============================================================*/
/* Table: CUSTOMERS                                             */
/*==============================================================*/
CREATE OR REPLACE TABLE CUSTOMERS 
(
   USERNAME             CHAR(50)	PRIMARY KEY	NOT NULL,
   PASSWORD             CHAR(50)                       	NOT NULL,
   NAMA_LENGKAP         VARCHAR(100)                   	NOT NULL,
   EMAIL                VARCHAR(50)                    	NOT NULL,
   NO_TELEPON           CHAR(14)                       	NULL,
   TEMPAT_LAHIR         VARCHAR(50)                    	NULL,
   TANGGAL_LAHIR        DATE                           	NULL,
   ALAMAT               VARCHAR(250)                   	NULL,
   KECAMATAN            VARCHAR(50)                    	NULL,
   KOTA                 VARCHAR(50)                    	NULL,
   KODE_WILAYAH         CHAR(10)                       	NULL,
   PROVINSI             VARCHAR(50)                    	NULL
);


/*==============================================================*/
/* Table: KURIR                                                 */
/*==============================================================*/
CREATE OR REPLACE TABLE KURIR 
(
   ID_KURIR		CHAR(10)	PRIMARY KEY    	NOT NULL,
   NAMA_KURIR           VARCHAR(50)                    	NOT NULL,
   TIPE_PENGIRIMAN      VARCHAR(50)                    	NULL,
   HARGA_PENGIRIMAN     INTEGER                        	NULL
);


/*==============================================================*/
/* Table: PEMESANAN                                             */
/*==============================================================*/
CREATE OR REPLACE TABLE PEMESANAN 
(
   ID_PEMESANAN         CHAR(10)	PRIMARY KEY	NOT NULL,
   USERNAME             CHAR(50)                       	NULL,
   ID_KURIR             CHAR(10)                       	NULL,
   RESI_PENGIRIMAN      CHAR(50)                       	NULL,
   ID_BARANG            CHAR(10)                       	NULL,
   TOTAL                INTEGER                        	NOT NULL,
   BANK_PEMBAYARAN      VARCHAR(20)                    	NULL,
   BUKTI_PEMBAYARAN     VARCHAR(200)                   	NULL,
   STATUS_PEMESANAN     VARCHAR(20)                    	NULL
);


/*==============================================================*/
/* Table: PENGIRIMAN                                            */
/*==============================================================*/
CREATE OR REPLACE TABLE PENGIRIMAN 
(
   RESI_PENGIRIMAN      CHAR(50)	PRIMARY KEY	NOT NULL,
   ID_KURIR             CHAR(10)                       	NULL,
   TUJUAN_PENGIRIMAN    VARCHAR(250)                   	NULL,
   JENIS_PENGIRIMAN     VARCHAR(25)                    	NULL
);

ALTER TABLE PEMESANAN
   ADD FOREIGN KEY (RESI_PENGIRIMAN) REFERENCES PENGIRIMAN (RESI_PENGIRIMAN),
   ADD FOREIGN KEY (ID_BARANG) REFERENCES BARANG (ID_BARANG),
   ADD FOREIGN KEY (USERNAME) REFERENCES CUSTOMERS (USERNAME),
   ADD FOREIGN KEY (ID_KURIR) REFERENCES KURIR (ID_KURIR);

ALTER TABLE PENGIRIMAN
   ADD FOREIGN KEY (ID_KURIR)
REFERENCES KURIR (ID_KURIR);

INSERT INTO produk VALUES  
('PR1', 'Al-Qur\'an Madinah', '100000', '5', 'Hitam'),
('PR2', 'Al-Qur\'an Indonesia', '120000', '2', 'Putih'),
('PR3', 'Al-Qur\'an Madinah', '80000', '4', 'Cream'),
('PR4', 'Al-Qur\'an Istanbul', '140000', '3', 'Hijau');

INSERT INTO kurir VALUES
('K1', 'JNE', 'Cepat', '40000'),
('K2', 'SiCepat', 'Standar', '20000');

INSERT INTO PENGIRIMAN VALUES 
('PG01', 'K3', 'Jl. Jamabangan No.1 RT01 RW01', 'Cepat');
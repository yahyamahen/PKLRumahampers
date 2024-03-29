-- INSERT INTO admin VALUES 
-- ('','admin1','123','admin@admin','foto_admin1.jpg');
-- SELECT * FROM admin;
-- DELETE FROM admin;

-- INSERT INTO customers VALUES 
-- ('123', '$2y$10$9c0JVxlUE7BFwdgYxq/gVeOqt2YuWNz6y1Y4SWkRub68hnZPP/Pgm' ,'123' ,'123@123' ,'123' ,'2003-01-02' ,'Jawa Timur', 'Surabaya', 'Lakarsantri', 'Jl. Lakarsantri 1 No. 3 RT01 RW01', '123'),
-- ('yahyamahen', '$2y$10$9c0JVxlUE7BFwdgYxq/gVeOqt2YuWNz6y1Y4SWkRub68hnZPP/Pgm' ,'Rizqi Yahya Mahendra' ,'kiky.mahendra21@gmail.com' ,'085649572121' ,'2000-07-11' ,'Jawa Timur', 'Surabaya', 'Lakarsantri', 'Jl. Lakarsantri 1 No. 3 RT01 RW01', '60211');
-- SELECT * FROM customers;
-- DELETE FROM customers;

INSERT INTO produk VALUES  
('QR1', 'Quran', 'Al-Quran Makkah', '100000', '5', '0.5', 'Quran Dari Makkah', 'QR1_0.jpg', 'Hitam'),
('QR2', 'Quran', 'Al-Quran Indonesia', '120000', '2', '0.5', 'Quran Dari Indonesia', 'QR2_0.jpg', 'Putih'),
('QR3', 'Quran', 'Al-Quran Madinah', '80000', '4', '0.5', 'Quran Dari Madinah', 'QR3_0.jpg', 'Merah'),
('QR4', 'Quran', 'Al-Quran Istanbul', '140000', '3', '0.5', 'Quran Dari Istanbul', 'QR4_0.jpg', 'Hitam'),
('QR5', 'Quran', 'Al-Quran Al-Aqsa', '200000', '3', '0.5', 'Quran Dari Al-Aqsa', 'QR5_0.jpg', 'Hijau'),
('SJ1', 'Sajadah', 'Sajadah Makkah', '100000', '5', '0.3', 'Sajadah Dari Makkah', 'SJ1_0.jpg', 'Hitam'),
('SJ2', 'Sajadah', 'Sajadah Indonesia', '120000', '2', '0.3', 'Sajadah Dari Indonesia', 'SJ2_0.jpg', 'Putih'),
('SJ3', 'Sajadah', 'Sajadah Madinah', '80000', '4', '0.3', 'Sajadah Dari Madinah', 'SJ3_0.jpg', 'Merah'),
('SJ4', 'Sajadah', 'Sajadah Istanbul', '140000', '3', '0.3', 'Sajadah Dari Istanbul', 'SJ4_0.jpg', 'Hitam'),
('SJ5', 'Sajadah', 'Sajadah Al-Aqsa', '200000', '3', '0.3', 'Sajadah Dari Al-Aqsa', 'SJ5_0.jpg', 'Hijau'),
('TB1', 'Tasbih', 'Tasbih Makkah', '100000', '5', '0.2', 'Tasbih Dari Makkah', 'TB1_0.jpg', 'Hitam'),
('TB2', 'Tasbih', 'Tasbih Indonesia', '120000', '2', '0.2', 'Tasbih Dari Indonesia', 'TB2_0.jpg', 'Putih'),
('TB3', 'Tasbih', 'Tasbih Madinah', '80000', '4', '0.2', 'Tasbih Dari Madinah', 'TB3_0.jpg', 'Merah'),
('TB4', 'Tasbih', 'Tasbih Istanbul', '140000', '3', '0.2', 'Tasbih Dari Istanbul', 'TB4_0.jpg', 'Hitam'),
('TB5', 'Tasbih', 'Tasbih Al-Aqsa', '200000', '3', '0.2', 'Tasbih Dari Al-Aqsa', 'TB5_0.jpg', 'Hijau'),
('MK1', 'Mukenah', 'Mukenah Makkah', '100000', '5', '0.3', 'Mukenah Dari Makkah', 'MK1_0.jpg', 'Hitam'),
('MK2', 'Mukenah', 'Mukenah Indonesia', '120000', '2', '0.3', 'Mukenah Dari Indonesia', 'MK2_0.jpg', 'Putih'),
('MK3', 'Mukenah', 'Mukenah Madinah', '80000', '4', '0.3', 'Mukenah Dari Madinah', 'MK3_0.jpg', 'Merah'),
('MK4', 'Mukenah', 'Mukenah Istanbul', '140000', '3', '0.3', 'Mukenah Dari Istanbul', 'MK4_0.jpg', 'Hitam'),
('MK5', 'Mukenah', 'Mukenah Al-Aqsa', '200000', '3', '0.3', 'Mukenah Dari Al-Aqsa', 'MK5_0.jpg', 'Hijau'),
('SR1', 'Sarung', 'Sarung Makkah', '100000', '5', '0.4', 'Sarung Dari Makkah', 'SR1_0.jpg', 'Hitam'),
('SR2', 'Sarung', 'Sarung Indonesia', '120000', '2', '0.4', 'Sarung Dari Indonesia', 'SR2_0.jpg', 'Putih'),
('SR3', 'Sarung', 'Sarung Madinah', '80000', '4', '0.4', 'Sarung Dari Madinah', 'SR3_0.jpg', 'Merah'),
('SR4', 'Sarung', 'Sarung Istanbul', '140000', '3', '0.4', 'Sarung Dari Istanbul', 'SR4_0.jpg', 'Hitam'),
('SR5', 'Sarung', 'Sarung Al-Aqsa', '200000', '3', '0.4', 'Sarung Dari Al-Aqsa', 'SR5_0.jpg', 'Hijau');


INSERT INTO produk VALUES 
('PB1', 'Paket Bundle', 'Paket Almahira', '120000', '5', '0.5', 'Quran A5 dan Tasbih 33 Biji', 'PB1_0.jpg', 'Pink'), 
('PB2', 'Paket Bundle', 'Paket Azzahra', '170000', '5', '0.5', 'Quran A5, Sajadah Madinah dan Tasbih 33 Biji', 'PB2_0.jpg', 'Pink'),
('PB3', 'Paket Bundle', 'Paket Aaliyah', '300000', '5', '0.6', 'Quran A5, Mukenah Makkah dan Tasbih 33 Biji', 'PB3_0.jpg', 'Pink'),
('PB4', 'Paket Bundle', 'Paket Ahsan', '250000', '5', '0.6', 'Quran A5, Sajadah Turki dan Tasbih 33 Biji (Free Kopyah Putih)', 'PB4_0.jpg', 'Coklat'),
('PB5', 'Paket Bundle', 'Paket Dhiya', '200000', '5', '0.6', 'Quran A5, Sajadah Turki dan Tasbih 33 Biji', 'PB5_0.jpg', 'Putih'),
('PB6', 'Paket Bundle', 'Paket Hanaa', '350000', '5', '0.6', 'Mukenah Turki, Sajadah Turki dan Tasbih 33 Biji', 'PB6_0.jpg', 'Silver'),
('PB7', 'Paket Bundle', 'Paket Jazeera', '400000', '5', '0.7', 'Quran A5, Sajadah Madinah, Mukenah Makkah dan Tasbih 33 Biji', 'PB7_0.jpg', 'Coklat'),
('PB8', 'Paket Bundle', 'Paket Balqis', '150000', '5', '0.5', 'Sajadah Turki dan Tasbih 33 Biji', 'PB8_0.jpg', 'Coklat');


SELECT * FROM produk;
-- DELETE FROM produk;

INSERT INTO kurir VALUES
('', 'SiCepat', 'Cepat (1-3 Jari)', '4500'),
('', 'SiCepat', 'REG (2-3 Hari)', '2000'),
('', 'J&T', 'Cepat (1-2 Jari)', '5000'),
('', 'J&T', 'REG (2-3 Hari)', '2000'),
('', 'SiGesit', 'Cepat (1-2 Jari)', '4500'),
('', 'SiGesit', 'REG (2-4 Hari)', '2000');
SELECT * FROM kurir;
-- DELETE FROM kurir;


INSERT INTO list_tujuan_pengiriman VALUES
('', 'Jawa Timur', 'Surabaya', '5000'),
('', 'Jawa Timur', 'Sidoarjo', '6000'),
('', 'Jawa Timur', 'Malang', '7000'),
('', 'Jawa Timur', 'Kediri', '8000'),
('', 'Jawa Tengah', 'Solo', '9000'),
('', 'Jawa Tengah', 'Klaten', '10000'),
('', 'Jawa Tengah', 'Yogyakarta', '11000'),
('', 'Jawa Tengah', 'Semarang', '12000'),
('', 'Jawa Barat', 'Bogor', '15000'),
('', 'Jawa Barat', 'Bandung', '16000'),
('', 'Jawa Barat', 'Jakarta', '18000'),
('', 'Jawa Barat', 'Banten', '20000');
SELECT * FROM list_tujuan_pengiriman;
-- DELETE FROM list_tujuan_pengiriman;

-- INSERT INTO wishlist VALUES
-- ('', '123', 'QR1'),
-- ('', '123','SJ4'),
-- ('', 'yahyamahen', 'SJ2'),
-- ('', 'yahyamahen','TB3');
-- SELECT * FROM wishlist;
-- DELETE FROM wishlist;

-- INSERT INTO trolley VALUES
-- ('', '123', 'SJ3', '2'),
-- ('', '123','SR2', '1'),
-- ('', 'yahyamahen', 'TB1', '1'),
-- ('', 'yahyamahen','QR3', '1');
-- SELECT * FROM trolley;
-- DELETE FROM trolley;

-- SELECT * FROM pemesanan;
-- DELETE FROM pemesanan;
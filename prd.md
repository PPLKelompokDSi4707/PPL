# Proposal Pengembangan Produk
## Green Tour Indonesia

**Disusun oleh:**
* 102022300036 - Raka Yudhistira
* 102022300314 - Rafi Agustian Pratama
* 102022300369 - Raiyan Faizan Sadina
* 102022330413 - Siti Aulia Rahman
* 102022300326 – M.Alvi Choirudin
* 102022330184 - M.Kheisar Katsmara Chendu
* 102022300245 - Meisya Ayu SashiPramesuari

**Tanggal:** 31 Maret 2026

---

## Daftar Isi
1. Pendahuluan
   1.1 Latar Belakang
   1.2 Tujuan
   1.3 Output
2. Deskripsi Produk
   2.1 Usulan Solusi
   2.2 Deskripsi Produk
   2.3 Proses Bisnis
3. Kebutuhan Sistem
   3.1 Kebutuhan Fungsional
       3.1.1 Daftar Kebutuhan
       3.1.2 Karakteristik Pengguna
   3.2 Kebutuhan Non Fungsional
   3.3 Kebutuhan Teknis
4. Rancangan Sistem
   4.1 Use Case Diagram
   4.2 Arsitektur Sistem
   4.3 Rancangan ERD
   4.4 Class Diagram
   4.5 Mockup
5. Metode Pengembangan
   5.1 Jadwal Pengembangan
   5.2 Tim Pengembang

---

## 1. Pendahuluan

### 1.1 Latar Belakang
Indonesia merupakan negara dengan potensi pariwisata yang sangat besar, baik dari sektor alam, laut, maupun keanekaragaman hayati. Namun, perkembangan sektor pariwisata yang pesat tidak selalu diimbangi dengan pengelolaan lingkungan yang baik. Banyak destinasi wisata yang mengalami penurunan kualitas lingkungan, seperti pencemaran, kerusakan ekosistem laut, hingga degradasi hutan akibat aktivitas wisata yang tidak terkontrol. Kondisi ini menunjukkan bahwa masih rendahnya kesadaran masyarakat dan wisatawan terhadap pentingnya menjaga keberlanjutan lingkungan. 

Selain itu, informasi terkait kondisi lingkungan suatu destinasi wisata juga masih terbatas dan sulit diakses secara praktis. Wisatawan umumnya hanya mendapatkan informasi mengenai keindahan tempat wisata tanpa mengetahui apakah lokasi tersebut ramah lingkungan atau justru sedang mengalami kerusakan ekosistem. Hal ini menyebabkan keputusan wisata yang diambil belum mempertimbangkan aspek keberlanjutan. 

Permasalahan tersebut perlu segera diselesaikan karena jika dibiarkan, akan berdampak pada kerusakan lingkungan yang semakin parah dan mengancam keberlangsungan sektor pariwisata itu sendiri. Pariwisata yang tidak berkelanjutan tidak hanya merusak alam, tetapi juga dapat menurunkan daya tarik wisata Indonesia di masa depan serta merugikan masyarakat lokal yang bergantung pada sektor tersebut. Sejalan dengan hal tersebut, isu ini berkaitan erat dengan tujuan pembangunan berkelanjutan atau Sustainable Development Goals (SDGs), khususnya SDG 13 (Penanganan Perubahan Iklim), SDG 14 (Ekosistem Laut), dan SDG 15 (Ekosistem Darat). Ketiga poin ini menekankan pentingnya menjaga keseimbangan lingkungan serta mendorong pemanfaatan sumber daya alam secara bijak dan berkelanjutan. 

Untuk mengatasi permasalahan tersebut, diperlukan sebuah solusi berbasis teknologi yang mampu memberikan informasi wisata sekaligus kondisi lingkungan secara terintegrasi. Oleh karena itu, dikembangkan aplikasi GreenTour Indonesia, yaitu aplikasi pariwisata berbasis Geographic Information System (GIS) yang menampilkan lokasi wisata dalam bentuk peta interaktif serta menyediakan informasi terkait kondisi iklim dan status ekosistem di setiap destinasi. Dengan adanya aplikasi ini, diharapkan pengguna dapat membuat keputusan wisata yang lebih bijak dan ramah lingkungan, sehingga turut berkontribusi dalam menjaga kelestarian alam serta mendukung pembangunan berkelanjutan di Indonesia.

### 1.2 Tujuan
Tujuan dari pengembangan produk Green Tour Indonesia adalah sebagai berikut:
1. Membangun aplikasi web berbasis Geographic Information System (GIS) yang memetakan destinasi ekowisata di Indonesia secara interaktif dan mudah diakses.
2. Mengintegrasikan data indikator lingkungan secara real-time, seperti kondisi iklim cuaca (SDG 13) serta status keamanan ekosistem darat dan laut (SDG 14 & 15) sebagai informasi pendukung bagi wisatawan.
3. Menciptakan sistem rekomendasi cerdas yang mampu mengarahkan wisatawan ke destinasi alternatif apabila lokasi tujuan utama sedang dalam kondisi rentan atau tidak aman secara ekologis.
4. Mendukung pembangunan pariwisata berkelanjutan dengan menyediakan platform evaluasi dan ulasan yang berfokus pada tingkat ramah lingkungan suatu destinasi.

### 1.3 Output
Berdasarkan latar belakang dan tujuan yang telah dijelaskan, maka permasalahan yang ingin diselesaikan dalam pengembangan aplikasi Green Tour Indonesia dapat dirumuskan sebagai berikut:
1. Bagaimana merancang sebuah sistem informasi berbasis web yang mampu menyajikan data destinasi wisata secara interaktif melalui pendekatan Geographic Information System (GIS)?
2. Bagaimana menyediakan informasi kondisi lingkungan, seperti data iklim serta status ekosistem darat dan laut, yang terintegrasi dan mudah diakses oleh pengguna?
3. Bagaimana membantu wisatawan dalam mengambil keputusan perjalanan yang mempertimbangkan aspek keberlanjutan lingkungan?
4. Bagaimana mengembangkan fitur rekomendasi yang dapat mengarahkan pengguna ke destinasi alternatif yang lebih aman dan ramah lingkungan?
5. Bagaimana membangun sistem evaluasi berbasis pengguna yang menilai tingkat keberlanjutan suatu destinasi wisata?

---

## 2. Deskripsi Produk

### 2.1 Usulan Solusi
Berdasarkan permasalahan yang telah diuraikan, diperlukan suatu solusi yang mampu mengintegrasikan informasi pariwisata dengan kondisi lingkungan secara praktis dan mudah diakses. Solusi yang diusulkan adalah pengembangan sebuah sistem informasi berbasis web bernama Green Tour Indonesia, yang memanfaatkan teknologi Geographic Information System (GIS) untuk menyajikan data destinasi wisata secara interaktif dan informatif. 

GreenTour Indonesia dirancang sebagai platform yang menampilkan peta digital interaktif yang memuat berbagai lokasi wisata di Indonesia. Setiap destinasi yang ditampilkan akan dilengkapi dengan informasi terkait kondisi lingkungan, seperti status kualitas lingkungan, kondisi ekosistem, serta data iklim yang relevan. Dengan demikian, pengguna tidak hanya memperoleh informasi mengenai daya tarik wisata, tetapi juga mendapatkan gambaran mengenai keberlanjutan lingkungan di lokasi tersebut. 

Selain itu, sistem ini juga menyediakan fitur indikator wisata ramah lingkungan yang memberikan penilaian terhadap tingkat keberlanjutan suatu destinasi. Fitur ini bertujuan untuk membantu wisatawan dalam memilih lokasi wisata yang lebih bertanggung jawab terhadap lingkungan. Green Tour Indonesia juga dilengkapi dengan konten edukatif guna meningkatkan kesadaran pengguna terhadap pentingnya menjaga kelestarian alam dalam aktivitas pariwisata. 

Untuk mendukung pembaruan data yang lebih dinamis, sistem ini memungkinkan partisipasi pengguna melalui fitur ulasan dan pelaporan kondisi lingkungan di destinasi wisata. Dengan adanya fitur ini, informasi yang tersedia dapat menjadi lebih aktual dan mencerminkan kondisi lapangan secara langsung. Selain itu, sistem juga dapat memberikan rekomendasi destinasi wisata yang berkelanjutan berdasarkan preferensi pengguna. 

Permasalahan utama yang diangkat dalam latar belakang adalah terbatasnya informasi mengenai kondisi lingkungan destinasi wisata serta rendahnya kesadaran wisatawan terhadap pentingnya keberlanjutan. Hal ini berdampak pada meningkatnya kerusakan lingkungan akibat aktivitas wisata yang tidak terkontrol. Solusi yang diusulkan melalui pengembangan GreenTour Indonesia memiliki keterkaitan yang kuat dalam menjawab permasalahan tersebut. Dengan menyediakan informasi yang terintegrasi antara aspek pariwisata dan kondisi lingkungan, sistem ini mampu mengatasi keterbatasan akses informasi yang selama ini menjadi kendala bagi wisatawan. Pengguna dapat memperoleh informasi yang lebih komprehensif sebelum mengambil keputusan wisata. 

Selain itu, adanya fitur indikator ramah lingkungan dan konten edukatif berperan dalam meningkatkan kesadaran wisatawan terhadap pentingnya menjaga keberlanjutan lingkungan. Hal ini diharapkan dapat mendorong perubahan perilaku wisatawan menjadi lebih bertanggung jawab. Lebih lanjut, sistem rekomendasi yang berfokus pada destinasi berkelanjutan dapat membantu mengarahkan preferensi wisatawan ke lokasi yang lebih siap secara lingkungan, sehingga dapat mengurangi tekanan terhadap destinasi yang rentan mengalami kerusakan. Dengan demikian, solusi ini tidak hanya memberikan manfaat bagi pengguna, tetapi juga berkontribusi dalam menjaga kelestarian lingkungan dan mendukung pembangunan pariwisata berkelanjutan di Indonesia.

### 2.2 Deskripsi Produk
Green Tour Indonesia merupakan sebuah aplikasi pariwisata berbasis Geographic Information System (GIS) yang dirancang secara khusus untuk memfasilitasi wisatawan dalam menemukan dan merencanakan perjalanan ke destinasi wisata ramah lingkungan di Indonesia. Aplikasi ini hadir sebagai solusi teknologi terintegrasi yang tidak hanya mempromosikan pariwisata, tetapi juga berfokus pada pelestarian alam yang sejalan dengan Sustainable Development Goals (SDG), khususnya SDG 13 (Penanganan Perubahan Iklim), SDG 14 (Ekosistem Laut), dan SDG 15 (Ekosistem Darat).

**1. Fungsi Utama**
Sistem ini dilengkapi dengan berbagai fitur fungsional dengan skala kompleksitas menengah untuk mendukung proses bisnis utama, antara lain:
* **Pemetaan Destinasi Interaktif (GIS):** Memanfaatkan Leaflet atau Google Maps API untuk merender peta spasial secara otomatis, di mana pengguna dapat mencari, memfilter, dan melihat titik koordinat destinasi wisata di berbagai wilayah Indonesia.
* **Pengecekan Kondisi Lingkungan Otomatis:** Sistem backend akan memproses dan menarik data dari API eksternal secara paralel untuk menampilkan indikator lingkungan suatu destinasi. Ini mencakup pengecekan kondisi iklim/cuaca (mendukung SDG 13) dan status keamanan ekosistem darat maupun laut di daerah tersebut (mendukung SDG 14 & 15).
* **Sistem Evaluasi dan Rekomendasi Pintar:** Aplikasi tidak sekadar menampilkan data, tetapi mampu mengevaluasi kelayakan suatu lokasi. Apabila suatu destinasi dinilai tidak aman (misal: cuaca ekstrem atau ekosistem sedang rentan), sistem akan secara otomatis memberikan rekomendasi destinasi alternatif yang lebih aman dan berkelanjutan.
* **Ulasan Berbasis Keberlanjutan (Review & Rating):** Pengguna dapat memberikan penilaian dan ulasan riil terkait seberapa ramah lingkungan sebuah destinasi setelah mereka berkunjung.
* **Dashboard Monitoring Terintegrasi:** Fitur khusus bagi admin untuk mengelola manajemen basis data destinasi, memantau statistik pengguna, serta memvisualisasikan data lingkungan melalui grafik yang kompleks dari berbagai tabel yang saling berelasi.

**2. Keunggulan Produk**
* **Mendorong Wisata Berkelanjutan:** Menjadi salah satu pionir aplikasi pariwisata yang menjadikan data pelestarian alam (iklim dan ekosistem) sebagai metrik utama dalam memilih tempat liburan, bukan hanya sekadar aspek keindahan visual.
* **Keputusan Berbasis Data (Data-Driven):** Wisatawan tidak perlu lagi melakukan riset manual yang memakan waktu di mesin pencari. Semua informasi valid, terpusat, dan divisualisasikan dalam satu platform.
* **Performa dan Arsitektur Modern:** Dibangun menggunakan arsitektur MVC (Model-View-Controller) monolitik dengan framework **Laravel (PHP)**, memanfaatkan **Blade template engine** di sisi frontend untuk menjamin antarmuka yang dinamis dan terintegrasi penuh dengan logika bisnis di sisi backend tanpa kompleksitas pemisahan server.

### 2.3 Proses Bisnis
Sebelum adanya aplikasi Green Tour Indonesia, wisatawan yang ingin melakukan perjalanan wisata ramah lingkungan seringkali kesulitan mendapatkan informasi yang valid dan terpusat. Berdasarkan diagram proses bisnis manual, wisatawan mencari informasi destinasi wisata melalui mesin pencari atau media sosial. Informasi yang didapatkan umumnya hanya berfokus pada keindahan visual tanpa adanya data spesifik mengenai kondisi iklim daerah tersebut atau status keamanan ekosistem. Proses riset ini memakan waktu dan seringkali membingungkan (looping pencarian jika informasi dirasa kurang). Akibatnya, wisatawan sering mengambil keputusan dengan informasi terbatas, yang dapat berujung pada kunjungan wisata yang tidak selaras dengan prinsip keberlanjutan.

Dari keseluruhan alur bisnis usulan, aktivitas yang dikomputerisasi dan berjalan di dalam sistem informasi Green Tour Indonesia meliputi:
* **Pemetaan Lokasi Terpusat:** Proses pencarian manual digantikan oleh integrasi Geographic Information System (GIS) menggunakan Leaflet/Google Maps API, di mana sistem secara otomatis merender peta interaktif untuk kemudahan visualisasi destinasi.
* **Pengecekan Data Lingkungan Otomatis:** Proses manual untuk mencari tahu kondisi alam digantikan oleh sistem backend yang memproses dan menarik data terkait peringatan cuaca (SDG 13) dan status konservasi ekosistem laut/darat (SDG 14 & 15) secara bersamaan (parallel processing) dari API eksternal.
* **Visualisasi Keputusan dan Rekomendasi:** Sistem secara langsung menyajikan hasil olahan data ke layar pengguna sebagai bahan pertimbangan yang cepat dan akurat. Jika suatu destinasi dinilai tidak aman atau rentan, sistem akan mengambil alih peran kurasi dengan memberikan rekomendasi destinasi alternatif yang lebih ramah lingkungan.

---

## 3. Kebutuhan Sistem

### 3.1 Kebutuhan Fungsional

#### 3.1.1 Daftar Kebutuhan

| ID | Kebutuhan Fungsional | Deskripsi |
| :--- | :--- | :--- |
| FR01 | Menampilkan Peta Interaktif | Sistem menampilkan peta destinasi wisata berbasis GIS, dan pengguna dapat berinteraksi dengan peta untuk melihat lokasi tertentu. |
| FR02 | Pencarian Destinasi | Pengguna memasukkan kata kunci pencarian, kemudian sistem menampilkan daftar destinasi sesuai input pengguna. |
| FR03 | Filter Berdasarkan Lingkungan | Pengguna dapat memfilter destinasi berdasarkan kondisi lingkungan (ramah/tidak ramah). |
| FR04 | Detail Informasi Destinasi | Sistem menampilkan detail destinasi meliputi deskripsi, lokasi, gambar, dan informasi lingkungan. |
| FR05 | Integrasi Data Iklim | Sistem mengambil dan menampilkan data iklim dari API eksternal secara real-time. |
| FR06 | Integrasi Data Ekosistem | Sistem mengambil data kondisi ekosistem laut/darat dari API eksternal. |
| FR07 | Analisis Kelayakan Destinasi | Sistem memproses data iklim dan ekosistem untuk menentukan tingkat kelayakan destinasi. |
| FR08 | Rekomendasi Destinasi | Sistem menganalisis data lingkungan, kemudian menampilkan rekomendasi destinasi kepada pengguna. |
| FR09 | Visualisasi Data Lingkungan | Sistem menampilkan data lingkungan dalam bentuk indikator visual. |
| FR10 | Bookmark Destinasi | Pengguna dapat menyimpan destinasi ke daftar favorit. |
| FR11 | Review dan Rating | Pengguna dapat memberikan ulasan dan rating terhadap destinasi. |
| FR12 | Manajemen Destinasi | Admin dapat menambah, mengubah, dan menghapus data destinasi. |
| FR13 | Manajemen Data Lingkungan | Admin dapat mengelola data lingkungan destinasi. |
| FR14 | Dashboard Monitoring | Admin dapat melihat statistik data pengguna dan destinasi. |
| FR15 | Notifikasi Lingkungan | Sistem memberikan notifikasi terkait kondisi lingkungan. |
| FR16 | Upload Media | Pengguna atau admin dapat mengunggah gambar destinasi. |

#### 3.1.2 Karakteristik Pengguna

| Kategori Pengguna | Deskripsi | Hak Akses |
| :--- | :--- | :--- |
| Wisatawan | Pengguna yang mencari informasi destinasi wisata dan kondisi lingkungan berbasis GIS | Melihat peta, mencari destinasi, melihat informasi lingkungan, memberikan review, menyimpan favorit |
| Admin | Pengelola data destinasi dan lingkungan | Menambah, Mengubah, Dan Menghapus data destinasi serta data lingkungan |
| Super Admin | Pengelola sistem keseluruhan | Mengelola seluruh data, Monitor sistem serta mengatur pengguna |

*Tabel 1 Karakteristik Pengguna*

### 3.2 Kebutuhan Non Fungsional

| ID | Kebutuhan Non Fungsional | Deskripsi |
| :--- | :--- | :--- |
| NFR01 | Kinerja Sistem | Sistem mampu memuat halaman dan peta dalam waktu maksimal 3 detik pada koneksi normal. |
| NFR02 | Keamanan | Sistem menggunakan autentikasi login dan enkripsi data pengguna untuk mencegah akses tidak sah. |
| NFR03 | Ketersediaan | Sistem dapat diakses selama 24 jam (24/7) dengan tingkat downtime minimal. |
| NFR04 | Skalabilitas | Sistem mampu menangani minimal 100 pengguna secara bersamaan tanpa penurunan performa signifikan. |
| NFR05 | Usability | Sistem memiliki tampilan yang user-friendly dan mudah dipahami oleh pengguna umum. |
| NFR06 | Kompatibilitas | Sistem dapat berjalan pada browser modern seperti Chrome, Edge, dan Firefox. |
| NFR07 | Integrasi API | Sistem mampu terhubung dan mengambil data dari API eksternal secara real-time. |
| NFR08 | Reliability | Sistem tetap dapat berjalan meskipun terjadi kegagalan sementara pada API eksternal. |
| NFR09 | Maintainability | Sistem memiliki struktur kode yang modular (MVC) sehingga mudah dikembangkan. |
| NFR10 | Backup Data | Sistem melakukan backup data secara berkala minimal 1 kali dalam 24 jam. |
| NFR11 | Responsivitas | Sistem dapat diakses dengan baik pada perangkat desktop maupun mobile. |
| NFR12 | Akurasi Data | Data lingkungan yang ditampilkan sesuai dengan sumber API yang digunakan. |

### 3.3 Kebutuhan Teknis
Pengembangan aplikasi GreenTour Indonesia membutuhkan serangkaian teknologi yang terdiri dari bahasa pemrograman, basis data, platform pihak ketiga, serta perangkat keras pendukung. Aplikasi ini dibangun berbasis web menggunakan arsitektur Monolitik MVC (Model-View-Controller) dengan framework Laravel, beserta sistem manajemen proyek dan kolaborasi yang terintegrasi. Berikut adalah rincian kebutuhan teknis yang akan digunakan dalam pengembangan sistem:

| ID | Kebutuhan Teknis | Deskripsi |
| :--- | :--- | :--- |
| TK-01 | Framework Frontend & UI | Menggunakan **Laravel Blade Template Engine** (dikombinasikan dengan Tailwind CSS / Bootstrap) untuk membangun antarmuka pengguna (User Interface) yang interaktif, responsif, dan dinamis. |
| TK-02 | Framework Backend & Logika Inti | Menggunakan bahasa PHP dengan framework **Laravel** untuk mengelola logika bisnis (Controller), model data (Model), sistem routing web/API, dan menangani sistem keamanan atau autentikasi aplikasi. |
| TK-03 | Sistem Basis Data (Database) | Menggunakan **MySQL** sebagai sistem manajemen basis data relasional (RDBMS) untuk menyimpan data pengguna, detail destinasi wisata, serta log data lingkungan. |
| TK-04 | API Geographic Information System (GIS) | Mengintegrasikan layanan **Leaflet.js** atau Google Maps API ke dalam tampilan Blade untuk menampilkan peta spasial secara interaktif dan memetakan titik lokasi (koordinat) destinasi wisata ramah lingkungan. |
| TK-05 | Local Web Server | Menggunakan XAMPP, Laragon, atau Laravel Herd sebagai server lokal (localhost) untuk menjalankan database MySQL dan PHP secara offline selama proses pengembangan. |
| TK-06 | API Testing & Debugging | Menggunakan Postman untuk menguji dan memastikan bahwa endpoint API (termasuk API cuaca dan lingkungan dari pihak ketiga) merespons permintaan data dengan benar dan efisien. |
| TK-07 | Version Control System | Menggunakan Git dan GitHub sebagai repositori sumber kode (source code) agar tim pengembang dapat berkolaborasi, melacak perubahan kode, dan meminimalisir konflik saat integrasi. |
| TK-08 | Manajemen Proyek & Agile | Menggunakan Jira / Trello untuk melacak tugas, manajemen Product Backlog Item (PBI), dan memonitor timeline Sprint bagi setiap anggota tim pengembang. |
| TK-09 | Desain & Prototyping | Menggunakan Figma untuk membuat sketsa UI (mockup) dan prototipe aplikasi guna memastikan User Experience (UX) sebelum tahapan penulisan kode (coding) dimulai. |
| TK-10 | Tools Pemodelan Sistem | Menggunakan Visual Paradigm atau draw.io untuk merancang kebutuhan perangkat lunak melalui diagram UML (seperti Use Case dan Class Diagram) serta arsitektur sistem. |
| TK-11 | Integrated Development Environment (IDE) | Menggunakan Visual Studio Code sebagai teks editor utama untuk menulis skrip program (kode) PHP, HTML, CSS, dan JavaScript. |
| TK-12 | Perangkat Keras (Hardware) Pengembang | Perangkat komputer (PC) atau Laptop dengan spesifikasi minimum: RAM 8GB, prosesor setara Intel Core i3 / AMD Ryzen 3, dan penyimpanan SSD, guna menjalankan server lokal dan aplikasi secara lancar. |

---

## 4. Rancangan Sistem

### 4.1 Use Case Diagram

#### 4.1.1 Daftar Aktor
Berdasarkan karakteristik pengguna sistem, terdapat 3 (tiga) aktor utama:
1. **Wisatawan**: Pengguna umum/terdaftar yang berinteraksi dengan peta untuk mencari destinasi dan informasi lingkungan.
2. **Admin**: Pengelola operasional yang bertanggung jawab atas data destinasi wisata dan data lingkungan spesifik.
3. **Super Admin**: Pengelola tingkat atas yang memiliki akses penuh ke seluruh sistem, termasuk manajemen pengguna dan monitoring dashboard.

#### Daftar Skenario Use Case

**1. Skenario UC01 (FR01): Menampilkan Peta Interaktif**
* **Kebutuhan:** FR01 - Menampilkan Peta Interaktif
* **Aktor:** Wisatawan
* **Skenario Utama:** 1. Aktor membuka menu "Peta Wisata".
    2. Sistem memuat modul GIS (Geographic Information System).
    3. Sistem menampilkan peta destinasi wisata beserta titik-titik lokasi (marker).
    4. Aktor berinteraksi dengan peta (menggeser atau memperbesar) untuk melihat lokasi tertentu.

**2. Skenario UC02 (FR02): Pencarian Destinasi**
* **Kebutuhan:** FR02 - Pencarian Destinasi
* **Aktor:** Wisatawan
* **Skenario Utama:** 1. Aktor memasukkan kata kunci pada kolom pencarian.
    2. Aktor menekan tombol "Cari".
    3. Sistem mencocokkan kata kunci dengan basis data destinasi.
    4. Sistem menampilkan daftar destinasi sesuai dengan input pengguna.

**3. Skenario UC03 (FR03): Filter Berdasarkan Lingkungan**
* **Kebutuhan:** FR03 - Filter Berdasarkan Lingkungan
* **Aktor:** Wisatawan
* **Skenario Utama:** 1. Aktor membuka menu filter pada halaman pencarian/peta.
    2. Aktor memilih filter kondisi lingkungan (contoh: ramah lingkungan).
    3. Sistem menerapkan filter pada data yang ditampilkan.
    4. Sistem menampilkan daftar/peta destinasi yang hanya sesuai dengan filter tersebut.

**4. Skenario UC04 (FR04): Detail Informasi Destinasi**
* **Kebutuhan:** FR04 - Detail Informasi Destinasi
* **Aktor:** Wisatawan
* **Skenario Utama:** 1. Aktor mengklik nama atau ikon destinasi.
    2. Sistem mengambil data detail dari database.
    3. Sistem menampilkan halaman baru yang memuat deskripsi, lokasi, gambar, dan informasi lingkungan.

**5. Skenario UC05 (FR05): Integrasi Data Iklim**
* **Kebutuhan:** FR05 - Integrasi Data Iklim
* **Aktor:** Sistem
* **Skenario Utama:** 1. Sistem menerima titik koordinat lokasi destinasi.
    2. Sistem melakukan request ke API cuaca/iklim eksternal (misal: BMKG).
    3. API memberikan respons data secara real-time.
    4. Sistem menampilkan data iklim tersebut pada antarmuka aplikasi.

**6. Skenario UC06 (FR06): Integrasi Data Ekosistem**
* **Kebutuhan:** FR06 - Integrasi Data Ekosistem
* **Aktor:** Sistem
* **Skenario Utama:** 1. Sistem menerima titik koordinat lokasi destinasi.
    2. Sistem melakukan request ke API lingkungan eksternal (misal: Overpass API).
    3. Sistem mengambil data kondisi ekosistem laut atau darat dari API tersebut.
    4. Sistem meneruskan data untuk ditampilkan.

**7. Skenario UC07 (FR07): Analisis Kelayakan Destinasi**
* **Kebutuhan:** FR07 - Analisis Kelayakan Destinasi
* **Aktor:** Sistem
* **Skenario Utama:** 1. Sistem mengumpulkan metrik data iklim dan data ekosistem yang baru ditarik.
    2. Sistem memproses data tersebut menggunakan algoritma kelayakan lingkungan di sisi Controller.
    3. Sistem menetapkan tingkat/status kelayakan destinasi (misal: Aman, Waspada, Bahaya).

**8. Skenario UC08 (FR08): Rekomendasi Destinasi**
* **Kebutuhan:** FR08 - Rekomendasi Destinasi
* **Aktor:** Wisatawan
* **Skenario Utama:** 1. Sistem menganalisis data lingkungan yang telah diproses.
    2. Sistem menyeleksi destinasi dengan skor kelayakan terbaik.
    3. Sistem menampilkan daftar rekomendasi destinasi ramah lingkungan kepada pengguna.

**9. Skenario UC09 (FR09): Visualisasi Data Lingkungan**
* **Kebutuhan:** FR09 - Visualisasi Data Lingkungan
* **Aktor:** Wisatawan
* **Skenario Utama:** 1. Sistem memuat halaman detail wisata.
    2. Sistem merender data lingkungan (iklim/ekosistem) menjadi elemen grafis menggunakan Blade.
    3. Sistem menampilkan data lingkungan tersebut dalam bentuk indikator visual kepada pengguna.

**10. Skenario UC10 (FR10): Bookmark Destinasi**
* **Kebutuhan:** FR10 - Bookmark Destinasi
* **Aktor:** Wisatawan
* **Skenario Utama:** 1. Aktor menekan tombol simpan pada destinasi yang dipilih.
    2. Sistem memvalidasi status autentikasi pengguna.
    3. Sistem menyimpan destinasi tersebut ke daftar favorit pengguna di basis data.
    4. Sistem memberikan konfirmasi bahwa data berhasil disimpan.

**11. Skenario UC11 (FR11): Review dan Rating**
* **Kebutuhan:** FR11 - Review dan Rating
* **Aktor:** Wisatawan
* **Skenario Utama:** 1. Aktor memilih opsi untuk memberikan ulasan.
    2. Aktor memberikan rating (penilaian) dan menulis teks ulasan terkait destinasi.
    3. Aktor menekan tombol kirim.
    4. Sistem menyimpan ulasan tersebut dan memperbarui rata-rata rating destinasi secara otomatis.

**12. Skenario UC12 (FR12): Manajemen Destinasi**
* **Kebutuhan:** FR12 - Manajemen Destinasi
* **Aktor:** Admin
* **Skenario Utama:** 1. Aktor membuka menu manajemen destinasi.
    2. Aktor memilih aksi untuk menambah, mengubah, atau menghapus data destinasi.
    3. Aktor mengisi formulir data (nama, koordinat GIS, deskripsi) dan menekan tombol simpan.
    4. Sistem memvalidasi input dan memperbarui basis data destinasi.

**13. Skenario UC13 (FR13): Manajemen Data Lingkungan**
* **Kebutuhan:** FR13 - Manajemen Data Lingkungan
* **Aktor:** Admin
* **Skenario Utama:** 1. Aktor masuk ke menu "Manajemen Data Lingkungan".
    2. Aktor memilih destinasi tertentu untuk dikelola data lingkungannya.
    3. Aktor menginputkan data atau anotasi terkait status lingkungan (seperti tingkat polusi atau risiko kebakaran).
    4. Sistem memproses data dan menyimpannya ke dalam basis data.

**14. Skenario UC14 (FR14): Dashboard Monitoring**
* **Kebutuhan:** FR14 - Dashboard Monitoring
* **Aktor:** Admin
* **Skenario Utama:** 1. Aktor memilih menu "Dashboard".
    2. Sistem mengambil data statistik dari tabel pengguna dan destinasi.
    3. Sistem menampilkan visualisasi berupa grafik atau tabel statistik kepada aktor.

**15. Skenario UC15 (FR15): Notifikasi Lingkungan**
* **Kebutuhan:** FR15 - Notifikasi Lingkungan
* **Aktor:** Sistem/Wisatawan
* **Skenario Utama:** 1. Sistem melakukan pengecekan data cuaca atau ekosistem secara berkala.
    2. Sistem mendeteksi adanya status bahaya atau kondisi tidak ramah lingkungan.
    3. Sistem mengirimkan notifikasi kepada pengguna terkait kondisi tersebut.

**16. Skenario UC16 (FR16): Upload Media**
* **Kebutuhan:** FR16 - Upload Media
* **Aktor:** Wisatawan/ Admin
* **Skenario Utama:** 1. Aktor menekan tombol "Unggah Media/Gambar".
    2. Aktor memilih file gambar dari perangkat lokal.
    3. Sistem melakukan validasi format dan ukuran file.
    4. Sistem mengunggah file ke penyimpanan lokal/cloud dan menghubungkannya dengan data destinasi di database.

### 4.2 Arsitektur Sistem
Arsitektur sistem yang digunakan dalam pengembangan Green Tour Indonesia adalah arsitektur **Monolitik berbasis MVC (Model-View-Controller)** menggunakan framework **Laravel**. Arsitektur ini dipilih karena menyatukan proses antarmuka pengguna dan logika bisnis dalam satu lingkungan yang saling terintegrasi, sehingga memudahkan dalam pengembangan cepat, pemeliharaan, serta skalabilitas aplikasi tanpa perlu mengelola dua server terpisah.

Secara umum, alur kerja sistem dimulai dari pengguna yang mengakses aplikasi melalui browser web. Permintaan dari pengguna akan diproses oleh sistem routing Laravel, yang kemudian diarahkan ke **Controller** yang bersesuaian. Controller akan mengeksekusi logika bisnis, memproses data, serta melakukan integrasi dengan API eksternal (seperti mengambil data cuaca BMKG dan status ekosistem Overpass). Selanjutnya, Controller berinteraksi dengan **Model** untuk mengambil atau menyimpan data ke database (MySQL), dan akhirnya meneruskan hasil pemrosesan tersebut ke **View** (Laravel Blade) untuk dirender menjadi halaman web (HTML/CSS/JS) yang utuh kepada pengguna.

**Komponen Arsitektur:**
1.  **View (Presentation Layer):**
    Lapisan ini dibangun menggunakan Laravel Blade Template Engine yang berfungsi sebagai antarmuka pengguna. View bertanggung jawab dalam menampilkan peta interaktif (menggunakan Leaflet/Google Maps API di sisi klien), halaman detail destinasi, serta visualisasi data lingkungan. 
2.  **Controller (Application Layer):**
    Komponen ini berfungsi sebagai pusat logika bisnis aplikasi. Controller bertugas menerima request, memproses analisis kelayakan destinasi, mengelola autentikasi pengguna, dan mengintegrasikan data dari API eksternal secara asinkron.
3.  **Model & Database (Data Layer):**
    Model merepresentasikan struktur data aplikasi yang terhubung langsung dengan database MySQL. Komponen ini digunakan untuk menyimpan dan mengambil data pengguna, data destinasi wisata, data lingkungan, serta data ulasan dan rating melalui fitur Eloquent ORM Laravel.
4.  **External API Integration:**
    Sistem Controller terhubung dengan layanan API pihak ketiga untuk memperoleh data secara real-time, seperti: API cuaca/iklim dan API kondisi ekosistem. Data ini akan diproses oleh server backend sebelum ditampilkan melalui Blade View.

### 4.3 Rancangan ERD
Entity Relationship Diagram (ERD) pada sistem GreenTour Indonesia dirancang untuk mendukung seluruh kebutuhan fungsional sistem yang telah didefinisikan, mulai dari autentikasi pengguna hingga analisis kondisi lingkungan destinasi wisata.
* Entitas `users` digunakan untuk mengelola data pengguna, baik wisatawan maupun admin, yang dapat melakukan proses autentikasi seperti registrasi dan login sesuai dengan kebutuhan KF-01.
* Entitas `destinations` menyimpan informasi utama terkait lokasi wisata, termasuk nama, deskripsi, kategori, serta koordinat geografis yang digunakan dalam visualisasi peta interaktif berbasis GIS serta fitur pencarian dan filter.
* Entitas `environmental_data` berfungsi untuk menyimpan data kondisi lingkungan, seperti cuaca, suhu, dan status ekosistem. Data ini mendukung fitur pemantauan iklim dan indikator kesehatan lingkungan. Selain itu, entitas ini juga memungkinkan admin untuk melakukan pembaruan manual terhadap kondisi lingkungan jika diperlukan.
* Entitas `reviews` digunakan untuk menyimpan ulasan dan penilaian dari pengguna terhadap suatu destinasi, yang dapat menjadi indikator tambahan dalam menilai keberlanjutan lokasi wisata.
* Entitas `bookmarks` memungkinkan pengguna menyimpan destinasi favorit sebagai bagian dari pengalaman pengguna.
* Entitas `recommendations` digunakan untuk menyimpan hasil analisis sistem dalam memberikan rekomendasi destinasi alternatif, terutama ketika suatu lokasi memiliki kondisi lingkungan yang kurang aman.

Relasi antar entitas dirancang dengan pendekatan one-to-many, di mana satu pengguna dapat memiliki banyak ulasan dan bookmark, serta satu destinasi dapat memiliki banyak data lingkungan dan ulasan. Struktur ini mendukung integrasi data yang efisien dan memungkinkan sistem berjalan sesuai dengan kebutuhan fungsional yang telah ditentukan.

### 4.4 Class Diagram
Rancangan Class Diagram untuk sistem GreenTour Indonesia secara terstruktur menggambarkan organisasi entitas data dan logika bisnis pariwisata berkelanjutan yang saling terintegrasi. Pada level tertinggi, sistem ini menggunakan prinsip pewarisan (inheritance) di mana Class User berfungsi sebagai induk (superclass) yang menyediakan atribut dasar seperti identitas dan kredensial akses (email, password), serta metode autentikasi dasar untuk dua entitas di bawahnya. Class Wisatawan dan Class Admin kemudian mewarisi sifat-sifat tersebut namun memiliki spesialisasi tugas yang berbeda; Wisatawan berfokus pada aktivitas eksplorasi destinasi dan interaksi mandiri, sementara Admin memiliki hak akses khusus untuk pengelolaan basis data destinasi, pemantauan statistik, dan pembaruan data sistem. 

Interaksi utama dalam aplikasi ini dikelola melalui relasi asosiasi antara Class Wisatawan dengan tiga class pendukung, yaitu Reviews, Bookmarks, dan Recommendations. Class Wisatawan dapat menyimpan destinasi favorit, memberikan ulasan riil terkait keberlanjutan suatu tempat, serta menerima rekomendasi alternatif wisata yang tercatat secara sistematis. Terdapat pula hubungan komposisi (composition) yang sangat kuat antara class Destinations dengan class Environmental_Data, Reviews, dan Bookmarks. Hubungan ini menunjukkan bahwa data indikator lingkungan (seperti cuaca dan status ekosistem) serta interaksi pengguna merupakan bagian yang tidak terpisahkan dari eksistensi suatu lokasi wisata. Struktur ini memastikan bahwa setiap siklus data dapat dilacak dengan akurasi tinggi dan menjaga integritas data (referential integrity) di dalam database sesuai rancangan yang Anda buat. 

Dari sisi kecerdasan sistem dan keandalan informasi, Class Recommendations memiliki dependensi logis yang kuat terhadap data dari Class Environmental_Data untuk menjalankan algoritma evaluasi kelayakan wisata. Selain itu, Class Admin memegang peran sentral sebagai pihak yang mengawasi validitas data dengan memiliki wewenang untuk memperbarui data lingkungan secara manual jika terjadi anomali pada API eksternal. Secara keseluruhan, struktur Class Diagram ini telah memenuhi seluruh kebutuhan fungsional dan non-fungsional proposal Anda, menjamin sistem yang aman, dinamis, dan terstruktur dengan baik untuk mendukung kampanye pariwisata yang selaras dengan nilai-nilai SDGs.

### 4.5 Mockup

**a. Registrasi/Daftar untuk pengguna dan Login untuk admin dan pengguna**
Mockup ini menunjukkan tampilan halaman registrasi untuk pengguna pada aplikasi. Halaman ini digunakan untuk pengguna yang ingin membuat akun baru. Terdapat beberapa kolom yang perlu diisi, yaitu nama lengkap, email, dan password. Setelah itu, pengguna dapat menekan tombol "Daftar" untuk melanjutkan proses pendaftaran. Desain dibuat simpel dan jelas, dengan warna hijau sebagai identitas aplikasi yang berkaitan dengan tema lingkungan. Di bagian bawah juga tersedia pilihan "Masuk" untuk pengguna yang sudah memiliki akun. 
Halaman Login Admin dan Pengguna digunakan untuk masuk ke dalam sistem. Admin dapat login dengan memasukkan email dan password yang telah ditentukan, kemudian menekan tombol "Masuk" untuk mengakses halaman pengelolaan aplikasi. Sementara itu, proses login untuk pengguna pada dasarnya sama, yaitu dengan memasukkan email dan password yang sudah didaftarkan sebelumnya.

**b. Pencarian dan Filter Destinasi**
Pada halaman pencarian destinasi pada aplikasi, halaman ini digunakan oleh pengguna untuk mencari tempat wisata berdasarkan nama atau daerah. Terdapat fitur filter pencarian seperti status dan wilayah untuk mempermudah pengguna dalam menemukan destinasi yang diinginkan. Selain itu, pengguna juga dapat memilih kategori seperti semua, darat, atau laut. Hasil pencarian ditampilkan dalam bentuk daftar destinasi yang dilengkapi dengan informasi singkat, seperti lokasi, kondisi lingkungan, dan kategori wisata.

**c. Detail Informasi Destinasi**
Halaman ini berisi informasi lengkap seperti nama dan lokasi wisata, deskripsi singkat, serta status keamanan lingkungan. Selain itu, ditampilkan juga informasi cuaca dan kondisi ekosistem, seperti tingkat polusi dan kondisi terumbu karang. Informasi ini membantu pengguna dalam memilih destinasi wisata yang ramah lingkungan.

**d. Peta Interaktif**
Peta Interaktif ini digunakan untuk menunjukkan lokasi destinasi wisata di berbagai wilayah Indonesia. Pengguna dapat melihat titik-titik lokasi wisata dan memilih salah satu untuk mendapatkan informasi lebih lanjut. Fitur ini memudahkan pengguna dalam mencari dan menjelajahi destinasi secara visual.

**e. Rekomendasi Destinasi**
Rekomendasi ditampilkan dalam bentuk daftar destinasi dengan informasi singkat, seperti nama tempat, lokasi, dan kondisi lingkungan. Fitur ini membantu pengguna dalam menemukan wisata yang sesuai dan ramah lingkungan dengan lebih mudah.

**f. Visualisasi Data Lingkungan**
Halaman ini digunakan untuk menyajikan informasi kondisi lingkungan dalam bentuk data yang lebih mudah dipahami. Informasi yang ditampilkan dapat berupa tingkat polusi, dll.

**g. Bookmark/Favorite Destinasi**
Fitur ini digunakan untuk menyimpan destinasi wisata yang diminati oleh pengguna. Destinasi yang telah disimpan dapat diakses kembali dengan mudah oleh pengguna. Fitur ini membantu pengguna dalam mengingat dan merencanakan kunjungan ke tempat wisata yang diinginkan.

**h. Review dan Rating**
Pengguna dapat memberikan rating serta menuliskan pengalaman mereka setelah berkunjung. Fitur ini membantu pengguna lain dalam memilih destinasi berdasarkan penilaian dan pengalaman yang telah dibagikan.

**i. Notifikasi Lingkungan**
Notifikasi dapat berupa perubahan cuaca, tingkat polusi, dll. Fitur ini membantu pengguna tetap mendapatkan informasi terbaru sebelum mengunjungi suatu tempat wisata.

**j. Dashboard Monitoring**
Dashboard menampilkan ringkasan informasi seperti keamanan destinasi, kondisi lingkungan, serta data lainnya secara singkat. Fitur ini membantu admin dalam mengelola dan memantau sistem dengan lebih mudah.

**k. Data Destinasi & Manajemen Data Lingkungan**
Admin dapat menambah, mengubah, dan menghapus data destinasi, termasuk informasi lokasi, deskripsi, dan kondisi lingkungan. Fitur ini membantu admin dalam menjaga data tetap terupdate dan akurat. Halaman ini juga digunakan oleh admin untuk mengelola data kondisi lingkungan pada setiap destinasi secara manual jika diperlukan (misal untuk tingkat polusi dan peringatan bahaya/cuaca).

---

## 5. Metode Pengembangan
Metode pengembangan yang digunakan adalah Agile dengan pendekatan Scrum, di mana proses pengembangan dibagi ke dalam beberapa sprint yang berfokus pada penyelesaian Product Backlog Item (PBI).

### 5.1 Jadwal Pengembangan
Berikut adalah rencana timeline pengembangan sistem GreenTour Indonesia:

| Sprint | Durasi | Fokus Pengembangan | Product Backlog Item (PBI) |
| :--- | :--- | :--- | :--- |
| Sprint 1 | 1 Minggu | Perencanaan & Analisis | Penyusunan product backlog, analisis kebutuhan fungsional & non-fungsional, pembuatan use case diagram, perancangan arsitektur sistem, pembuatan mockup awal. |
| Sprint 2 | 2 Minggu | Backend & Database Development | Setup Laravel, pembuatan database MySQL, migrasi data, implementasi autentikasi (Breeze/UI), CRUD data destinasi (Model & Controller), CRUD data pengguna. |
| Sprint 3 | 2 Minggu | Frontend Development (Blade) | Setup template tampilan menggunakan Laravel Blade, pembuatan halaman utama, implementasi peta interaktif (Leaflet.js), fitur pencarian dan filter destinasi, halaman detail destinasi. |
| Sprint 4 | 2 Minggu | Integrasi API & Data Lingkungan | Pemrosesan di Controller untuk integrasi API cuaca, integrasi API ekosistem, visualisasi data lingkungan ke View, analisis kelayakan destinasi, notifikasi kondisi lingkungan. |
| Sprint 5 | 1 Minggu | Fitur Lanjutan | Implementasi review & rating, fitur bookmark, sistem rekomendasi destinasi, dashboard admin. |
| Sprint 6 | 1 Minggu | Testing & Deployment | Pengujian sistem (testing), perbaikan bug, optimasi performa, deployment sistem, dokumentasi. |

### 5.2 Tim Pengembang
*Berikut adalah anggota tim beserta peran dan tanggung jawab masing-masing sesuai dengan PBI yang dikerjakan.*

| Nama | Peran | Tanggung Jawab PBI |
| :--- | :--- | :--- |
| Raka Yudhistira |  | FR14, FR15 |
| Rafi Agustian Pratama |  | FR12, FR13 |
| Raiyan Faizan Sadina |  | FR10, FR11 |
| Siti Aulia Rahman |  | FR08, FR09 |
| M.Alvi Choirudin |  | FR06, FR07 |
| M.Kheisar Katsmara Chendu |  | FR01, FR02 |
| Meisya Ayu Sashi Pramesuari |  | FR04, FR05 |
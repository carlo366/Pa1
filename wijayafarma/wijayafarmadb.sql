-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 12 Jun 2023 pada 10.54
-- Versi server: 8.0.30
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wijayafarmadb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `price` int NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_count` int NOT NULL DEFAULT '0',
  `product_count` int NOT NULL DEFAULT '0',
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `time`, `created_at`, `updated_at`) VALUES
(12, 'Batuk', '2023-06-09 11:46:15', NULL, '2023-05-15 22:36:13'),
(13, 'Demam', '2023-06-09 11:46:15', NULL, '2023-05-15 22:33:34'),
(14, 'Pening', '2023-06-09 11:46:15', NULL, '2023-04-23 01:04:06'),
(15, 'Influenza','2023-06-09 11:46:15', NULL, '2023-05-15 22:31:11'),
(16, 'Mulut','2023-06-09 11:46:15', NULL, '2023-05-03 00:04:54'),
(17, 'Pencernaan', '2023-06-09 11:46:15', NULL, '2023-05-15 21:12:22'),
(18, 'Flu & Batuk','2023-06-09 11:46:15', NULL, '2023-05-15 22:35:05'),
(19, 'Diare','2023-06-09 11:46:15', NULL, '2023-05-15 22:24:56'),
(20, 'Sembelit','2023-06-09 11:46:15', NULL, '2023-05-03 01:01:06'),
(21, 'Maag','2023-06-09 11:46:15', NULL, '2023-05-15 22:20:45'),
(22, 'kanker','2023-06-09 11:46:15', NULL, NULL),
(23, 'Obat Luar','2023-06-09 11:46:15', NULL, '2023-05-15 22:44:46'),
(24, 'Asam Lambung', '2023-06-09 11:46:15', NULL, '2023-05-13 09:38:45'),
(25, 'Tulang','2023-06-09 11:46:15', NULL, '2023-05-10 01:52:11'),
(26, 'Suplemen', '2023-06-09 11:46:15', NULL, '2023-05-15 21:28:32'),
(27, 'Batuk Berdahak','2023-06-09 11:46:15', NULL, '2023-05-13 09:36:45'),
(28, 'Tenggorokan','2023-06-09 11:46:15', NULL, '2023-05-13 09:49:25'),
(29, 'Berbagai Nyeri Ringan','2023-06-09 11:46:15', NULL, '2023-05-13 10:14:32'),
(30, 'Gejala Alergi','2023-06-09 11:46:15', NULL, '2023-05-13 10:24:27'),
(31, 'Ambeien','2023-06-09 11:46:15', NULL, '2023-05-15 21:16:52'),
(32, 'Anemia','2023-06-09 11:46:15', NULL, '2023-05-15 21:18:47'),
(33, 'Vitamin','2023-06-09 11:46:15', NULL, '2023-05-15 22:42:29'),
(34, 'Nyeri otot,sendi,dll','2023-06-09 11:46:15', NULL, '2023-05-15 21:38:54'),
(35, 'Anti Mual','2023-06-09 11:46:15', NULL, '2023-05-15 21:40:05'),
(36, 'Sakit Kepala', '2023-06-09 11:46:15', NULL, '2023-05-15 22:28:47'),
(37, 'Sariawan', '2023-06-09 11:46:15', NULL, '2023-05-15 21:53:01'),
(38, 'Obat Cacing','2023-06-09 11:46:15', NULL, '2023-05-15 22:32:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `deseases`
--

CREATE TABLE `deseases` (
  `id` bigint UNSIGNED NOT NULL,
  `Nama_Penyakit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Penyakit_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `deseases`
--

INSERT INTO `deseases` (`id`, `Nama_Penyakit`, `Deskripsi`, `Penyakit_img`, `slug`, `time`, `created_at`, `updated_at`) VALUES
(1, 'Demam', 'Demam merupakan kondisi terjadinya peningkatan suhu tubuh di atas 38 derajat Celsius. Umumnya, demam merupakan respons tubuh atau gejala terhadap penyakit. Suhu tubuh yang meningkat atau demam sebenarnya merupakan salah satu cara sistem kekebalan tubuh manusia untuk memerangi infeksi.', 'upload/1765383202085027.jpeg', 'demam', '2023-06-09 11:47:22', NULL, '2023-05-07 22:50:18'),
(2, 'Batuk', 'Batuk adalah tindakan refleks yang dilakukan untuk membersihkan tenggorokan dari lendir atau iritasi akibat benda asing. Namun, beberapa kondisi kesehatan juga bisa menyebabkan seseorang lebih sering untuk batuk. Sebagian besar gejala akan hilang atau setidaknya membaik secara signifikan dalam waktu dua minggu.', 'upload/1765383340823872.gif', 'batuk', '2023-06-09 11:47:22', NULL, '2023-05-07 22:52:30'),
(3, 'Influenza', 'Influenza adalah sebuah penyakit yang dapat menular dan disebabkan oleh virus. Seseorang yang terserang penyakit ini mungkin akan merasakan demam tinggi, pilek, sakit tenggorokan, nyeri otot, sakit kepala, hingga batuk. Ternyata, virus tersebut dapat berkembang sehingga menyebabkan laringitis.', 'upload/1765383218347380.jpg', 'influenza', '2023-06-09 11:47:22', NULL, '2023-05-07 22:50:34'),
(4, 'Sariawan', 'Sariawan atau dikenal sebagai sariawan adalah luka akibat iritasi pada gusi, lidah, dan lapisan dalam mulut. Luka pada sariawan berwarna putih atau kekuningan dan dikelilingi peradangan di sekitarnya. Kendati ukuran lukanya kecil, namun sariawan kerap membuat penderitanya tidak enak makan dan tidak nyaman berbicara.', 'upload/1765383231934200.jpeg', 'sariawan', '2023-06-09 11:47:22', NULL, '2023-05-07 22:50:46'),
(5, 'Batuk', 'Batuk adalah tindakan refleks yang dilakukan untuk membersihkan tenggorokan dari lendir atau iritasi akibat benda asing. Namun, beberapa kondisi kesehatan juga bisa menyebabkan seseorang lebih sering untuk batuk. Sebagian besar gejala akan hilang atau setidaknya membaik secara signifikan dalam waktu dua minggu.', 'upload/1764974641882465.jpeg', 'batuk', '2023-06-09 11:47:22', NULL, '2023-05-07 22:49:52'),
(6, 'Maag', 'Maag yang juga dikenal dengan istilah dispepsia merupakan gangguan di organ lambung yang ditandai dengan rasa nyeri atau terbakar di ulu hati, rasa penuh atau tidak nyaman setelah makan, dan rasa cepat kenyang. Kondisi ini cukup umum dialami oleh kebanyakan orang.', 'upload/1765383253200826.jpeg', 'maag', '2023-06-09 11:47:22', NULL, '2023-05-07 22:51:07'),
(7, 'Diare', 'Diare merupakan penyakit yang membuat penderitanya sering buang air besar dengan kondisi tinja encer atau cair. Pada umumnya diare terjadi akibat mengkonsumsi makanan dan minuman yang terkontaminasi virus, bakteri, atau parasit. Diare umumnya berlangsung kurang dari 14 hari (diare akut).', 'upload/1768458572164048.jpg', 'diare', '2023-06-12 08:30:16', NULL, '2023-06-11 11:31:59'),
(8, 'Malaria', 'Malaria adalah penyakit yang disebabkan oleh parasit bernama Plasmodium. Penyakit ini ditularkan melalui gigitan nyamuk yang terinfeksi parasit tersebut. Di dalam tubuh manusia, parasit Plasmodium akan berkembang biak di organ hati kemudian menginfeksi sel darah merah.', 'upload/1768458730733710.jpeg', 'malaria', '2023-06-12 08:34:31', NULL, NULL),
(9, 'Tuberkulosis', 'TBC (tuberkulosis) adalah penyakit menular dan mematikan dengan tingkat pasien tinggi yang disebabkan oleh bakteri Mycobacterium tuberculosis, TBC adalah salah satu penyakit infeksi pada paru yang penularannya disebabkan oleh droplet atau percikan ludah.', 'upload/1768458806227399.jpeg', 'tuberkulosis', '2023-06-12 08:35:43', NULL, NULL),
(10, 'Covid-19', 'Coronavirus Disease 2019 atau COVID-19 adalah penyakit baru yang dapat menyebabkan gangguan pernapasan dan radang paru. Penyakit ini disebabkan oleh infeksi Severe Acute Respiratory Syndrome Coronavirus 2 (SARS-CoV-2). Gejala klinis yang muncul beragam, mulai dari seperti gejala flu biasa (batuk, pilek, nyeri tenggorok, nyeri otot, nyeri kepala) sampai yang berkomplikasi berat (pneumonia atau sepsis).', 'upload/1768458961041297.jpeg', 'covid-19', '2023-06-12 08:38:10', NULL, NULL),
(11, 'Hipertensi', 'Tekanan Darah Tinggi (hipertensi) adalah suatu peningkatan tekanan darah di dalam arteri. Secara umum, hipertensi merupakan suatu keadaan tanpa gejala, dimana tekanan yang abnormal tinggi di dalam arteri menyebabkan meningkatnya resiko terhadap stroke, aneurisma, gagal jantung, serangan jantung dan kerusakan ginjal.', 'upload/1768459097301063.jpeg', 'hipertensi', '2023-06-12 08:40:20', NULL, NULL),
(12, 'Stroke', 'Stroke adalah kondisi yang terjadi ketika pasokan darah ke otak terputus akibat penyumbatan atau pecahnya pembuluh darah, sehingga terjadi kematian sel-sel pada sebagian area di otak. Stroke adalah kondisi kesehatan yang serius yang membutuhkan penanganan cepat.', 'upload/1768459187589497.jpg', 'stroke', '2023-06-12 08:41:46', NULL, NULL),
(13, 'Diabetes', 'Secara umum, penyakit Diabetes Melitus (DM) terjadi akibat gaya hidup tidak sehat yang menyebabkan akumulasi menumpuknya kadar gula dalam darah dan berada di atas ambang batas normal yang bersifat kronis dan jangka panjang.', 'upload/1768460877442468.jpg', 'diabetes', '2023-06-12 09:08:38', NULL, NULL),
(14, 'Cacar Air', 'Cacar air adalah infeksi virus sehingga menimbulkan rasa gatal di kulit dan ditandai dengan ruam atau bintik-bintik merah berisi cairan yang disebut lenting. Virus yang menginfeksi ini bernama virus varicella zoster (VZV) yang masih sejenis dengan virus herpes.', 'upload/1768485488846099.jpg', 'cacar air', '2023-06-12 15:39:49', NULL, NULL),
(15, 'Hepatitis', 'Penyakit hepatitis adalah peradangan hati yang disebabkan oleh virus hepatitis. Ada 5 jenis virus hepatitis: A, B, C, D, dan E. Infeksi yang akan mengganggu kerja organ hati ini dapat menular dengan mudah, melalui makanan atau minuman yang terkontaminasi virus.', 'upload/1768485627248115.jpeg', 'hepatitis', '2023-06-12 15:42:01', NULL, NULL),
(16, 'Kolera', 'Kolera adalah diare yang disebabkan oleh infeksi bakteri Vibrio cholerae. Penyakit ini dapat terjadi pada orang dewasa atau anak-anak. Diare yang timbul akibat kolera dapat parah dan sampai menyebabkan dehidrasi. Kolera merupakan penyakit yang menular melalui makanan atau minuman yang terkontaminasi bakteri.', 'upload/1768485727523558.jpeg', 'kolera', '2023-06-12 15:43:37', NULL, NULL),
(17, 'Polio', 'Polio adalah penyakit yang disebabkan oleh virus Polio. Polio dapat menyebabkan kelumpuhan permanen dan bahkan kematian akibat gagalnya/lumpuhnya sistem pernapasan. Mengapa satu kasus harus diwaspadai? Karena polio menular, berdampak besar dan panjang bagi kesehatan maka satu kasus harus diwaspadai dan sebagai ancaman.', 'upload/1768485843667501.jpeg', 'polio', '2023-06-12 15:45:28', NULL, NULL),
(18, 'HIV dan AIDS', 'HIV (human immunodeficiency virus) adalah virus yang merusak sistem kekebalan tubuh dengan menginfeksi dan menghancurkan sel CD4. Jika makin banyak sel CD4 yang hancur, daya tahan tubuh akan makin melemah sehingga rentan diserang berbagai penyakit. HIV yang tidak segera ditangani akan berkembang menjadi kondisi serius yang disebut AIDS (acquired immunodeficiency syndrome). AIDS adalah stadium akhir dari infeksi HIV. Pada tahap ini, kemampuan tubuh untuk melawan infeksi sudah hilang sepenuhnya.', 'upload/1768486058235516.png', 'hiv dan aids', '2023-06-12 15:48:52', NULL, NULL),
(19, 'Sakit Kepala', 'Sakit kepala adalah rasa sakit atau nyeri di kepala yang bisa muncul secara bertahap atau mendadak. Sakit kepala ini terjadi karena aktivitas berlebihan seperti kurang tidur, kurang makan, stres, postur tubuh buruk, berlebihan konsumsi makanan tertentu hingga minum alkohol', 'upload/1768486604189133.jpg', 'sakit kepala', '2023-06-12 15:57:33', NULL, NULL),
(20, 'Sembelit', 'Sembelit adalah kondisi di mana Anda mengalami keluhan susah buang air besar (BAB). Hal ini disebabkan oleh penurunan aktivitas usus. Gejala awal yang paling umum yaitu BAB yang tidak tidak teratur, dengan frekuensi kurang dari 3 kali seminggu.', 'upload/1768486694126534.jpg', 'sembelit', '2023-06-12 15:58:59', NULL, NULL),
(21, 'Kanker', 'Penyakit Kanker merupakan penyakit tidak menular yang ditandai dengan adanya sel/jaringan abnormal yang bersifat ganas, tumbuh cepat tidak terkendali dan dapat menyebar ke tempat lain dalam tubuh penderita. Sel kanker bersifat ganas dan dapat menginvasi serta merusak fungsi jaringan tersebut.', 'upload/1768486777810414.jpg', 'kanker', '2023-06-12 16:00:18', NULL, NULL),
(22, 'Anemia', 'Anemia adalah kondisi ketika tubuh mengalami penurunan atau jumlah sel darah merah berada di bawah kisaran normal. Hal ini terjadi karena kurangnya hemoglobin (protein kaya zat besi) sehingga memengaruhi produksi sel darah merah.', 'upload/1768486838769509.jpg', 'anemia', '2023-06-12 16:01:17', NULL, NULL),
(23, 'Asam Lambung', 'Penyakit asam lambung atau Gastroesophageal Reflux Disease (GERD) adalah gangguan pencernaan yang memengaruhi cincin otot antara kerongkongan dan perut. Otot kerongkongan bagian bawah yang melemah menyebabkan kerongkongan tetap terbuka. Ini membuat asam lambung naik kembali ke kerongkongan.', 'upload/1768486959696460.jpeg', 'asam lambung', '2023-06-12 16:03:12', NULL, NULL),
(24, 'Ambeien', 'Wasir atau ambeien adalah pembengkakan atau pembesaran pembuluh darah vena yang berada di sekitar rektum atau anus. Wasir bisa dialami oleh siapa saja, namun lebih umum terjadi pada orang berusia di atas 50 tahun. Umumnya, wasir tidak menimbulkan gejala yang mengganggu penderitanya', 'upload/1768487092365467.jpg', 'ambeien', '2023-06-12 16:05:18', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_20_102240_laratrust_setup_tables', 1),
(6, '2023_04_21_161018_create_sessions_table', 1),
(7, '2023_04_21_172109_create_categories_table', 1),
(8, '2023_04_22_003023_create_subcategories_table', 1),
(9, '2023_04_22_003926_create_products_table', 1),
(10, '2023_04_24_163819_create_carts_table', 1),
(11, '2023_05_01_073425_create_orders_table', 1),
(12, '2023_05_03_014005_create_deseases_table', 1),
(13, '2023_05_24_060946_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_nama` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phonenumber` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_postalcode` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_city` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalprice` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `img_bayar` text COLLATE utf8mb4_unicode_ci,
  `ulasan` text COLLATE utf8mb4_unicode_ci,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2023-06-11 06:26:25', '2023-06-11 06:26:25'),
(2, 'users-read', 'Read Users', 'Read Users', '2023-06-11 06:26:25', '2023-06-11 06:26:25'),
(3, 'users-update', 'Update Users', 'Update Users', '2023-06-11 06:26:25', '2023-06-11 06:26:25'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2023-06-11 06:26:25', '2023-06-11 06:26:25'),
(5, 'payments-create', 'Create Payments', 'Create Payments', '2023-06-11 06:26:25', '2023-06-11 06:26:25'),
(6, 'payments-read', 'Read Payments', 'Read Payments', '2023-06-11 06:26:25', '2023-06-11 06:26:25'),
(7, 'payments-update', 'Update Payments', 'Update Payments', '2023-06-11 06:26:25', '2023-06-11 06:26:25'),
(8, 'payments-delete', 'Delete Payments', 'Delete Payments', '2023-06-11 06:26:25', '2023-06-11 06:26:25'),
(9, 'profile-read', 'Read Profile', 'Read Profile', '2023-06-11 06:26:25', '2023-06-11 06:26:25'),
(10, 'profile-update', 'Update Profile', 'Update Profile', '2023-06-11 06:26:25', '2023-06-11 06:26:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(9, 2),
(10, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `product_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category_id` bigint UNSIGNED NOT NULL,
  `product_subcategory_id` bigint UNSIGNED NOT NULL,
  `product_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_deskripsi`, `price`, `product_category_name`, `product_category_id`, `product_img`, `quantity`,`time`, `created_at`, `updated_at`) VALUES
(47, 'Omegdiar tablet', '/papan\r\n(922277\r\nSep-24)', 5000, 'Diare', 'Tablet', 19, 18, 'upload/1765880168316288.jpeg', 12, 'omegdiar tablet', '2023-06-09 11:52:50', NULL, NULL),
(48, 'Zink tablet', '/papan\r\n(211008350\r\nOct-23)', 15000, 'Suplemen', 'Tablet', 26, 18, 'upload/1766101649510376.jpeg', 4, 'zink tablet', '2023-06-09 11:52:50', NULL, NULL),
(49, 'Dulcolac tablet', '/papan\r\n(210905102\r\nAug-24)', 20000, 'Pencernaan', 'Tablet', 17, 18, 'upload/1766101816656580.jpeg', 4, 'dulcolac tablet', '2023-06-09 11:52:50', NULL, NULL),
(50, 'AntiHemoroid tablet', '/papan\r\n( 002HW\r\nAug-23)', 20000, 'Ambeien', 'Tablet', 31, 19, 'upload/1766102099975801.jpeg', 10, 'antihemoroid tablet', '2023-06-09 11:52:50', NULL, '2023-06-09 19:26:49'),
(51, 'Sangobion tablet', '/papan\r\n(1455185\r\nNov-24)', 20000, 'Anemia', 'Tablet', 32, 18, 'upload/1766102220133136.jpeg', 10, 'sangobion tablet', '2023-06-09 11:52:50', NULL, NULL),
(52, 'Neurobion putih', '/papan\r\n(Do156442\r\nJan-24)', 27000, 'Vitamin', 'Tablet', 33, 18, 'upload/1766102397395379.jpeg', 3, 'neurobion putih', '2023-06-09 11:52:50', NULL, NULL),
(53, 'Neurobion merah', '/papan', 48000, 'Vitamin', 'Tablet', 33, 18, 'upload/1766102607109231.png', 2, 'neurobion merah', '2023-06-09 11:52:50', NULL, NULL),
(54, 'Imbost tablet', '/papan\r\n (22A033\r\nFeb-25)', 45000, 'Vitamin', 'Tablet', 33, 18, 'upload/1766102711481511.jpg', 3, 'imbost tablet', '2023-06-09 11:52:50', NULL, NULL),
(55, 'Arkavit', '/papan\r\n(T2106470\r\nAug-24)', 6000, 'Suplemen', 'Tablet', 26, 19, 'upload/1766102833661582.jpeg', 2, 'arkavit', '2023-06-09 11:52:50', NULL, NULL),
(56, 'Grantusif', '/papan\r\n(SG116G\r\nJul-24)', 11000, 'Batuk', 'Tablet', 12, 18, 'upload/1766102975384315.jpeg', 10, 'grantusif', '2023-06-09 11:52:50', NULL, NULL),
(57, 'Calortusin', '/papan\r\n( T08044BA\r\nAug-24)', 8000, 'Influenza', 'Tablet', 15, 18, 'upload/1766103140780967.jpeg', 14, 'calortusin', '2023-06-09 11:52:50', NULL, NULL),
(58, 'Flutamol tablet', '/papan\r\n(EY010\r\nMay-24)', 11000, 'Influenza', 'Tablet', 15, 18, 'upload/1766103266934234.jpeg', 20, 'flutamol tablet', '2023-06-09 11:52:50', NULL, NULL),
(59, 'OBH Combi Anak', '1HL036\r\nNov-23', 17000, 'Flu & Batuk', 'Sirup', 18, 20, 'upload/1766103363327186.jpeg', 9, 'obh combi anak', '2023-06-09 11:52:50', NULL, NULL),
(60, 'Neorheumasil Tablet', '100982\r\nDec-24', 10000, 'Nyeri otot,sendi,dll', 'Tablet', 34, 18, 'upload/1766103485554077.jpeg', 7, 'neorheumasil tablet', '2023-06-09 11:52:50', NULL, NULL),
(61, 'Antimo Anak', '56107018\r\nMar-24', 2000, 'Anti Mual', 'Sirup', 35, 20, 'upload/1766103560026100.jpg', 31, 'antimo anak', '2023-06-09 11:52:50', NULL, NULL),
(62, 'Betadine Salap', 'KB20085\r\nOct-23', 15000, 'Obat Luar', 'Luka Luar', 23, 26, 'upload/1766103647469694.jpeg', 5, 'betadine salap', '2023-06-09 11:52:50', NULL, NULL),
(63, 'Proclod Flu', 'BNKTPOCAK1206\r\nAug-23', 4000, 'Influenza', 'Tablet', 15, 18, 'upload/1766103710855717.jpeg', 10, 'proclod flu', '2023-06-09 11:52:50', NULL, NULL),
(64, 'Procold Flu Batuk', 'KTPOCBI4913\r\nAug-23', 5000, 'Flu & Batuk', 'Tablet', 18, 19, 'upload/1766103806384894.jpeg', 18, 'procold flu batuk', '2023-06-09 11:52:50', NULL, NULL),
(65, 'Panadol Merah', '1HM132\r\nOct-24', 14000, 'Sakit Kepala', 'Tablet', 36, 19, 'upload/1766104110611831.jpeg', 4, 'panadol merah', '2023-06-09 11:52:50', NULL, NULL),
(66, 'Panadol Biru', '1HM132\r\nDec-24', 12000, 'Sakit Kepala', 'Tablet', 36, 18, 'upload/1766104189143364.jpeg', 4, 'panadol biru', '2023-06-09 11:52:50', NULL, NULL),
(67, 'Komix Obh', 'BK008\r\nOct-23', 2000, 'Flu & Batuk', 'Sirup', 18, 21, 'upload/1766104267595195.jpeg', 15, 'komix obh', '2023-06-09 11:52:50', NULL, NULL),
(68, 'Kuldon', 'BC001520\r\nJul-23', 3000, 'Sariawan', 'Tablet', 37, 18, 'upload/1766104374149056.jpeg', 3, 'kuldon', '2023-06-09 11:52:50', NULL, NULL),
(69, 'Diatabs Tablet', '21251901\r\nDec-24', 4000, 'Diare', 'Tablet', 19, 18, 'upload/1766105626899062.jpeg', 12, 'diatabs tablet', '2023-06-09 11:52:50', NULL, NULL),
(70, 'Nosib Salep', '13050\r\nMay-25', 15000, 'Obat Luar', 'Luka Luar', 23, 26, 'upload/1766105710336405.jpeg', 15, 'nosib salep', '2023-06-09 11:52:50', NULL, NULL),
(71, 'Kalpanak Salap', '920272\r\nJul-24', 10000, 'Obat Luar', 'Luka Luar', 23, 26, 'upload/1766105784962827.jpg', 15, 'kalpanak salap', '2023-06-09 11:52:50', NULL, NULL),
(72, 'Pagoda Salep', '21011110\r\nMay-24', 8000, 'Obat Luar', 'Luka Luar', 23, 26, 'upload/1766105863707159.jpg', 13, 'pagoda salep', '2023-06-09 11:52:50', NULL, NULL),
(73, 'Salap 88', '3010217\r\nOct-24', 15000, 'Obat Luar', 'Luka Luar', 23, 26, 'upload/1766106020981899.jpeg', 13, 'salap 88', '2023-06-09 11:52:50', NULL, NULL),
(74, 'Promag Tablet', 'KTPRGR22849\r\nApr-25', 10000, 'Maag', 'Tablet', 21, 18, 'upload/1766106118539943.jpeg', 36, 'promag tablet', '2023-06-09 11:52:50', NULL, NULL),
(75, 'Entrostop Tablet', 'KTNTPKI5786\r\nOct-26', 9000, 'Diare', 'Tablet', 19, 18, 'upload/1766106291061856.jpg', 21, 'entrostop tablet', '2023-06-09 11:52:50', NULL, NULL),
(76, 'Entrostop anak', 'BJ007\r\nSep-23', 2500, 'Diare', 'Sirup', 19, 20, 'upload/1766106381513149.jpg', 12, 'entrostop anak', '2023-06-09 11:52:50', NULL, NULL),
(77, 'Bodrexin Tablet', '40492\r\nMar-24', 5000, 'Demam', 'Tablet', 13, 19, 'upload/1766106487229715.jpeg', 8, 'bodrexin tablet', '2023-06-09 11:52:50', NULL, '2023-06-09 19:26:49'),
(78, 'Bodrex Tablet', '/papan\r\n(21342\r\nFeb-27)', 5000, 'Sakit Kepala', 'Tablet', 36, 18, 'upload/1766106624487124.jpg', 12, 'bodrex tablet', '2023-06-09 11:52:50', NULL, NULL),
(79, 'Mixagrip Flu Batuk', 'STMXGE16133\r\nNov-23', 4000, 'Flu & Batuk', 'Tablet', 18, 18, 'upload/1766106710029081.jpeg', 14, 'mixagrip flu batuk', '2023-06-09 11:52:50', NULL, NULL),
(80, 'Mixagrip Flu', 'STMXGF14206\r\nAug-23', 3000, 'Influenza', 'Tablet', 15, 18, 'upload/1766106774992431.jpeg', 3, 'mixagrip flu', '2023-06-09 11:52:50', NULL, NULL),
(81, 'Askamex', 'NOV21A02\r\nNov-23', 4000, 'Obat Cacing', 'Tablet', 38, 18, 'upload/1766106864374055.jpeg', 25, 'askamex', '2023-06-09 11:52:50', NULL, NULL),
(82, 'Contrexin Syrup', '31372\r\nMar-24', 10000, 'Demam', 'Sirup', 13, 20, 'upload/1766106924615556.jpeg', 8, 'contrexin syrup', '2023-06-09 11:52:50', NULL, NULL),
(83, 'Siladex BP', 'APR22A28\r\nApr-25', 18000, 'Flu & Batuk', 'Sirup', 18, 20, 'upload/1766107020852052.jpeg', 3, 'siladex bp', '2023-06-09 11:52:50', NULL, NULL),
(84, 'Laserin Syrup', '58204\r\nApr-26', 24000, 'Batuk', 'Sirup', 12, 20, 'upload/1766107091553813.jpeg', 5, 'laserin syrup', '2023-06-09 11:52:50', NULL, NULL),
(85, 'Viodiran Smart Syrup', '122071\r\nDec-23', 18000, 'Vitamin', 'Sirup', 33, 20, 'upload/1766107306421949.jpeg', 4, 'viodiran smart syrup', '2023-06-09 11:52:50', NULL, NULL),
(86, 'KurKur Syrup', '340\r\nJan-24', 75000, 'Vitamin', 'Sirup', 33, 20, 'upload/1766107486142510.jpg', 3, 'kurkur syrup', '2023-06-09 11:52:50', NULL, NULL),
(87, 'Trombosphop Gel', '122B22\r\nFeb-26', 68000, 'Obat Luar', 'Luka Luar', 23, 26, 'upload/1766107574168589.jpg', 3, 'trombosphop gel', '2023-06-09 11:52:50', NULL, NULL),
(88, 'Canesten', '12H1892\r\nAug-23', 18000, 'Obat Luar', 'Luka Luar', 23, 26, 'upload/1766107629363520.jpeg', 3, 'canesten', '2023-06-09 11:52:50', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Admin', '2023-06-11 06:26:25', '2023-06-11 06:26:25'),
(2, 'customer', 'Customer', 'Customer', '2023-06-11 06:26:25', '2023-06-11 06:26:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\User'),
(2, 2, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint UNSIGNED NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_count` int NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `subcategories`
--

INSERT INTO `subcategories` (`id`, `subcategory_name`, `category_id`, `category_name`, `product_count`, `slug`, `time`, `created_at`, `updated_at`) VALUES
(18, 'Tablet', 14, 'Pening', 29, '', '2023-06-09 11:52:27', NULL, '2023-05-15 22:32:36'),
(19, 'Tablet', 12, 'Batuk', 9, '', '2023-06-09 11:52:27', NULL, '2023-05-15 22:26:36'),
(20, 'Sirup', 12, 'Batuk', 37, '', '2023-06-09 11:52:27', NULL, '2023-05-15 22:42:29'),
(21, 'Sirup', 13, 'Demam', 1, '', '2023-06-09 11:52:27', NULL, '2023-05-15 21:51:20'),
(22, 'Tablet', 15, 'flue', 1, '', '2023-06-09 11:52:27', NULL, '2023-05-13 09:29:40'),
(24, 'Obat Kumur', 16, 'Mulut', 1, '', '2023-06-09 11:52:27', NULL, '2023-05-03 00:04:54'),
(25, 'Serbuk', 17, 'Pencernaan', 1, '', '2023-06-09 11:52:27', NULL, '2023-05-03 00:14:18'),
(26, 'Luka Luar', 23, 'Obat Luar', 8, '', '2023-06-09 11:52:27', NULL, '2023-05-15 22:44:46'),
(27, 'Suplemen', 25, 'Tulang', 2, '', '2023-06-09 11:52:27', NULL, '2023-05-10 01:52:11'),
(28, 'Tablet Hisap', 28, 'Tenggorokan', 1, '', '2023-06-09 11:52:27', NULL, '2023-05-13 09:49:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `user_img` text COLLATE utf8mb4_unicode_ci,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `birthdate`, `user_img`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$In34FBk9XFnkI/yXgsX8neLc/aJe5tjJZYHZyyQtigaIWfdYbtXju', NULL, '2023-06-11 06:27:39', '2023-06-12 03:02:32'),
(2, 'carloka', 'carlo366@gmail.com', '082283314904', '2004-03-10', 'upload/1686491709.jpg', 'jl gang bonsai , melati raya no 21', NULL, '$2y$10$/VovGm7kGjlGFzjeEKfnW.dUMyKb.iHlTem2RNkdCcUyLugipJ1I6', NULL, '2023-06-11 06:28:58', '2023-06-11 07:13:01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `deseases`
--
ALTER TABLE `deseases`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indeks untuk tabel `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_product_category_id_foreign` (`product_category_id`),
  ADD KEY `products_product_subcategory_id_foreign` (`product_subcategory_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indeks untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `deseases`
--
ALTER TABLE `deseases`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_product_subcategory_id_foreign` FOREIGN KEY (`product_subcategory_id`) REFERENCES `subcategories` (`id`);

--
-- Ketidakleluasaan untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

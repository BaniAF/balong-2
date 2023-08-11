-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Agu 2023 pada 03.00
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judulArtikel` varchar(255) NOT NULL,
  `isiArtikel` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `idKategori` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `articles`
--

INSERT INTO `articles` (`id`, `judulArtikel`, `isiArtikel`, `image`, `idKategori`, `created_at`, `updated_at`) VALUES
(1, 'Modi aut sed ratione temporibus voluptate.', '<p>\r\n    Selamat datang di <span class=\"underline\">website kami</span>! Di sini Anda akan menemukan berita terbaru dan bermanfaat tentang berbagai topik. Kami berkomitmen untuk memberikan informasi terpercaya dan berkualitas kepada pembaca kami. Dari politik hingga teknologi, dari kesehatan hingga gaya hidup, kami hadir untuk memenuhi kebutuhan Anda akan informasi terkini. Jadilah bagian dari komunitas kami dan selalu kunjungi halaman kami untuk mendapatkan pembaruan berita yang relevan dan menarik. Terima kasih telah bergabung dengan kami! <br><a href=\"\' . asset(\'documents/file1.pdf\') . \'\" target=\"_blank\">File PDF: file1.pdf</a>\r\n\r\nvideo1.mp4\r\n</p>\r\n', 'dummy.jpg', 6, '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(2, 'Et pariatur repellat ullam laborum.', '<p class=\"text-xl font-semibold text-blue-700 bg-yellow-200 p-4 rounded-lg shadow-md\">\r\n    Selamat datang di <span class=\"underline\">website kami</span>! Di sini Anda akan menemukan berita terbaru dan bermanfaat tentang berbagai topik. Kami berkomitmen untuk memberikan informasi terpercaya dan berkualitas kepada pembaca kami. Dari politik hingga teknologi, dari kesehatan hingga gaya hidup, kami hadir untuk memenuhi kebutuhan Anda akan informasi terkini. Jadilah bagian dari komunitas kami dan selalu kunjungi halaman kami untuk mendapatkan pembaruan berita yang relevan dan menarik. Terima kasih telah bergabung dengan kami!\r\n</p>\r\n', 'dummy.jpg', 6, '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(3, 'Perspiciatis neque hic quod saepe optio.', 'Consequuntur eligendi ea molestias ab et. Quia sint voluptatem neque provident autem possimus et. Commodi est molestiae molestias consequatur. Esse placeat iste nihil accusamus id. Commodi omnis ex eveniet in. Consectetur ratione qui sed assumenda omnis cumque aut.', 'dummy.jpg', 3, '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(4, 'Vitae fuga quis voluptas cum.', 'Quasi dolores sit odio qui aut accusamus. Iste magnam aspernatur minus voluptate ipsa sit ut. Dolores porro nisi eos. Recusandae dolores iusto rerum rem officia inventore. Eligendi sint eligendi officia recusandae eos. Non minus placeat optio culpa ab. Alias aut error perferendis repellat hic. Ipsam fugiat voluptatem et commodi pariatur quia omnis. Amet molestiae rerum qui provident. Minima ut dicta voluptatem et voluptatibus sunt et.', 'dummy.jpg', 7, '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(5, 'Hic quis cupiditate voluptatem sit aut maxime.', 'At a velit eum veniam. Beatae amet explicabo iure ipsum magnam. Repellat tempore ipsa error numquam vitae sit quaerat. Adipisci distinctio enim vel est quod. Quia omnis a et saepe. Labore saepe aut qui sed. Eos sunt ducimus incidunt laudantium eveniet. Debitis dolores sequi ad non similique. Animi qui voluptatum eum et id quia ut. Esse nulla occaecati consequatur.', 'dummy.jpg', 7, '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(6, 'Nobis recusandae possimus maiores in nihil est.', 'Non ratione facere quibusdam id alias aut. Voluptas ullam sed minus delectus beatae. Qui maiores non minima quibusdam quae eveniet. Non nam molestiae quibusdam repellendus. Iure quis similique harum repellendus voluptatem aut veritatis. Atque rerum soluta eligendi tenetur. Ullam vel qui in eligendi ut sunt. Repudiandae aut ut omnis et omnis facilis eaque. Deserunt totam saepe iusto libero velit.', 'dummy.jpg', 2, '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(7, 'Est qui molestiae rerum.', 'Quo eum explicabo laborum voluptatem suscipit dolore ipsa. Tenetur dolorum quam accusantium et omnis eum. Eum dolorem perferendis aut doloremque consectetur magnam. Autem accusantium facilis aut amet non. Cum sequi laboriosam nostrum omnis facere placeat quibusdam illo. Ut nostrum rem mollitia eius reiciendis minima. Ad consequuntur recusandae tempore occaecati. Dolorem earum sed nobis rerum quasi ipsum non delectus.', 'dummy.jpg', 2, '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(8, 'Earum error ratione nulla.', 'Laudantium asperiores commodi perspiciatis aut et vel voluptas qui. Tenetur omnis ut iure sed magnam enim nostrum. Suscipit dolores sed est provident blanditiis molestiae. Suscipit sunt tempora reiciendis velit. Occaecati doloribus molestiae tempore animi. Harum repellendus occaecati unde. Reiciendis iste nihil nesciunt et qui eos atque. Perspiciatis fuga assumenda odit rem sit ipsum voluptatum dolorem.', 'dummy.jpg', 4, '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(9, 'Voluptas quis animi esse nihil neque distinctio possimus ipsam.', 'Id molestiae esse minus et. Voluptate occaecati sed iusto rerum voluptate. Occaecati deserunt dolorem fuga et ut modi. Eveniet doloribus dolores repellendus error qui ut ex. Ut deleniti iste et asperiores magni maiores vitae totam. Suscipit rerum qui optio vero aspernatur non enim. Quis provident amet laudantium vitae dicta eius et. Velit culpa nulla laborum libero recusandae. Voluptatem eius ut nihil eum est nulla sint.', 'dummy.jpg', 4, '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(10, 'Dolore quia quam quis qui voluptatem.', 'Modi sequi dolore enim consectetur. Quia voluptatem architecto culpa est in itaque porro. Voluptatem distinctio eos nisi cumque modi quia sed. Est cupiditate tempora modi quis debitis. Et quidem totam ipsum odio distinctio.', 'dummy.jpg', 7, '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(11, 'Est est reprehenderit ab sunt ratione.', 'Eos autem et sunt dolor nemo quasi nesciunt. Esse non minus esse ut est sint eum culpa. Ad ipsum similique consequatur similique rem voluptas. Totam dolor dolor sint impedit vero. Sint sed autem corrupti quia vel. Sapiente voluptatem molestias velit incidunt nesciunt. Animi consequatur reiciendis ea nihil. Qui doloremque dolor consequuntur.', 'dummy.jpg', 3, '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(12, 'Eum consequatur quod est.', 'Nostrum quibusdam necessitatibus esse soluta. Repellat nemo aliquid et vel repellat facilis. Ipsam rerum nesciunt quis voluptas aut similique omnis. Aut laudantium quos animi laboriosam nam repellendus. Voluptate alias nobis aut aut at maxime qui. Voluptate alias totam sunt est et laudantium fuga. Expedita labore voluptatem architecto in omnis similique cum provident. Quo veniam ut eveniet quasi aut. Est quasi autem harum accusantium.', 'dummy.jpg', 5, '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(13, 'Nihil nulla corporis est eveniet.', 'Quia mollitia a quia corrupti ipsum soluta tenetur. Tempore repellat molestiae est qui nemo perferendis. Recusandae est et magni neque totam. Sit rerum voluptas optio nostrum architecto. Recusandae autem deleniti ipsam velit et quos maxime. Nostrum molestiae reiciendis in est modi. Aut earum voluptatem accusamus dolores omnis odit et. Labore blanditiis cum nam esse.', 'dummy.jpg', 6, '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(14, 'Modi voluptate omnis quia.', 'Dicta tempore sequi est optio repudiandae dolorem. Illum est quia rerum corrupti officia. Quae reiciendis aspernatur soluta reiciendis sed ut minus. Iure hic quasi dolores. Libero dolorum repellat enim.', 'dummy.jpg', 4, '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(15, 'Nihil ratione quia nihil aliquam sed sed culpa.', 'Laudantium totam est velit modi ut assumenda omnis. Rem ullam veniam suscipit minima. Quisquam animi vero officia omnis sed. Sed fuga rerum saepe magni. Sapiente officiis eaque tempora. Ipsa quas veritatis et est ut enim. Ut nihil voluptatem eligendi ut nam eos et. Suscipit quia aspernatur temporibus minima fuga eum possimus.', 'dummy.jpg', 6, '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(16, 'Ea voluptas dolorem illo nostrum aut cum totam.', 'Inventore magni nostrum rerum sapiente eum. Blanditiis maiores fugit delectus et qui temporibus. Dolorem qui et soluta. Ut corporis fugiat voluptatibus est adipisci nihil veritatis. Vel voluptatum debitis sit et omnis perferendis. Cum adipisci natus fuga aspernatur ex ea. Quis voluptatum totam quasi nisi quis vitae quos.', 'dummy.jpg', 6, '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(17, 'Aut quisquam id aut rem repellat.', 'Aut adipisci quod sint et in. Ratione excepturi aut nihil dolores harum. Quas qui corrupti aut tempore doloremque. Quasi illum rerum id accusantium expedita et et. Maxime fugit aut cupiditate dolor nihil quibusdam. Ex nulla illo quod laborum iure. Laboriosam in ut est sunt magnam quam omnis. Atque et quia excepturi. Doloremque atque at fuga laborum aut molestias officiis eos. Possimus qui autem facilis sit temporibus.', 'dummy.jpg', 2, '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(18, 'Quo dolor eaque maiores praesentium enim rem.', 'Neque optio non veniam. Odit ipsa id quo praesentium. Corrupti dolorem ipsa eveniet soluta quos rerum consequuntur. Maiores et ad nam nesciunt illo. Molestias vero voluptatem quas dolorum. Ut neque ratione quam sint qui officiis. Laudantium voluptatem illo praesentium. Consequuntur vel animi minima ipsum. Voluptatibus modi commodi non officia tempore nihil velit. Expedita vero ipsum assumenda odit voluptatem.', 'dummy.jpg', 5, '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(19, 'Voluptas magnam sunt qui id explicabo voluptatibus consequuntur.', 'Ipsum et voluptate quia architecto est. Sed consectetur nobis quisquam. Laudantium in sit vel reiciendis blanditiis consectetur magnam. Odio sunt cum quia atque consequatur corrupti quia. Voluptatem qui odit sequi non qui illo suscipit. Non quis animi neque sed provident. Nobis quia ipsam voluptatem ullam architecto incidunt itaque.', 'dummy.jpg', 4, '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(20, 'Enim veritatis commodi necessitatibus iste eos numquam minima.', 'Atque ipsa sunt in. Nesciunt laborum numquam expedita. Velit laboriosam rerum dolorem ut. Magni omnis et soluta fugit quaerat porro quis atque. Placeat velit facere dolores eius.', 'dummy.jpg', 5, '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(21, 'Optio id nulla eum ut.', 'Quia minima excepturi molestias accusantium repudiandae dolor numquam. Pariatur occaecati voluptates sequi fugiat culpa vel sapiente. Maxime voluptatem occaecati dolore saepe dolor. Nisi inventore nam accusamus qui quas. Aut laborum accusamus hic consequatur est odio.', 'dummy.jpg', 6, '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(22, 'Nulla totam et qui cumque ea.', 'Deleniti sapiente dolorum unde deserunt blanditiis debitis totam. Distinctio dolores eveniet et explicabo eaque placeat et. Officiis nemo quod ut. Amet aut deserunt sit odit ad optio. Aut accusantium ipsa ad qui quia incidunt sint. Ipsa magnam minus reiciendis at fuga. Rerum soluta illo porro aut dolor. Ut quasi corporis omnis ab quasi. Quia illum facilis laborum ullam tenetur iste. Ipsum libero est mollitia aut cumque quasi consequatur.', 'dummy.jpg', 5, '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(23, 'Modi expedita et explicabo recusandae rerum autem labore doloribus.', 'Maiores nihil id harum aut maiores a consequuntur. Quae asperiores necessitatibus voluptatem reiciendis est ducimus vero. Voluptatem error aut possimus quas et sed aut. Magni rem voluptatum quis tempore aperiam mollitia. Consequuntur et voluptas optio. Fugiat et quia omnis minus.', 'dummy.jpg', 2, '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(24, 'Non possimus sit maxime dolores cum aliquid porro voluptatem.', 'Suscipit provident rerum vel dignissimos. Perferendis illum delectus porro mollitia ut animi quia dolor. Sit rerum et dolores voluptas deleniti maxime aperiam. Voluptate quidem aspernatur cumque corporis architecto corrupti. Saepe itaque porro molestiae maxime similique. Voluptatum qui deserunt delectus. Beatae nam eos autem non dolorem. Odio est tempore molestias at qui dolorum provident impedit. Sunt voluptatum laudantium praesentium aut et rerum pariatur.', 'dummy.jpg', 4, '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(25, 'Officiis a dolore nobis nostrum est dolore.', 'Vero tenetur assumenda quaerat et et dolore atque. Ratione magnam et labore dolore. Modi nihil eveniet nam voluptas quo fugiat. Voluptatem at voluptas occaecati nesciunt est. Sapiente assumenda omnis dolorem. Sed cupiditate est officia voluptas porro molestiae. Voluptas eum aut quia saepe. Alias quod dolor dolorem sed provident tenetur. Qui quis ea dolorum maxime laboriosam deserunt ut. Facilis laboriosam doloribus modi sed aut facere sed.', 'dummy.jpg', 3, '2023-07-23 23:46:29', '2023-07-23 23:46:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang`
--

CREATE TABLE `bidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaBidang` char(50) NOT NULL,
  `descBidang` text NOT NULL,
  `fileBidang` char(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bidang`
--

INSERT INTO `bidang` (`id`, `namaBidang`, `descBidang`, `fileBidang`, `created_at`, `updated_at`) VALUES
(1, 'Bidang', 'adsvf fafwdqa ascasca dqqq ', '', NULL, NULL),
(2, 'Unit', 'dasdasda dadasdsa asdsaad dasdsad dasdsa dasdsa dasda dasdas dasda dasdas da as a', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukutamu`
--

CREATE TABLE `bukutamu` (
  `id` varchar(5) NOT NULL,
  `namaPengunjung` varchar(50) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `noTelp` varchar(12) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bukutamu`
--

INSERT INTO `bukutamu` (`id`, `namaPengunjung`, `keperluan`, `keterangan`, `noTelp`, `created_at`, `updated_at`) VALUES
('BT001', 'Moh. Sifaul Khoir', 'Mengajukan / Mengirim Surat', 'asdfghjk', '0812345678', '2023-07-26 22:05:20', '2023-07-26 22:05:20'),
('BT002', 'Icha Prastika', 'Bertemu Dengan PEG01', 'asdffsda', '45678912', '2023-07-26 22:06:35', '2023-07-26 22:06:35'),
('BT003', 'bani comel', 'Penerbitan Surat', 'halo boloku', '98765', '2023-08-10 17:43:13', '2023-08-10 17:43:13'),
('BT004', 'bani bann', 'Bertemu Dengan Icha Prastika', 'sdcfvghj aaa ada', '23456789', '2023-08-10 17:48:15', '2023-08-10 17:48:15'),
('BT005', 'arkhanb', 'Pengaduan Masyarakat', 'sifaul nakal', '23456789', '2023-08-10 17:49:15', '2023-08-10 17:49:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaKategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `namaKategori`, `created_at`, `updated_at`) VALUES
(1, 'laudantium', '2023-07-23 23:45:43', '2023-07-23 23:45:43'),
(2, 'rerum', '2023-07-23 23:45:43', '2023-07-23 23:45:43'),
(3, 'quo', '2023-07-23 23:45:43', '2023-07-23 23:45:43'),
(4, 'est', '2023-07-23 23:45:43', '2023-07-23 23:45:43'),
(5, 'ut', '2023-07-23 23:45:43', '2023-07-23 23:45:43'),
(6, 'dicta', '2023-07-23 23:45:43', '2023-07-23 23:45:43'),
(7, 'dolorem', '2023-07-23 23:45:43', '2023-07-23 23:45:43'),
(8, 'adipisci', '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(9, 'ad', '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(10, 'iusto', '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(11, 'delectus', '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(12, 'vero', '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(13, 'vero', '2023-07-23 23:46:29', '2023-07-23 23:46:29'),
(14, 'non', '2023-07-23 23:46:29', '2023-07-23 23:46:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'bani', 'baniarkan123@gmail.com', '81120333', 'dasdnsudnaudsandusandsaindasiudnasidnsauidsaidnsaudnsaidnsaiundaisndaisundaisdnasiudnsaidnasiudnaidaiuaiuasidasiudaidaiudaiudnaidnasidnasidnaiudnaidaidnaidaidaiud', '2023-07-31 18:02:18', '2023-07-31 18:02:18'),
(2, 'Bina Soew', 'baniarkan123@gmail.com', '81120333', 'lkjhygtfrewazesxrdtvyujiok,plkjiuyvcrxsercdtvbgnjmk,ojinuytrcdxesrcdtfybhnjkmnhbgvcrdxsezwrcdtvybgnhmknjvfcrdxsezrcdtybgnhjmk,omjnubyrcdxesdcfvtyhnjk,mjinubygtfrcdetfvybhunjmklmjnbyvtrcxectvfybnhujiko,jihuygtfrdeftygbunhjk,omjinhuybtfrcdtfvybunhji', '2023-07-31 18:29:02', '2023-07-31 18:29:02'),
(3, 'Bina Soew', 'baniarkan123@gmail.com', '81120333', 'lkjhygtfrewazesxrdtvyujiok,plkjiuyvcrxsercdtvbgnjmk,ojinuytrcdxesrcdtfybhnjkmnhbgvcrdxsezwrcdtvybgnhmknjvfcrdxsezrcdtybgnhjmk,omjnubyrcdxesdcfvtyhnjk,mjinubygtfrcdetfvybhunjmklmjnbyvtrcxectvfybnhujiko,jihuygtfrdeftygbunhjk,omjinhuybtfrcdtfvybunhji', '2023-07-31 18:29:30', '2023-07-31 18:29:30'),
(4, 'Bina Soew', 'baniarkan123@gmail.com', '81120333', 'lkjhygtfrewazesxrdtvyujiok,plkjiuyvcrxsercdtvbgnjmk,ojinuytrcdxesrcdtfybhnjkmnhbgvcrdxsezwrcdtvybgnhmknjvfcrdxsezrcdtybgnhjmk,omjnubyrcdxesdcfvtyhnjk,mjinubygtfrcdetfvybhunjmklmjnbyvtrcxectvfybnhujiko,jihuygtfrdeftygbunhjk,omjinhuybtfrcdtfvybunhji', '2023-07-31 18:29:48', '2023-07-31 18:29:48'),
(5, 'Bina Soew', 'baniarkan123@gmail.com', '81120333', 'lkjhygtfrewazesxrdtvyujiok,plkjiuyvcrxsercdtvbgnjmk,ojinuytrcdxesrcdtfybhnjkmnhbgvcrdxsezwrcdtvybgnhmknjvfcrdxsezrcdtybgnhjmk,omjnubyrcdxesdcfvtyhnjk,mjinubygtfrcdetfvybhunjmklmjnbyvtrcxectvfybnhujiko,jihuygtfrdeftygbunhjk,omjinhuybtfrcdtfvybunhji', '2023-07-31 18:32:31', '2023-07-31 18:32:31'),
(6, 'Bina Soew', 'baniarkan123@gmail.com', '81120333', 'lkjhygtfrewazesxrdtvyujiok,plkjiuyvcrxsercdtvbgnjmk,ojinuytrcdxesrcdtfybhnjkmnhbgvcrdxsezwrcdtvybgnhmknjvfcrdxsezrcdtybgnhjmk,omjnubyrcdxesdcfvtyhnjk,mjinubygtfrcdetfvybhunjmklmjnbyvtrcxectvfybnhujiko,jihuygtfrdeftygbunhjk,omjinhuybtfrcdtfvybunhji', '2023-07-31 18:32:55', '2023-07-31 18:32:55'),
(7, 'Bina Soew', 'baniarkan123@gmail.com', '81120333', 'lkjhygtfrewazesxrdtvyujiok,plkjiuyvcrxsercdtvbgnjmk,ojinuytrcdxesrcdtfybhnjkmnhbgvcrdxsezwrcdtvybgnhmknjvfcrdxsezrcdtybgnhjmk,omjnubyrcdxesdcfvtyhnjk,mjinubygtfrcdetfvybhunjmklmjnbyvtrcxectvfybnhujiko,jihuygtfrdeftygbunhjk,omjinhuybtfrcdtfvybunhji', '2023-07-31 18:33:16', '2023-07-31 18:33:16'),
(8, 'Bina Soew', 'baniarkan123@gmail.com', '81120333', 'lkjhygtfrewazesxrdtvyujiok,plkjiuyvcrxsercdtvbgnjmk,ojinuytrcdxesrcdtfybhnjkmnhbgvcrdxsezwrcdtvybgnhmknjvfcrdxsezrcdtybgnhjmk,omjnubyrcdxesdcfvtyhnjk,mjinubygtfrcdetfvybhunjmklmjnbyvtrcxectvfybnhujiko,jihuygtfrdeftygbunhjk,omjinhuybtfrcdtfvybunhji', '2023-07-31 18:33:25', '2023-07-31 18:33:25'),
(9, 'Bina Soew', 'baniarkan123@gmail.com', '81120333', 'lkjhygtfrewazesxrdtvyujiok,plkjiuyvcrxsercdtvbgnjmk,ojinuytrcdxesrcdtfybhnjkmnhbgvcrdxsezwrcdtvybgnhmknjvfcrdxsezrcdtybgnhjmk,omjnubyrcdxesdcfvtyhnjk,mjinubygtfrcdetfvybhunjmklmjnbyvtrcxectvfybnhujiko,jihuygtfrdeftygbunhjk,omjinhuybtfrcdtfvybunhji', '2023-07-31 18:33:31', '2023-07-31 18:33:31'),
(10, 'Bina Soew', 'baniarkan123@gmail.com', '81120333', 'lkjhygtfrewazesxrdtvyujiok,plkjiuyvcrxsercdtvbgnjmk,ojinuytrcdxesrcdtfybhnjkmnhbgvcrdxsezwrcdtvybgnhmknjvfcrdxsezrcdtybgnhjmk,omjnubyrcdxesdcfvtyhnjk,mjinubygtfrcdetfvybhunjmklmjnbyvtrcxectvfybnhujiko,jihuygtfrdeftygbunhjk,omjinhuybtfrcdtfvybunhji', '2023-07-31 18:33:54', '2023-07-31 18:33:54'),
(11, 'Bina Soew', 'baniarkan123@gmail.com', '81120333', 'lkjhygtfrewazesxrdtvyujiok,plkjiuyvcrxsercdtvbgnjmk,ojinuytrcdxesrcdtfybhnjkmnhbgvcrdxsezwrcdtvybgnhmknjvfcrdxsezrcdtybgnhjmk,omjnubyrcdxesdcfvtyhnjk,mjinubygtfrcdetfvybhunjmklmjnbyvtrcxectvfybnhujiko,jihuygtfrdeftygbunhjk,omjinhuybtfrcdtfvybunhji', '2023-07-31 18:34:03', '2023-07-31 18:34:03'),
(12, 'Bina Soew', 'baniarkan123@gmail.com', '81120333', 'lkjhygtfrewazesxrdtvyujiok,plkjiuyvcrxsercdtvbgnjmk,ojinuytrcdxesrcdtfybhnjkmnhbgvcrdxsezwrcdtvybgnhmknjvfcrdxsezrcdtybgnhjmk,omjnubyrcdxesdcfvtyhnjk,mjinubygtfrcdetfvybhunjmklmjnbyvtrcxectvfybnhujiko,jihuygtfrdeftygbunhjk,omjinhuybtfrcdtfvybunhji', '2023-07-31 18:34:07', '2023-07-31 18:34:07'),
(13, 'Bina Soew', 'baniarkan123@gmail.com', '81120333', 'lkjhygtfrewazesxrdtvyujiok,plkjiuyvcrxsercdtvbgnjmk,ojinuytrcdxesrcdtfybhnjkmnhbgvcrdxsezwrcdtvybgnhmknjvfcrdxsezrcdtybgnhjmk,omjnubyrcdxesdcfvtyhnjk,mjinubygtfrcdetfvybhunjmklmjnbyvtrcxectvfybnhujiko,jihuygtfrdeftygbunhjk,omjinhuybtfrcdtfvybunhji', '2023-07-31 18:35:38', '2023-07-31 18:35:38'),
(14, 'Bina Soew', 'baniarkan123@gmail.com', '81120333', 'lkjhygtfrewazesxrdtvyujiok,plkjiuyvcrxsercdtvbgnjmk,ojinuytrcdxesrcdtfybhnjkmnhbgvcrdxsezwrcdtvybgnhmknjvfcrdxsezrcdtybgnhjmk,omjnubyrcdxesdcfvtyhnjk,mjinubygtfrcdetfvybhunjmklmjnbyvtrcxectvfybnhujiko,jihuygtfrdeftygbunhjk,omjinhuybtfrcdtfvybunhji', '2023-07-31 18:36:18', '2023-07-31 18:36:18'),
(15, 'Bina Soew', 'baniarkan123@gmail.com', '81120333', 'lkjhygtfrewazesxrdtvyujiok,plkjiuyvcrxsercdtvbgnjmk,ojinuytrcdxesrcdtfybhnjkmnhbgvcrdxsezwrcdtvybgnhmknjvfcrdxsezrcdtybgnhjmk,omjnubyrcdxesdcfvtyhnjk,mjinubygtfrcdetfvybhunjmklmjnbyvtrcxectvfybnhujiko,jihuygtfrdeftygbunhjk,omjinhuybtfrcdtfvybunhji', '2023-07-31 18:36:28', '2023-07-31 18:36:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoripost`
--

CREATE TABLE `kategoripost` (
  `id` varchar(5) NOT NULL,
  `namaKategori` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoripost`
--

INSERT INTO `kategoripost` (`id`, `namaKategori`, `created_at`, `updated_at`) VALUES
('K001', 'Kebudayaan', '2023-07-09 21:51:46', '2023-07-26 22:34:43'),
('K002', 'Umum', '2023-07-09 21:52:34', '2023-07-09 21:52:34'),
('K004', 'Ekonomi', '2023-07-25 18:19:05', '2023-07-25 18:19:05'),
('K005', 'wisata', '2023-08-08 21:32:07', '2023-08-08 21:32:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id` varchar(5) NOT NULL,
  `namaLayanan` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `descLayanan` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `jam_operasional` varchar(100) NOT NULL,
  `kategoriLayanan` varchar(100) NOT NULL,
  `persyaratan` varchar(100) NOT NULL,
  `biaya` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id`, `namaLayanan`, `created_at`, `updated_at`, `descLayanan`, `lokasi`, `kontak`, `jam_operasional`, `kategoriLayanan`, `persyaratan`, `biaya`, `keterangan`) VALUES
('L002', 'Kantor Kecamatan Balong', '2023-07-04 18:44:36', '2023-08-03 18:21:44', 'Layanan Administrasi Kecamatan Balong', 'Jl. Kecamatan', '08219182347', '08:00-21:00', 'Kependudukan', 'Membawa Surat Undangan', 'Gratis', 'Pembuatan KTP atau Surat Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_24_061551_create_articles_table', 1),
(6, '2023_07_24_062942_create_categories_table', 1),
(7, '2023_07_24_063427_update_article_table', 2),
(8, '2023_07_25_044809_add_pengumuman_image_to_articles_table', 3),
(9, '2023_07_25_045137_create_pengumuman_image_table', 4),
(10, '2023_08_01_005647_create_contacts_table', 5),
(11, '2023_08_01_064425_create_menu_items_table', 6),
(12, '2023_08_01_144914_create_submenu_items_table', 7),
(13, '2023_08_02_012533_add_menu_item_id_to_submenu_items_table', 8),
(14, '2023_08_02_030153_create_weather_table', 9),
(15, '2023_08_02_131820_ubahtb_program_kegiatan', 10),
(16, '2023_08_05_051747_tb_profil', 11),
(17, '2023_08_07_023102_add_aktif_column_to_pengumuman_image', 11),
(18, '2023_08_07_060143_create_bidangs_table', 12),
(19, '2023_08_07_011655_tb_galeri', 13),
(20, '2023_08_07_011955_tb_galeri_lagi', 13),
(21, '2023_08_07_052737_remove_primary_ey', 13),
(22, '2023_08_09_040118_ubah_proker_image', 13),
(23, '2023_08_10_023327_create_regulasis_table', 13),
(24, '2023_08_10_030717_create_table_galeri', 14),
(25, '2023_08_10_033446_drop_id_primary', 14),
(26, '2023_08_10_040015_create_menus_table', 15),
(27, '2023_08_10_040017_create_submenus_table', 15),
(28, '2023_08_10_053851_create_menu_table', 16),
(29, '2023_08_10_055123_create_sub_menu_table', 17),
(30, '2023_08_10_213934_create_profils_table', 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` varchar(5) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `namaPegawai` varchar(50) NOT NULL,
  `jenisKelamin` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `pangkat` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fotoPegawai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `namaPegawai`, `jenisKelamin`, `jabatan`, `pangkat`, `created_at`, `updated_at`, `fotoPegawai`) VALUES
('PEG02', '2131730066', 'Icha Prastika', 'Perempuan', 'Sekretaris Kecamatan', 'Penata III-D', '2023-07-28 20:53:33', '2023-08-05 08:26:46', 'PEG02 - Icha Prastika.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman_image`
--

CREATE TABLE `pengumuman_image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengumuman_image`
--

INSERT INTO `pengumuman_image` (`id`, `image`, `created_at`, `updated_at`, `aktif`) VALUES
(1, 'pengumuman1.jpeg', NULL, '2023-08-08 20:10:01', 1),
(4, '1691374830.png', '2023-08-06 19:20:30', '2023-08-08 20:09:57', 1),
(6, 'dsa.jpg', '2023-08-08 21:21:21', '2023-08-08 21:21:58', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `id` varchar(5) NOT NULL,
  `judulPost` varchar(50) NOT NULL,
  `isiPost` text NOT NULL,
  `kategoriPost` varchar(50) NOT NULL,
  `userPost` varchar(50) NOT NULL,
  `statusPost` varchar(50) NOT NULL,
  `fotoPost` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id`, `judulPost`, `isiPost`, `kategoriPost`, `userPost`, `statusPost`, `fotoPost`, `created_at`, `updated_at`) VALUES
('P003', 'Kecamatan Balong', '<p><strong>Balong </strong>adalah sebuah kecamatan di Kabupaten Ponorogo, Provinsi Jawa Timur, Indonesia. Kecamatan ini berjarak sekitar 18 kilometer dari ibu kota Kabupaten Ponorogo ke arah barat daya. Pusat pemerintahannya berada di desa Balong.&nbsp;</p>', 'K002', 'Kecamatan Balong', 'Diposting', 'P003 - Lokasi_Kecamatan_Balong,_Ponorogo.png', '2023-07-12 17:45:03', '2023-08-04 22:09:29'),
('P004', 'Cob', '<p><strong>Ini Juga COba</strong></p>', 'K002', 'Admin', 'Diposting', 'P004 - kue-ondeh-ondeh.jpg', '2023-07-12 18:30:02', '2023-07-25 18:19:39'),
('P005', 'Ini Judul Belum Diposting', '<p>I<strong>ni Belum Diposting </strong>Ini Belum DipostingIni Belum DipostingIni Belum DipostingIni Belum DipostingIni Belum DipostingIni Belum DipostingIni Belum DipostingIni Belum DipostingIni Bel<img src=\"http://127.0.0.1:8000/uploads/Artikel/Postingan/1691393938 - 1.png\">um DipostingIni Belum DipostingIni Belum DipostingIni Belum DipostingIni Belum DipostingIni Belum DipostingIni Belum DipostingIni Belum DipostingIni Belum DipostingIni Belum DipostingIni Belum DipostingIni Belum DipostingIni Belum DipostingIni Belum DipostingIni Belum DipostingIni Belum DipostingIni Belum DipostingIni Belum DipostingIni Belum Diposting</p>', 'K001', 'Kecamatan Balong', 'Diposting', 'P005 - IPNU IPPNU - HUT RI.jpg', '2023-08-02 20:54:52', '2023-08-07 00:39:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profils`
--

CREATE TABLE `profils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaProfil` char(50) NOT NULL,
  `descProfil` text NOT NULL,
  `fileProfil` char(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profils`
--

INSERT INTO `profils` (`id`, `namaProfil`, `descProfil`, `fileProfil`, `created_at`, `updated_at`) VALUES
(1, 'Organisasi dan Tata Kerja', 'isinya tentang Organisasi, bisa struktur atau yang lain', '', NULL, NULL),
(2, 'Tugas dan Fungsi', 'Berisi tentang Tupoksi dari Kecamatan', '', NULL, NULL),
(3, 'Struktur Organisasi', 'Berisi tentang struktur pemerintahan', '', NULL, NULL),
(4, 'Visi, Misi, Tujuan, Sasaran', 'Visi apa,\r\n\r\nMisi apa,\r\n\r\nTujuan apa,\r\n\r\nSasaran apa,', '', NULL, NULL),
(5, 'Profil Pejabat Struktural', 'Profil bapak/ibu camat', '', NULL, NULL),
(6, 'Jumlah Pegawai', 'Isi pegawai', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proker`
--

CREATE TABLE `proker` (
  `id` varchar(5) NOT NULL,
  `namaProker` varchar(50) NOT NULL,
  `descProker` text NOT NULL,
  `fileProgram` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `proker`
--

INSERT INTO `proker` (`id`, `namaProker`, `descProker`, `fileProgram`, `created_at`, `updated_at`) VALUES
('PK01', 'RENJA', 'Keterangan Logo Resmi untuk HUT RI 2023', 'PK01_HUT RI 78_Logo.pdf', '2023-08-03 18:04:36', '2023-08-08 19:58:05'),
('PK02', 'RENSTRA', 'dadasnidsnaudasdinas', 'PK02_Daftar Pembimbing PKL.pdf', '2023-08-08 17:44:11', '2023-08-08 19:58:20'),
('PK03', 'IKU', 'dadasdsada', 'PK03_Daftar Pembimbing PKL.pdf', '2023-08-08 17:44:46', '2023-08-08 19:58:32'),
('PK04', 'DPA', 'dadsad', '-', '2023-08-08 19:58:43', '2023-08-08 19:58:43'),
('PK05', 'PERJANJIAN KINERJA', 'dasdasddasdasdasdqwewqqweq', '-', '2023-08-08 19:59:01', '2023-08-08 19:59:01'),
('PK06', 'LAPORAN KINERJA', 'wqednwqiudwqydqdq', '-', '2023-08-08 19:59:21', '2023-08-08 19:59:21'),
('PK07', 'RENCANA KERJA', 'zasxrdctfvybhudaoidqwdv', '-', '2023-08-08 19:59:37', '2023-08-08 19:59:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proker_image`
--

CREATE TABLE `proker_image` (
  `id` varchar(5) NOT NULL,
  `kodeProker` varchar(5) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `proker_image`
--

INSERT INTO `proker_image` (`id`, `kodeProker`, `image`, `created_at`, `updated_at`) VALUES
('FK01', 'PK01', 'PK01 - Harlah Pancasila.jpg', '2023-08-08 21:03:14', '2023-08-08 21:03:14'),
('FK02', 'PK02', 'PK02 - PK01 - cover_2.jpg', '2023-08-09 20:33:21', '2023-08-09 20:33:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `regulasi`
--

CREATE TABLE `regulasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaRegulasi` char(50) NOT NULL,
  `descRegulasi` text NOT NULL,
  `fileRegulasi` char(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `regulasi`
--

INSERT INTO `regulasi` (`id`, `namaRegulasi`, `descRegulasi`, `fileRegulasi`, `created_at`, `updated_at`) VALUES
(1, 'Undang - Undang', 'swedcfvgbhnj adbasydbaudba dashdbausbda dashbdsahb hdabhdbsa dashdbash dasdbas bdahbda', '', NULL, NULL),
(2, 'Peraturan Pemerintah', 'swedcfvgbhnj adbasydbaudba dashdbausbda dashbdsahb hdabhdbsa dashdbash dasdbas bdahbda', '', NULL, NULL),
(3, 'Peraturan Menteri', 'swedcfvgbhnj adbasydbaudba dashdbausbda dashbdsahb hdabhdbsa dashdbash dasdbas bdahbda', '', NULL, NULL),
(4, 'Peraturan Bupati', 'swedcfvgbhnj adbasydbaudba dashdbausbda dashbdsahb hdabhdbsa dashdbash dasdbas bdahbda', '', NULL, NULL),
(5, 'Peraturan Daerah', 'swedcfvgbhnj adbasydbaudba dashdbausbda dashbdsahb hdabhdbsa dashdbash dasdbas bdahbda', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` varchar(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `namaUser` varchar(50) NOT NULL,
  `userpass` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `namaUser`, `userpass`, `created_at`, `updated_at`) VALUES
('A001', 'sibalong', 'Kecamatan Balong', '123456', '2023-07-08 19:18:30', '2023-07-15 03:52:18'),
('A002', 'Adminku', 'Admin Kecamatan Balong', 'admin123', NULL, '2023-07-15 03:52:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `weather`
--

CREATE TABLE `weather` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_idkategori_foreign` (`idKategori`);

--
-- Indeks untuk tabel `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bukutamu`
--
ALTER TABLE `bukutamu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategoripost`
--
ALTER TABLE `kategoripost`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengumuman_image`
--
ALTER TABLE `pengumuman_image`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profils`
--
ALTER TABLE `profils`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `proker`
--
ALTER TABLE `proker`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `regulasi`
--
ALTER TABLE `regulasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `weather`
--
ALTER TABLE `weather`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `pengumuman_image`
--
ALTER TABLE `pengumuman_image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `profils`
--
ALTER TABLE `profils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `regulasi`
--
ALTER TABLE `regulasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `weather`
--
ALTER TABLE `weather`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_idkategori_foreign` FOREIGN KEY (`idKategori`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

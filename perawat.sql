-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Apr 2022 pada 17.11
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perawat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kewenangans`
--

CREATE TABLE `detail_kewenangans` (
  `credential_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewenangan_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_kewenangans`
--

INSERT INTO `detail_kewenangans` (`credential_id`, `kewenangan_id`, `keterangan`, `created_at`, `updated_at`) VALUES
('KP.03.01/I/001/2022', 'K03', 'Tidak Kompeten', NULL, NULL),
('KP.03.01/I/001/2022', 'K04', 'Tidak Kompeten', NULL, NULL),
('KP.03.01/I/001/2022', 'K05', 'Tidak Kompeten', NULL, NULL),
('KP.03.01/I/001/2022', 'K06', 'Tidak Kompeten', NULL, NULL),
('KP.03.01/I/001/2022', 'K07', 'Kompeten', NULL, NULL),
('KP.03.01/I/001/2022', 'K08', 'Kompeten', NULL, NULL),
('KP.03.01/I/001/2022', 'K09', 'Kompeten', NULL, NULL),
('KP.03.01/I/001/2022', 'K10', 'Kompeten', NULL, NULL),
('KP.03.01/I/001/2022', 'K11', 'Kompeten', NULL, NULL),
('KP.03.01/I/002/2022', 'K12', 'Kompeten', NULL, NULL),
('KP.03.01/I/002/2022', 'K13', 'Kompeten', NULL, NULL),
('KP.03.01/I/002/2022', 'K14', 'Tidak Kompeten', NULL, NULL),
('KP.03.01/I/002/2022', 'K15', 'Kompeten', NULL, NULL),
('KP.03.01/I/002/2022', 'K16', 'Kompeten', NULL, NULL),
('KP.03.01/I/002/2022', 'K17', 'Kompeten', NULL, NULL),
('KP.03.01/I/002/2022', 'K18', 'Kompeten', NULL, NULL),
('KP.03.01/I/003/2022', 'K03', NULL, NULL, NULL),
('KP.03.01/I/003/2022', 'K04', NULL, NULL, NULL),
('KP.03.01/I/003/2022', 'K05', NULL, NULL, NULL),
('KP.03.01/I/003/2022', 'K06', NULL, NULL, NULL),
('KP.03.01/I/003/2022', 'K07', NULL, NULL, NULL),
('KP.03.01/I/003/2022', 'K08', NULL, NULL, NULL),
('KP.03.01/I/003/2022', 'K09', NULL, NULL, NULL),
('KP.03.01/I/003/2022', 'K10', NULL, NULL, NULL),
('KP.03.01/I/003/2022', 'K11', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_persyaratans`
--

CREATE TABLE `detail_persyaratans` (
  `credential_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persyaratan_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `note` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_persyaratans`
--

INSERT INTO `detail_persyaratans` (`credential_id`, `persyaratan_id`, `file`, `status`, `note`, `created_at`, `updated_at`) VALUES
('KP.03.01/I/001/2022', 'S06', 'public/syarat/VoLOs2KTAfj5fsaNW6L2uKdwfuczfsr05aPyj61Y.pdf', 1, NULL, NULL, NULL),
('KP.03.01/I/002/2022', 'S07', 'public/syarat/XaAE9qoYXlBwA8Gf4Sn43fxH2JBgmUDqe2oAxKaN.pdf', 1, NULL, NULL, NULL),
('KP.03.01/I/003/2022', 'S06', 'public/syarat/fHis5aiJZ61L1GBdUndZvQYJHRgrvEZnX6OyHcbW.jpg', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kredentials`
--

CREATE TABLE `jenis_kredentials` (
  `id_jenis_kredensial` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jenis` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_kredentials`
--

INSERT INTO `jenis_kredentials` (`id_jenis_kredensial`, `nama_jenis`, `created_at`, `updated_at`) VALUES
('K1', 'Kredensial Baru', NULL, NULL),
('K2', 'Rekredensial', NULL, NULL),
('K3', 'Kredensial Naik Pangkat', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kewenangan_klinis`
--

CREATE TABLE `kewenangan_klinis` (
  `id_kewenangan` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_klinik_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rincian_kewenangan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kewenangan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kewenangan_klinis`
--

INSERT INTO `kewenangan_klinis` (`id_kewenangan`, `perawat_klinik_id`, `rincian_kewenangan`, `jenis_kewenangan`, `created_at`, `updated_at`) VALUES
('K01', 'PK2', 'Melakukan analisis data hasil pengkajian', 'Mandiri', NULL, NULL),
('K02', 'PK2', 'Menentukan masalah/ diagnosa keperawatan pasien', 'Mandiri', NULL, NULL),
('K03', 'PK3', 'Pengkajian keperawatan mandiri pada pasien resiko komplikasi', 'Mandiri', NULL, NULL),
('K04', 'PK3', 'Melakukan analisa data keperawatan', 'Mandiri', NULL, NULL),
('K05', 'PK3', 'Merumuskan masalah/ diagnosa keperawatan khusus dan kompleks', 'Mandiri', NULL, NULL),
('K06', 'PK3', 'Menyusun rencana asuhan keperawatan yang menggambarkan intervensi pada klien dengan resiko komplikasi', 'Mandiri', NULL, NULL),
('K07', 'PK3', 'Pemeriksaan fisik neurologis spesifik', 'Kolaborasi', NULL, NULL),
('K08', 'PK3', 'Penilaian dan monitoring status neurologis', 'Mandiri', NULL, NULL),
('K09', 'PK3', 'Monitoring gangguan irama jantung', 'Mandiri', NULL, NULL),
('K10', 'PK3', 'Monitoring efek samping pengobatan', 'Mandiri', NULL, NULL),
('K11', 'PK3', 'Ambulasi pasien dalam kondisi tidak stabil (kompleks)', 'Mandiri', NULL, NULL),
('K12', 'PK4', 'Menerima konsultasi pengkajian lanjutan pada kondisi khusus dan kompleks', 'Mandiri', NULL, NULL),
('K13', 'PK4', 'Melakukan pengkajian keperawatan pada klien medikal bedah dengan resiko komplikasi secara mandiri', 'Mandiri', NULL, NULL),
('K14', 'PK4', 'Menerima konsultasi analisis data lanjutan pada kondisi khusus dan kompleks', 'Mandiri', NULL, NULL),
('K15', 'PK4', 'Menerima konsultasi perumusan masalah/ diagnosa keperawatan pasien pada kondisi khusus/ kompleks', 'Mandiri', NULL, NULL),
('K16', 'PK4', 'Menerima konsultasi rencana asuhan keperawatan  pada pasien dengan kondisi khusus dan kompleks', 'Kolaborasi', NULL, NULL),
('K17', 'PK4', 'Menerima konsultasi dalam menentukan intervensi mandiri dan kolaboratif khusus dan kompleks', 'Mandiri', NULL, NULL),
('K18', 'PK4', 'Melakukan intervensi keperawatan mandiri, PK I, PK II, dan PK III', 'Mandiri', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `logbooks`
--

CREATE TABLE `logbooks` (
  `id_logbook` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credential_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kegiatan` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2012_03_24_111826_create_roles_table', 1),
(2, '2012_03_24_111918_create_perawat_kliniks_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2022_03_24_111933_create_tempat_dinas_table', 1),
(8, '2022_03_24_112012_create_jenis_kredentials_table', 1),
(9, '2022_03_24_112038_create_kewenangan_klinis_table', 1),
(10, '2022_03_24_112103_create_persyaratans_table', 1),
(11, '2022_03_24_112147_create_request_kredensials_table', 1),
(12, '2022_03_24_112211_create_detail_persyaratans_table', 1),
(13, '2022_03_24_112317_create_detail_kewenangans_table', 1),
(14, '2022_04_24_111947_create_logbooks_table', 1);

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
-- Struktur dari tabel `perawat_kliniks`
--

CREATE TABLE `perawat_kliniks` (
  `id_perawat_klinik` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perawat_kliniks`
--

INSERT INTO `perawat_kliniks` (`id_perawat_klinik`, `jabatan`, `created_at`, `updated_at`) VALUES
('PK0', '-', NULL, NULL),
('PK1', 'Perawat Klinik I', NULL, NULL),
('PK2', 'Perawat Klinik II', NULL, NULL),
('PK3', 'Perawat Klinik III', NULL, NULL),
('PK4', 'Perawat Klinik IV', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `persyaratans`
--

CREATE TABLE `persyaratans` (
  `id_persyaratan` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kredensial_id` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_persyaratan` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `persyaratans`
--

INSERT INTO `persyaratans` (`id_persyaratan`, `jenis_kredensial_id`, `nama_persyaratan`, `created_at`, `updated_at`) VALUES
('S01', 'K1', 'Lamaran Perawat', NULL, NULL),
('S02', 'K1', 'curriculum vitae', NULL, NULL),
('S03', 'K1', 'Transkip', NULL, NULL),
('S04', 'K1', 'KTP', NULL, NULL),
('S05', 'K1', 'Keaslian ijasah', NULL, NULL),
('S06', 'K2', 'Keaslian Surat Tanda Registrasi', NULL, NULL),
('S07', 'K3', 'asdasdasd', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_kredensials`
--

CREATE TABLE `request_kredensials` (
  `id_kredensial` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_dinas_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kredensial_id` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_request_kredensial` date NOT NULL,
  `tgl_terbit_surat` date DEFAULT NULL,
  `tgl_habis_berlaku` date DEFAULT NULL,
  `status` int(11) NOT NULL,
  `ttd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `request_kredensials`
--

INSERT INTO `request_kredensials` (`id_kredensial`, `nip`, `tempat_dinas_id`, `jenis_kredensial_id`, `tgl_request_kredensial`, `tgl_terbit_surat`, `tgl_habis_berlaku`, `status`, `ttd`, `created_at`, `updated_at`) VALUES
('KP.03.01/I/001/2022', '196706181990032003', 'TD1', 'K2', '2022-04-02', '2022-04-02', '2025-04-02', 2, 'public/ttd/A2B2gH7UusfeGgYSwG8F7GkbeRQOrKlyVatboX9Z.jpg', NULL, NULL),
('KP.03.01/I/002/2022', '196727071990031004', 'TD1', 'K3', '2022-04-02', '2022-04-02', '2025-04-02', 2, 'public/ttd/BTHGpSp9znr5rgBwgq5VQ7gqPaVZGG8xtE7qZ1Ph.jpg', NULL, NULL),
('KP.03.01/I/003/2022', '196706181990032003', 'TD1', 'K2', '2022-04-04', NULL, NULL, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_role` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `nama_role`, `created_at`, `updated_at`) VALUES
('R1', 'Direktur Utama', NULL, NULL),
('R2', 'Komite', NULL, NULL),
('R3', 'Perawat', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat_dinas`
--

CREATE TABLE `tempat_dinas` (
  `id_tempat_dinas` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tempat_dinas`
--

INSERT INTO `tempat_dinas` (`id_tempat_dinas`, `lokasi`, `created_at`, `updated_at`) VALUES
('TD1', 'UGD', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `nip` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_klinik_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `golongan` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangkat` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mulai_dinas` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`nip`, `role_id`, `perawat_klinik_id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `golongan`, `pangkat`, `mulai_dinas`, `pendidikan`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('196211221989031001', 'R2', 'PK0', 'Dr.dr. Yusirwan, Sp.BA (K), MARS', '-', '1978-03-17', 'IV/D', 'Pembina Utama Madya', '1999', '-', 'arizi123@gmail.com', '2022-03-25 05:27:05', '$2y$10$YJgTG51GT6RPItIos/RWlOHNPlchiVCr0M3lMeXD2PekPZueWCdp6', NULL, NULL, NULL),
('196225361129035266', 'R1', 'PK0', 'Haris Ikhsan Arfi', 'Padang Panjang', '1998-02-21', 'IV/O', 'Pembina Utama Madya', '2016', 'Sarjana Teknik', 'haris@gmail.com', '2022-03-30 10:20:23', '$2y$10$iwzrFVCmG4mJ06YplXfTuepyE8Myd4S/Zjaby2X1LUGpZPIsZNcMq', NULL, NULL, NULL),
('196706181990032003', 'R3', 'PK3', 'ROSIYANTI  S,KEP', 'Padang Panjang', '1970-01-11', 'IIID', '-', '1887', 'S.Kep', 'rosi@gmail.com', '2022-04-02 00:00:10', '$2y$10$4nTuGQletdxs/9sTxCuWLO.c6MPKBtATYGY65czrI5XRnipJHGaYm', NULL, NULL, NULL),
('196727071990031004', 'R3', 'PK4', 'DODI INDRA, AMK', 'Bukittinggi', '1975-10-22', 'IIID', '-', '1990', 'D3 kep', 'dodiindra@gmail.com', '2022-04-01 23:58:01', '$2y$10$S1Ug4SR7DEBSyRL40vLPgegAq.SS.fChgANcZQCU/X0C46mCAc7kS', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_kewenangans`
--
ALTER TABLE `detail_kewenangans`
  ADD KEY `detail_kewenangans_credential_id_foreign` (`credential_id`),
  ADD KEY `detail_kewenangans_kewenangan_id_foreign` (`kewenangan_id`);

--
-- Indeks untuk tabel `detail_persyaratans`
--
ALTER TABLE `detail_persyaratans`
  ADD KEY `detail_persyaratans_credential_id_foreign` (`credential_id`),
  ADD KEY `detail_persyaratans_persyaratan_id_foreign` (`persyaratan_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jenis_kredentials`
--
ALTER TABLE `jenis_kredentials`
  ADD PRIMARY KEY (`id_jenis_kredensial`);

--
-- Indeks untuk tabel `kewenangan_klinis`
--
ALTER TABLE `kewenangan_klinis`
  ADD PRIMARY KEY (`id_kewenangan`),
  ADD KEY `kewenangan_klinis_perawat_klinik_id_foreign` (`perawat_klinik_id`);

--
-- Indeks untuk tabel `logbooks`
--
ALTER TABLE `logbooks`
  ADD PRIMARY KEY (`id_logbook`),
  ADD KEY `logbooks_credential_id_foreign` (`credential_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `perawat_kliniks`
--
ALTER TABLE `perawat_kliniks`
  ADD PRIMARY KEY (`id_perawat_klinik`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `persyaratans`
--
ALTER TABLE `persyaratans`
  ADD PRIMARY KEY (`id_persyaratan`),
  ADD KEY `persyaratans_jenis_kredensial_id_foreign` (`jenis_kredensial_id`);

--
-- Indeks untuk tabel `request_kredensials`
--
ALTER TABLE `request_kredensials`
  ADD PRIMARY KEY (`id_kredensial`),
  ADD KEY `request_kredensials_nip_foreign` (`nip`),
  ADD KEY `request_kredensials_tempat_dinas_id_foreign` (`tempat_dinas_id`),
  ADD KEY `request_kredensials_jenis_kredensial_id_foreign` (`jenis_kredensial_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tempat_dinas`
--
ALTER TABLE `tempat_dinas`
  ADD PRIMARY KEY (`id_tempat_dinas`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_perawat_klinik_id_foreign` (`perawat_klinik_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_kewenangans`
--
ALTER TABLE `detail_kewenangans`
  ADD CONSTRAINT `detail_kewenangans_credential_id_foreign` FOREIGN KEY (`credential_id`) REFERENCES `request_kredensials` (`id_kredensial`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_kewenangans_kewenangan_id_foreign` FOREIGN KEY (`kewenangan_id`) REFERENCES `kewenangan_klinis` (`id_kewenangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_persyaratans`
--
ALTER TABLE `detail_persyaratans`
  ADD CONSTRAINT `detail_persyaratans_credential_id_foreign` FOREIGN KEY (`credential_id`) REFERENCES `request_kredensials` (`id_kredensial`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_persyaratans_persyaratan_id_foreign` FOREIGN KEY (`persyaratan_id`) REFERENCES `persyaratans` (`id_persyaratan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kewenangan_klinis`
--
ALTER TABLE `kewenangan_klinis`
  ADD CONSTRAINT `kewenangan_klinis_perawat_klinik_id_foreign` FOREIGN KEY (`perawat_klinik_id`) REFERENCES `perawat_kliniks` (`id_perawat_klinik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `logbooks`
--
ALTER TABLE `logbooks`
  ADD CONSTRAINT `logbooks_credential_id_foreign` FOREIGN KEY (`credential_id`) REFERENCES `request_kredensials` (`id_kredensial`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `persyaratans`
--
ALTER TABLE `persyaratans`
  ADD CONSTRAINT `persyaratans_jenis_kredensial_id_foreign` FOREIGN KEY (`jenis_kredensial_id`) REFERENCES `jenis_kredentials` (`id_jenis_kredensial`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `request_kredensials`
--
ALTER TABLE `request_kredensials`
  ADD CONSTRAINT `request_kredensials_jenis_kredensial_id_foreign` FOREIGN KEY (`jenis_kredensial_id`) REFERENCES `jenis_kredentials` (`id_jenis_kredensial`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_kredensials_nip_foreign` FOREIGN KEY (`nip`) REFERENCES `users` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_kredensials_tempat_dinas_id_foreign` FOREIGN KEY (`tempat_dinas_id`) REFERENCES `tempat_dinas` (`id_tempat_dinas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_perawat_klinik_id_foreign` FOREIGN KEY (`perawat_klinik_id`) REFERENCES `perawat_kliniks` (`id_perawat_klinik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

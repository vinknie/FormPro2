-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 09 jan. 2023 à 16:02
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `formpro`
--

-- --------------------------------------------------------

--
-- Structure de la table `chapitre`
--

CREATE TABLE `chapitre` (
  `id_chapitre` bigint(20) UNSIGNED NOT NULL,
  `id_matiere` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `chapitre`
--

INSERT INTO `chapitre` (`id_chapitre`, `id_matiere`, `nom`, `description`, `created_at`, `updated_at`) VALUES
(1, 3, 'Chapitre 1', 'Description du Chapitre 1', NULL, NULL),
(2, 3, 'Chapitre 2', 'Description du Chapitre 2', NULL, NULL),
(4, 3, 'Chapitre 3', 'Description du Chapitre 3', '2022-11-25 15:22:49', '2022-11-25 15:22:49'),
(5, 20, 'MS word', 'description', NULL, NULL),
(6, 20, 'Excel', 'xcel', '2022-12-02 15:00:10', '2022-12-02 15:00:10');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id_commentaires` bigint(20) UNSIGNED NOT NULL,
  `id_eleve` bigint(20) UNSIGNED NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `examenquestion`
--

CREATE TABLE `examenquestion` (
  `id_examenQuestion` bigint(20) UNSIGNED NOT NULL,
  `id_qcmexamen` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_formation` bigint(20) UNSIGNED NOT NULL,
  `id_chapitre` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `files`
--

INSERT INTO `files` (`id`, `name`, `description`, `file`, `extension`, `created_at`, `updated_at`, `id_formation`, `id_chapitre`) VALUES
(1, 'test PDF', 'TEST PDF', 'FormProAdminPresence.pdf', 'pdf', NULL, NULL, 1, 1),
(2, 'Test MP4', 'Test MP4', 'SampleVideo_1280x720_10mb.mp4', 'mp4', NULL, NULL, 1, 1),
(3, 'PDF1', 'pdf2', 'FormProExamenQCM.pdf', 'pdf', NULL, NULL, 1, 2),
(4, 'elarninh', 'test', 'logo.png', 'png', NULL, NULL, 8, 5),
(5, 'test', 'testtenzin', 'Attestion_Developpeur Web_Vincent_Test.pdf', 'pdf', NULL, NULL, 8, 5);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id_formation` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id_formation`, `nom`, `date_debut`, `date_fin`, `created_at`, `updated_at`) VALUES
(1, 'Developpeur Web', '2022-12-01', '2023-01-02', '2022-11-23 08:29:23', '2022-11-23 08:29:36'),
(3, 'Monteur Video', '2022-07-12', '2022-07-27', '2022-11-24 12:36:27', '2022-11-24 12:36:27'),
(4, 'test', '2022-07-24', '2022-07-24', '2022-11-24 12:37:00', '2022-11-24 12:37:00'),
(5, 'deved', '2022-07-24', '2022-07-29', '2022-11-24 12:38:35', '2022-11-24 12:38:53'),
(6, 'testdelete', '2022-07-24', '2022-07-24', '2022-12-01 13:57:06', '2022-12-01 13:57:06'),
(7, 'testempty', '2022-07-24', '2022-07-24', '2022-12-01 14:50:02', '2022-12-01 14:50:02'),
(8, 'numerique', '2023-09-19', '2060-03-16', '2022-12-02 14:58:15', '2022-12-02 14:58:15');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `id_matiere` bigint(20) UNSIGNED NOT NULL,
  `id_formation` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_utilisateurs` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id_matiere`, `id_formation`, `nom`, `created_at`, `updated_at`, `id_utilisateurs`) VALUES
(2, 1, 'html', NULL, '2022-12-02 12:23:32', 26),
(3, 1, 'Laravel', NULL, '2023-01-04 12:59:00', 42),
(11, 3, 'testinner', '2022-11-28 10:10:07', '2022-12-02 12:03:09', 4),
(14, 6, 'testdelete1', NULL, '2022-12-05 07:05:24', 32),
(19, 7, 'test', NULL, '2022-12-02 12:29:14', NULL),
(20, 8, 'Pack office', NULL, '2022-12-02 14:58:39', 4),
(21, 8, 'Typing', '2022-12-02 15:01:33', '2023-01-06 07:52:28', 4),
(22, 3, 'test', '2023-01-04 09:12:34', '2023-01-04 09:12:34', 42),
(23, 1, 'test1', '2023-01-04 09:25:25', '2023-01-04 09:25:25', 42);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_09_21_134213_create_utilisateurs_table', 1),
(3, '2022_09_21_151446_create_files_table', 1),
(4, '2022_10_13_093756_create_formation_table', 1),
(5, '2022_10_13_093757_create_matiere_table', 1),
(6, '2022_10_13_093758_create_chapitre_table', 1),
(7, '2022_10_13_151950_create_qcmexamen_table', 1),
(8, '2022_10_13_151955_create_examenquestion_table', 1),
(9, '2022_10_13_151955_create_qcmreponse_table', 1),
(10, '2022_10_14_132009_create_commentaires_table', 1),
(11, '2022_10_14_132028_create_notes_table', 1),
(12, '2022_10_14_132048_create_presence_table', 1),
(13, '2022_10_14_133646_create_qcmsatisfaction_table', 1),
(14, '2022_10_14_133710_create_reponsesatisfaction_table', 1),
(15, '2022_10_14_133735_create_satisfactionquestion_table', 1),
(16, '2022_10_14_140124_add_foreign_key_to_files_table', 1),
(17, '2022_10_17_072833_add_foreign_key_to_matiere_table', 1),
(18, '2022_11_14_082658_add_second_foreign_key_to_files_tables', 1),
(19, '2022_11_23_090811_create_user_formation_table', 1),
(20, '2022_11_23_102246_add_row_to_utilisateurs_table', 2),
(21, '2022_11_23_122530_add_second_row_to_utilisateurs_table', 3),
(22, '2022_12_06_082430_create_qcm', 4),
(23, '2022_12_06_082608_create_question', 4),
(24, '2022_12_06_082900_create_option', 4),
(25, '2022_12_06_083044_create_settings', 4);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id_eleve` bigint(20) UNSIGNED NOT NULL,
  `id_matiere` bigint(20) UNSIGNED NOT NULL,
  `reponse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `option`
--

CREATE TABLE `option` (
  `id_option` bigint(20) UNSIGNED NOT NULL,
  `id_question` bigint(20) UNSIGNED NOT NULL,
  `option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `option`
--

INSERT INTO `option` (`id_option`, `id_question`, `option`, `correct`, `created_at`, `updated_at`) VALUES
(55, 362, 'test1', 1, NULL, NULL),
(56, 362, 'test2', 1, NULL, NULL),
(57, 362, 'test3', 0, NULL, NULL),
(58, 362, 'test4', 0, NULL, NULL),
(59, 363, 'vrai', 1, NULL, NULL),
(60, 363, 'faux', 0, NULL, NULL),
(61, 364, 'test1', 1, NULL, NULL),
(62, 364, 'test2', 0, NULL, NULL),
(63, 364, 'test3', 0, NULL, NULL),
(64, 364, 'test4', 1, NULL, NULL),
(65, 364, 'test5', 0, NULL, NULL),
(66, 364, 'test6', 1, NULL, NULL),
(67, 380, 'vrai', 0, NULL, NULL),
(68, 380, 'faux', 1, NULL, NULL),
(69, 381, 'vrai', 1, NULL, NULL),
(70, 381, 'faux', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `presence`
--

CREATE TABLE `presence` (
  `id_presence` bigint(20) UNSIGNED NOT NULL,
  `presence` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  `id_eleve` bigint(20) UNSIGNED NOT NULL,
  `id_formation` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `qcm`
--

CREATE TABLE `qcm` (
  `id_qcm` bigint(20) UNSIGNED NOT NULL,
  `id_chapitre` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `qcm`
--

INSERT INTO `qcm` (`id_qcm`, `id_chapitre`, `titre`, `actif`, `created_at`, `updated_at`) VALUES
(1, 2, 'laravel chap2', 0, NULL, NULL),
(2, 6, 'Excel QCM', 0, NULL, NULL),
(23, 1, 'test', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `qcmexamen`
--

CREATE TABLE `qcmexamen` (
  `id_qcmexamen` bigint(20) UNSIGNED NOT NULL,
  `id_chapitre` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `qcmreponse`
--

CREATE TABLE `qcmreponse` (
  `id_qcmexamen` bigint(20) UNSIGNED NOT NULL,
  `id_examenQuestion` bigint(20) UNSIGNED NOT NULL,
  `reponse1` tinyint(1) NOT NULL,
  `reponse2` tinyint(1) DEFAULT NULL,
  `reponse3` tinyint(1) DEFAULT NULL,
  `reponse4` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `qcmsatisfaction`
--

CREATE TABLE `qcmsatisfaction` (
  `id_qcmsatisfaction` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_formation` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `id_question` bigint(20) UNSIGNED NOT NULL,
  `id_qcm` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id_question`, `id_qcm`, `question`, `points`, `type`, `created_at`, `updated_at`) VALUES
(362, 1, 'test', '1', 'multiple', '2022-12-15 12:23:39', '2022-12-15 12:23:39'),
(363, 2, 'quest ce que laravel', '5', 'truefalse', '2022-12-15 12:29:23', '2022-12-15 12:29:23'),
(364, 1, 'test', '1', 'multiple', '2022-12-15 15:04:15', '2022-12-15 15:04:15'),
(380, 1, 'blabla?', '3', 'truefalse', '2023-01-09 10:00:12', '2023-01-09 10:00:12'),
(381, 1, 'blabla2', '5', 'truefalse', '2023-01-09 10:00:41', '2023-01-09 10:00:41');

-- --------------------------------------------------------

--
-- Structure de la table `reponsesatisfaction`
--

CREATE TABLE `reponsesatisfaction` (
  `id_reponsesatisfaction` bigint(20) UNSIGNED NOT NULL,
  `id_qcmsatisfaction` bigint(20) UNSIGNED NOT NULL,
  `id_eleve` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `satisfactionquestion`
--

CREATE TABLE `satisfactionquestion` (
  `id_satisfactionquestion` bigint(20) UNSIGNED NOT NULL,
  `id_qcmsatisfaction` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reponse1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reponse2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reponse3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reponse4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id_settings` bigint(20) UNSIGNED NOT NULL,
  `id_qcm` bigint(20) UNSIGNED NOT NULL,
  `temps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user_formation`
--

CREATE TABLE `user_formation` (
  `id_utilisateur` bigint(20) UNSIGNED NOT NULL,
  `id_formation` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_formation`
--

INSERT INTO `user_formation` (`id_utilisateur`, `id_formation`, `created_at`, `updated_at`) VALUES
(19, 1, '2022-11-23 13:05:35', '2022-11-23 13:05:35'),
(19, 6, '2022-12-23 09:17:56', '2022-12-23 09:17:56'),
(22, 1, '2022-11-23 14:28:12', '2022-11-23 14:28:12'),
(30, 1, '2022-11-23 14:50:30', '2022-11-23 14:50:30'),
(33, 1, '2022-11-23 14:59:12', '2022-11-23 14:59:12'),
(35, 1, '2022-11-30 12:09:25', '2022-11-30 12:09:25'),
(37, 1, '2022-11-25 07:30:19', '2022-11-25 07:30:19'),
(37, 4, '2022-12-01 12:14:56', '2022-12-01 12:14:56'),
(39, 1, '2022-12-02 15:17:57', '2022-12-02 15:17:57'),
(39, 8, '2022-12-02 15:13:29', '2022-12-02 15:13:29');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `complementAdresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codePostal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `prenom`, `nom`, `email`, `username`, `password`, `status`, `role`, `created_at`, `updated_at`, `telephone`, `niveau`, `sexe`, `adresse`, `date_naissance`, `complementAdresse`, `codePostal`, `ville`, `pays`) VALUES
(4, 'test2', 'test2', 'test1@test.com', 'test1', '$2y$10$nMzRMH3tT4nWYu9BLlzNqOrGbv.Buk4xW9I5qWEcDTf.T0tKAnQ5K', 'chomage', 'formateur', '2022-11-23 12:30:32', '2022-12-02 15:09:09', '01252563522', 'bac', 'homme', 'test1', '2022-07-24', NULL, '78200', 'test', 'france'),
(19, 'testsetse', 'testsetse', 'testestsets@tetest.com', 'testestsetsetest', '$2y$10$mwA69H2AaO0lHzAb9s7Rhe.f7E1WPP1EYWxKWOeNjjhqGvHX1dX7C', 'recherche', 'apprenant', '2022-11-23 13:05:35', '2022-11-23 13:05:35', 'tsetsetsetse', 'brevet', 'homme', 'testestset', '2022-07-24', NULL, 'testestse', 'testsetset', 'france'),
(22, 'testest', 'testset', 'test@testset.com', 'testadmin', '$2y$10$9QYFvoxK5CB8HOD6sZ6i1.gS.pq9KQhIXXgMY9Bp.gu3favyAzO6y', 'etudiant', 'apprenant', '2022-11-23 14:28:12', '2022-11-23 14:28:12', 'teste', 'brevet', 'homme', 'testes', '2022-07-24', NULL, 'test', 'test', 'france'),
(26, 'testes', 'testee', 'razrazr@razrza.com', 'rzarazraz', '$2y$10$EIpvn7aDh/JmPJShi.kfzeolSsm8iZ6HqzUf86SgvVVT6.WXOHHRC', NULL, 'formateur', '2022-11-23 14:37:15', '2022-12-02 12:54:07', 'razrazed', NULL, 'homme', 'razrazrazrazr', '2022-07-24', 'ede', 'azrazrazraz', 'razrazr', 'france'),
(28, 'testset', 'testest', 'testestse@com', 'testsetsetsetsetse', '$2y$10$mAliMNtsxmSWjEYA0fJ63e6DhiJ864.HWWxYVn/37pebi1O.XGWYC', 'recherche', 'apprenant', '2022-11-23 14:40:20', '2022-11-23 14:40:20', 'stsetsetse', 'bac', 'homme', 'testsetset', '2022-07-24', NULL, 'setsetsetsets', 'estsetset', 'france'),
(30, 'testse', 'testes', 'ezaeza@com', 'testtest1', '$2y$10$qItVzgQqp5.f9Bxah0RuM.IF0DVqoWzRfpgGWcLM8frFUVqwTrYzO', 'recherche', 'apprenant', '2022-11-23 14:50:30', '2022-11-23 14:50:30', 'testes', 'bac', 'non-binaire', 'testest', '2022-07-24', 'testse', 'testes', 'testsetse', 'france'),
(32, 'testtes', 'testest', 'tests@com', 'testttestest', '$2y$10$VQKv/I.gjd0fNwuuMy/gO.0CayuNoe3WmRtZUTn/Oeow9/6cRxrei', NULL, 'formateur', '2022-11-23 14:58:23', '2022-11-23 14:58:23', 'testestse', NULL, 'femme', 'testes', '2022-07-24', 'testse', 'testes', 'testse', 'france'),
(33, 'testestset', 'testsetestse', 'testest@com', 'vincent', '$2y$10$/v9b/IPVQk86QP9kxkdTUe2QUKGNVEKDSEWi2Zxj2GF9sdiLpNT36', 'recherche', 'admin', '2022-11-23 14:59:12', '2022-11-23 14:59:12', 'setestsetset', 'bac', 'homme', 'estestse', '2022-07-24', 'testset', 'tsetsetse', 'setsetse', 'france'),
(35, 'test1form', 'test1form', 'test1form@test1formed', 'test1form', '$2y$10$JKMxLuaIXvRldC8se1RZ9OE/6a9TsBMMP6urMMxJ7DTphrh4vKs2.', 'eded', 'apprenant', '2022-11-24 12:40:16', '2022-11-30 12:36:08', 'testtest', 'eded', 'non-binaire', 'eded', '2022-06-28', 'eded', 'eded', 'frrrr', 'eded'),
(36, 'test2form', 'test2form', 'test2form@test2form', 'test2form', '$2y$10$ehqH2fBiO9HIxpub4arZfuZrb3STJF.K7p0TvSY.jPoImK/MJTY06', NULL, 'formateur', '2022-11-24 12:41:06', '2022-11-24 12:41:06', 'test2form', NULL, 'homme', 'test2form', '2022-07-24', NULL, 'test2form', 'test2form', 'france'),
(37, 'Test', 'Vincent', 'b@b.om', 'vincenttest', '$2y$10$160V6Mo9A9OrxkYyrhAnje.zgT/jk4zGmDLtPqx/QKf3.i/P938WW', 'entrepreneured', 'secretaire', '2022-11-25 07:30:19', '2022-12-01 12:15:21', '0011223344ed', 'bac+2ed', 'homme', '01 avenue du tested', '2022-07-24', '3rd Etage', '78200', 'Test', 'fr'),
(39, 'test', 'tenzin', 'teniz@gmail.com', 'testtenzin', '$2y$10$PLUsH0QKG5VM1ulFYrYs/eDNcMqiS80SENwqvYndr0Uznt14tAEVu', 'recherche', 'apprenant', '2022-12-02 15:13:29', '2022-12-02 15:13:29', 'fkdjsflkjsd', 'brevet', 'homme', 'kdjfs', '2022-07-24', NULL, '78000', 'bouekesj', 'france'),
(40, 'dsjfklsdj', 'dfjkdslj', '03030303@gmial.com', 'tenzin', '$2y$10$AqKXSmDEJsrSMT8KIKEdnutOxD8ZiIIueg.3vXmcykeeAegH7O.0C', NULL, 'formateur', '2022-12-02 15:19:29', '2022-12-02 15:19:29', '030303030', NULL, 'homme', '3000', '2022-07-24', NULL, '03030', '30030', 'france'),
(41, 'admin', 'admin', 'admin@admin.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', NULL, NULL, 'admin', 'admin', 'admin', 'admin', '2023-01-04', 'admin', 'admin', 'admin', 'admin'),
(42, 'vincentformateur', 'vincentformateur', 'vincentformateur@vincentformateur', 'vincentformateur', '$2y$10$udpz/QZS92M0JVb.75XLOedKPX8V6u3yIIaN742VQ6KI0747/btH2', NULL, 'formateur', '2023-01-04 09:08:52', '2023-01-04 09:08:52', 'vincentformateur', NULL, 'homme', 'vincentformateur', '2022-07-24', 'vincentformateur', 'vincentformateur', 'vincentformateur', 'france');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chapitre`
--
ALTER TABLE `chapitre`
  ADD PRIMARY KEY (`id_chapitre`),
  ADD KEY `chapitre_id_matiere_foreign` (`id_matiere`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id_commentaires`),
  ADD KEY `commentaires_id_eleve_foreign` (`id_eleve`);

--
-- Index pour la table `examenquestion`
--
ALTER TABLE `examenquestion`
  ADD PRIMARY KEY (`id_examenQuestion`),
  ADD KEY `examenquestion_id_qcmexamen_foreign` (`id_qcmexamen`);

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_id_formation_foreign` (`id_formation`),
  ADD KEY `files_id_chapitre_foreign` (`id_chapitre`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id_formation`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id_matiere`),
  ADD KEY `matiere_id_formation_foreign` (`id_formation`),
  ADD KEY `matiere_id_utilisateurs_foreign` (`id_utilisateurs`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id_eleve`,`id_matiere`),
  ADD KEY `notes_id_matiere_foreign` (`id_matiere`);

--
-- Index pour la table `option`
--
ALTER TABLE `option`
  ADD PRIMARY KEY (`id_option`),
  ADD KEY `option_id_question_foreign` (`id_question`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `presence`
--
ALTER TABLE `presence`
  ADD PRIMARY KEY (`id_presence`),
  ADD KEY `presence_id_eleve_foreign` (`id_eleve`),
  ADD KEY `presence_id_formation_foreign` (`id_formation`);

--
-- Index pour la table `qcm`
--
ALTER TABLE `qcm`
  ADD PRIMARY KEY (`id_qcm`),
  ADD KEY `qcm_id_chapitre_foreign` (`id_chapitre`);

--
-- Index pour la table `qcmexamen`
--
ALTER TABLE `qcmexamen`
  ADD PRIMARY KEY (`id_qcmexamen`),
  ADD KEY `qcmexamen_id_chapitre_foreign` (`id_chapitre`);

--
-- Index pour la table `qcmreponse`
--
ALTER TABLE `qcmreponse`
  ADD PRIMARY KEY (`id_qcmexamen`,`id_examenQuestion`),
  ADD KEY `qcmreponse_id_examenquestion_foreign` (`id_examenQuestion`);

--
-- Index pour la table `qcmsatisfaction`
--
ALTER TABLE `qcmsatisfaction`
  ADD PRIMARY KEY (`id_qcmsatisfaction`),
  ADD KEY `qcmsatisfaction_id_formation_foreign` (`id_formation`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `question_id_qcm_foreign` (`id_qcm`);

--
-- Index pour la table `reponsesatisfaction`
--
ALTER TABLE `reponsesatisfaction`
  ADD PRIMARY KEY (`id_reponsesatisfaction`),
  ADD KEY `reponsesatisfaction_id_qcmsatisfaction_foreign` (`id_qcmsatisfaction`),
  ADD KEY `reponsesatisfaction_id_eleve_foreign` (`id_eleve`);

--
-- Index pour la table `satisfactionquestion`
--
ALTER TABLE `satisfactionquestion`
  ADD PRIMARY KEY (`id_satisfactionquestion`),
  ADD KEY `satisfactionquestion_id_qcmsatisfaction_foreign` (`id_qcmsatisfaction`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id_settings`),
  ADD KEY `settings_id_qcm_foreign` (`id_qcm`);

--
-- Index pour la table `user_formation`
--
ALTER TABLE `user_formation`
  ADD PRIMARY KEY (`id_utilisateur`,`id_formation`),
  ADD KEY `user_formation_id_formation_foreign` (`id_formation`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `utilisateurs_email_unique` (`email`),
  ADD UNIQUE KEY `utilisateurs_username_unique` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chapitre`
--
ALTER TABLE `chapitre`
  MODIFY `id_chapitre` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id_commentaires` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `examenquestion`
--
ALTER TABLE `examenquestion`
  MODIFY `id_examenQuestion` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id_formation` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id_matiere` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `option`
--
ALTER TABLE `option`
  MODIFY `id_option` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `presence`
--
ALTER TABLE `presence`
  MODIFY `id_presence` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `qcm`
--
ALTER TABLE `qcm`
  MODIFY `id_qcm` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `qcmexamen`
--
ALTER TABLE `qcmexamen`
  MODIFY `id_qcmexamen` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `qcmsatisfaction`
--
ALTER TABLE `qcmsatisfaction`
  MODIFY `id_qcmsatisfaction` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `id_question` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=382;

--
-- AUTO_INCREMENT pour la table `reponsesatisfaction`
--
ALTER TABLE `reponsesatisfaction`
  MODIFY `id_reponsesatisfaction` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `satisfactionquestion`
--
ALTER TABLE `satisfactionquestion`
  MODIFY `id_satisfactionquestion` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `id_settings` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chapitre`
--
ALTER TABLE `chapitre`
  ADD CONSTRAINT `chapitre_id_matiere_foreign` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`id_matiere`);

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_id_eleve_foreign` FOREIGN KEY (`id_eleve`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `examenquestion`
--
ALTER TABLE `examenquestion`
  ADD CONSTRAINT `examenquestion_id_qcmexamen_foreign` FOREIGN KEY (`id_qcmexamen`) REFERENCES `qcmexamen` (`id_qcmexamen`);

--
-- Contraintes pour la table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_id_chapitre_foreign` FOREIGN KEY (`id_chapitre`) REFERENCES `chapitre` (`id_chapitre`),
  ADD CONSTRAINT `files_id_formation_foreign` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id_formation`);

--
-- Contraintes pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD CONSTRAINT `matiere_id_formation_foreign` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id_formation`),
  ADD CONSTRAINT `matiere_id_utilisateurs_foreign` FOREIGN KEY (`id_utilisateurs`) REFERENCES `utilisateurs` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_id_eleve_foreign` FOREIGN KEY (`id_eleve`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `notes_id_matiere_foreign` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`id_matiere`);

--
-- Contraintes pour la table `option`
--
ALTER TABLE `option`
  ADD CONSTRAINT `option_id_question_foreign` FOREIGN KEY (`id_question`) REFERENCES `question` (`id_question`);

--
-- Contraintes pour la table `presence`
--
ALTER TABLE `presence`
  ADD CONSTRAINT `presence_id_eleve_foreign` FOREIGN KEY (`id_eleve`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `presence_id_formation_foreign` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id_formation`);

--
-- Contraintes pour la table `qcm`
--
ALTER TABLE `qcm`
  ADD CONSTRAINT `qcm_id_chapitre_foreign` FOREIGN KEY (`id_chapitre`) REFERENCES `chapitre` (`id_chapitre`);

--
-- Contraintes pour la table `qcmexamen`
--
ALTER TABLE `qcmexamen`
  ADD CONSTRAINT `qcmexamen_id_chapitre_foreign` FOREIGN KEY (`id_chapitre`) REFERENCES `chapitre` (`id_chapitre`);

--
-- Contraintes pour la table `qcmreponse`
--
ALTER TABLE `qcmreponse`
  ADD CONSTRAINT `qcmreponse_id_examenquestion_foreign` FOREIGN KEY (`id_examenQuestion`) REFERENCES `examenquestion` (`id_examenQuestion`),
  ADD CONSTRAINT `qcmreponse_id_qcmexamen_foreign` FOREIGN KEY (`id_qcmexamen`) REFERENCES `qcmexamen` (`id_qcmexamen`);

--
-- Contraintes pour la table `qcmsatisfaction`
--
ALTER TABLE `qcmsatisfaction`
  ADD CONSTRAINT `qcmsatisfaction_id_formation_foreign` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id_formation`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_id_qcm_foreign` FOREIGN KEY (`id_qcm`) REFERENCES `qcm` (`id_qcm`);

--
-- Contraintes pour la table `reponsesatisfaction`
--
ALTER TABLE `reponsesatisfaction`
  ADD CONSTRAINT `reponsesatisfaction_id_eleve_foreign` FOREIGN KEY (`id_eleve`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `reponsesatisfaction_id_qcmsatisfaction_foreign` FOREIGN KEY (`id_qcmsatisfaction`) REFERENCES `qcmsatisfaction` (`id_qcmsatisfaction`);

--
-- Contraintes pour la table `satisfactionquestion`
--
ALTER TABLE `satisfactionquestion`
  ADD CONSTRAINT `satisfactionquestion_id_qcmsatisfaction_foreign` FOREIGN KEY (`id_qcmsatisfaction`) REFERENCES `qcmsatisfaction` (`id_qcmsatisfaction`);

--
-- Contraintes pour la table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `settings_id_qcm_foreign` FOREIGN KEY (`id_qcm`) REFERENCES `qcm` (`id_qcm`);

--
-- Contraintes pour la table `user_formation`
--
ALTER TABLE `user_formation`
  ADD CONSTRAINT `user_formation_id_formation_foreign` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id_formation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_formation_id_utilisateur_foreign` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

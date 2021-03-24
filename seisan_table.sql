-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 
-- サーバのバージョン： 5.7.24
-- PHP のバージョン: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `seisan_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `seisan_table`
--

CREATE TABLE `seisan_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `category` varchar(64) NOT NULL,
  `money` int(12) NOT NULL,
  `note` text,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `seisan_table`
--

INSERT INTO `seisan_table` (`id`, `name`, `category`, `money`, `note`, `date`) VALUES
(1, 'ひかる', '食費', 5000, 'tesuto', '2021-03-24 00:22:16'),
(2, 'ひかる', '固定費', 10290, 'テスト', '2021-03-24 22:19:56'),
(3, 'あああ', '日用品費', 5000, 'テスト', '2021-03-24 22:25:47'),
(4, 'いいい', '娯楽費', 50000, 'テスト', '2021-03-24 22:26:01'),
(6, ' &lt;script&gt;alert(&quot;a&quot;);&lt;/script&gt;', '食費', 1000, 'XSS対応テスト', '2021-03-24 22:35:37');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `seisan_table`
--
ALTER TABLE `seisan_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `seisan_table`
--
ALTER TABLE `seisan_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

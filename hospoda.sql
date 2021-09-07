-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Počítač: localhost
-- Vytvořeno: Úte 07. zář 2021, 22:08
-- Verze serveru: 10.4.17-MariaDB
-- Verze PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `hospoda`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `drinks`
--

CREATE TABLE `drinks` (
  `drink_id` int(11) NOT NULL,
  `product` text NOT NULL,
  `price` int(11) NOT NULL,
  `amount` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `drinks`
--

INSERT INTO `drinks` (`drink_id`, `product`, `price`, `amount`) VALUES
(1, 'Pivo', 15, '0.3'),
(2, 'Vino', 40, '2dcl'),
(3, 'Pivo', 35, '0.5'),
(4, 'Pivo', 70, '1l'),
(5, 'Limo', 20, '0.3'),
(6, 'Limo', 35, '0.5'),
(7, 'Limo', 28, '0.4');

-- --------------------------------------------------------

--
-- Struktura tabulky `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `who` text NOT NULL,
  `what` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `orders`
--

INSERT INTO `orders` (`order_id`, `who`, `what`, `qty`, `price`, `time`) VALUES
(1, '1', 2, 3, 40, '2021-09-06 23:27:25'),
(2, '1', 2, 0, 40, '2021-09-06 23:31:58'),
(3, '1', 2, 0, 40, '2021-09-06 23:37:03'),
(4, '1', 2, 2, 40, '2021-09-06 23:42:58'),
(5, '1', 2, 2, 40, '2021-09-06 23:45:50'),
(6, '1', 1, 3, 15, '2021-09-07 00:14:20'),
(7, '2', 2, 4, 40, '2021-09-07 17:06:52'),
(8, '1', 1, 3, 15, '2021-09-07 00:27:09'),
(9, '1', 2, 5, 40, '2021-09-07 00:27:09'),
(10, '1', 1, 2, 15, '2021-09-07 00:53:20'),
(11, '1', 2, 2, 40, '2021-09-07 00:53:20'),
(12, '1', 1, 1, 15, '2021-09-07 14:31:41'),
(13, '3', 2, 2, 40, '2021-09-07 19:48:14'),
(14, '1', 1, 5, 15, '2021-09-07 14:33:27'),
(15, '3', 2, 5, 40, '2021-09-07 19:48:17');

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `age` int(11) NOT NULL,
  `cash` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `name`, `age`, `cash`) VALUES
(1, 'Franta', 18, 725),
(2, 'Tomáš', 18, 1000),
(3, 'Michal', 18, 1000);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`drink_id`);

--
-- Klíče pro tabulku `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `drinks`
--
ALTER TABLE `drinks`
  MODIFY `drink_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pro tabulku `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

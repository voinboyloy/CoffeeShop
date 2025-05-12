SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = '+07:00';

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Database: `coffee-shop`

-- Table structure for table `admins`
CREATE TABLE `admins` (
                          `id` int(10) NOT NULL AUTO_INCREMENT,
                          `adminname` varchar(200) NOT NULL,
                          `email` varchar(200) NOT NULL,
                          `password` varchar(200) NOT NULL,
                          `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                          PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Inserting the first admin
INSERT INTO `admins` (`id`, `adminname`, `email`, `password`, `created_at`)
VALUES (NULL, 'admin', 'admin@gmail.com', '$2y$10$PqrW2DtaVNKcnzf/3X0aRubWzAB9jRamG7QmdNW24S1aT68SqLGZm', current_timestamp());
-- email: admin@gmail.com , password: admin
-- Table structure for table `cart`
CREATE TABLE `cart` (
                        `id` int(10) NOT NULL AUTO_INCREMENT,
                        `name` varchar(200) NOT NULL,
                        `image` varchar(200) NOT NULL,
                        `price` varchar(10) NOT NULL,
                        `pro_id` int(10) NOT NULL,
                        `description` text NOT NULL,
                        `quantity` int(10) NOT NULL,
                        `user_id` int(10) NOT NULL,
                        `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                        PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table `orders`
CREATE TABLE `orders` (
                          `id` int(10) NOT NULL AUTO_INCREMENT,
                          `first_name` varchar(200) NOT NULL,
                          `last_name` varchar(200) NOT NULL,
                          `state` varchar(200) NOT NULL,
                          `street_address` varchar(200) NOT NULL,
                          `town` varchar(200) NOT NULL,
                          `zip_code` varchar(20) NOT NULL,
                          `phone` varchar(20) NOT NULL,
                          `user_id` int(10) NOT NULL,
                          `status` varchar(200) NOT NULL,
                          `total_price` int(10) NOT NULL,
                          `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                          PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table `products`
CREATE TABLE `products` (
                            `id` int(10) NOT NULL AUTO_INCREMENT,
                            `name` varchar(200) NOT NULL,
                            `image` varchar(200) NOT NULL,
                            `description` text NOT NULL,
                            `price` varchar(10) NOT NULL,
                            `type` varchar(200) NOT NULL,
                            `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                            PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table `reviews`
CREATE TABLE `reviews` (
                           `id` int(10) NOT NULL AUTO_INCREMENT,
                           `review` varchar(200) NOT NULL,
                           `username` varchar(200) NOT NULL,
                           `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                           PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table `users`
CREATE TABLE `users` (
                         `id` int(10) NOT NULL AUTO_INCREMENT,
                         `username` varchar(200) NOT NULL,
                         `email` varchar(200) NOT NULL,
                         `password` varchar(200) NOT NULL,
                         `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                         PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

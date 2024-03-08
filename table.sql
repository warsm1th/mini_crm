CREATE TABLE IF NOT EXISTS `users`(
            `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `login` VARCHAR(255) NOT NULL,
            `password` VARCHAR(255) NOT NULL,
            `description` VARCHAR(255),
            `is_admin` BOOLEAN NOT NULL DEFAULT(0),
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
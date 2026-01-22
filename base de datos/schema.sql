CREATE TABLE `users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `apellido` VARCHAR(100) NOT NULL,
  `rut` VARCHAR(20) NOT NULL,
  `cargo` VARCHAR(100) NOT NULL,
  `fecha_nacimiento` DATE NOT NULL,
  `rol` VARCHAR(60) NOT NULL,
  `password_hash` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_rut_unique` (`rut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`nombre`, `apellido`, `rut`, `cargo`, `fecha_nacimiento`, `rol`, `password_hash`)
VALUES ('Super', 'User', '9.999.999-9', 'Administrador', '1990-01-01', 'Super user', '$2y$12$nNyFQLLuFHy7yjLILUTlIO3NQ96Vw5rS90YCDml1ZKINCPv7Lvshe');

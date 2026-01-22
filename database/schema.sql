CREATE TABLE `users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `rut` VARCHAR(20) NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  `apellido` VARCHAR(100) NOT NULL,
  `correo` VARCHAR(150) NOT NULL,
  `telefono` VARCHAR(30) NOT NULL,
  `direccion` VARCHAR(200) DEFAULT NULL,
  `username` VARCHAR(60) NOT NULL,
  `rol` VARCHAR(60) DEFAULT NULL,
  `password_hash` VARCHAR(255) NOT NULL,
  `estado` TINYINT(1) NOT NULL DEFAULT 1,
  `fecha_creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultimo_acceso` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_rut_unique` (`rut`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_correo_unique` (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `roles` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(60) NOT NULL,
  `descripcion` VARCHAR(200) DEFAULT NULL,
  `estado` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_nombre_unique` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `user_roles` (
  `user_id` INT UNSIGNED NOT NULL,
  `role_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`, `role_id`),
  CONSTRAINT `user_roles_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_role_id_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `permissions` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `modulo` VARCHAR(60) NOT NULL,
  `accion` VARCHAR(30) NOT NULL,
  `descripcion` VARCHAR(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_modulo_accion_unique` (`modulo`, `accion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `role_permissions` (
  `role_id` INT UNSIGNED NOT NULL,
  `permission_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`role_id`, `permission_id`),
  CONSTRAINT `role_permissions_role_id_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_permissions_permission_id_fk` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `user_sessions` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT UNSIGNED NOT NULL,
  `session_id` VARCHAR(128) NOT NULL,
  `ip` VARCHAR(45) DEFAULT NULL,
  `user_agent` VARCHAR(255) DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_activity` TIMESTAMP NULL DEFAULT NULL,
  `ended_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_sessions_session_unique` (`session_id`),
  CONSTRAINT `user_sessions_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `audit_logs` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT UNSIGNED DEFAULT NULL,
  `tabla` VARCHAR(60) NOT NULL,
  `accion` VARCHAR(20) NOT NULL,
  `registro_id` INT UNSIGNED DEFAULT NULL,
  `descripcion` VARCHAR(255) DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `audit_logs_user_id_idx` (`user_id`),
  CONSTRAINT `audit_logs_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `events` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(150) NOT NULL,
  `descripcion` TEXT NOT NULL,
  `ubicacion` VARCHAR(200) NOT NULL,
  `fecha_inicio` DATETIME NOT NULL,
  `fecha_fin` DATETIME NOT NULL,
  `tipo` VARCHAR(80) NOT NULL,
  `cupos` INT UNSIGNED DEFAULT NULL,
  `publico_objetivo` VARCHAR(150) DEFAULT NULL,
  `estado` ENUM('borrador', 'publicado', 'finalizado', 'cancelado') NOT NULL DEFAULT 'borrador',
  `habilitado` TINYINT(1) NOT NULL DEFAULT 1,
  `creado_por` INT UNSIGNED NOT NULL,
  `encargado_id` INT UNSIGNED DEFAULT NULL,
  `fecha_creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  CONSTRAINT `events_creado_por_fk` FOREIGN KEY (`creado_por`) REFERENCES `users` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `events_encargado_fk` FOREIGN KEY (`encargado_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `event_attachments` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_id` INT UNSIGNED NOT NULL,
  `archivo_nombre` VARCHAR(200) NOT NULL,
  `archivo_ruta` VARCHAR(255) NOT NULL,
  `archivo_tipo` VARCHAR(50) NOT NULL,
  `subido_por` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  CONSTRAINT `event_attachments_event_id_fk` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  CONSTRAINT `event_attachments_subido_por_fk` FOREIGN KEY (`subido_por`) REFERENCES `users` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `event_authorities` (
  `event_id` INT UNSIGNED NOT NULL,
  `authority_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`event_id`, `authority_id`),
  CONSTRAINT `event_authorities_event_id_fk` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  CONSTRAINT `event_authorities_authority_id_fk` FOREIGN KEY (`authority_id`) REFERENCES `authorities` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `authorities` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(150) NOT NULL,
  `tipo` VARCHAR(80) NOT NULL,
  `correo` VARCHAR(150) DEFAULT NULL,
  `telefono` VARCHAR(30) DEFAULT NULL,
  `fecha_inicio` DATE NOT NULL,
  `fecha_fin` DATE DEFAULT NULL,
  `estado` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `authority_attachments` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `authority_id` INT UNSIGNED NOT NULL,
  `archivo_nombre` VARCHAR(200) NOT NULL,
  `archivo_ruta` VARCHAR(255) NOT NULL,
  `archivo_tipo` VARCHAR(50) NOT NULL,
  `subido_por` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  CONSTRAINT `authority_attachments_authority_id_fk` FOREIGN KEY (`authority_id`) REFERENCES `authorities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `authority_attachments_subido_por_fk` FOREIGN KEY (`subido_por`) REFERENCES `users` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `municipalidad` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(150) NOT NULL,
  `rut` VARCHAR(20) DEFAULT NULL,
  `direccion` VARCHAR(200) DEFAULT NULL,
  `telefono` VARCHAR(30) DEFAULT NULL,
  `correo` VARCHAR(150) DEFAULT NULL,
  `logo_path` VARCHAR(255) DEFAULT NULL,
  `color_primary` VARCHAR(20) DEFAULT NULL,
  `color_secondary` VARCHAR(20) DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `notificacion_correos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `correo_imap` VARCHAR(150) NOT NULL,
  `password_imap` VARCHAR(255) NOT NULL,
  `host_imap` VARCHAR(150) NOT NULL,
  `puerto_imap` INT UNSIGNED NOT NULL DEFAULT 993,
  `seguridad_imap` VARCHAR(30) NOT NULL DEFAULT 'ssl',
  `from_nombre` VARCHAR(150) DEFAULT NULL,
  `from_correo` VARCHAR(150) DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (
  `rut`,
  `nombre`,
  `apellido`,
  `correo`,
  `telefono`,
  `direccion`,
  `username`,
  `rol`,
  `password_hash`,
  `estado`
) VALUES (
  '9.999.999-9',
  'Super',
  'User',
  'admin@muni.cl',
  '+56 9 1234 5678',
  'Municipalidad Central',
  'superuser',
  'SuperAdmin',
  '$2y$12$nNyFQLLuFHy7yjLILUTlIO3NQ96Vw5rS90YCDml1ZKINCPv7Lvshe',
  1
);

INSERT INTO `roles` (`nombre`, `descripcion`, `estado`)
VALUES
  ('SuperAdmin', 'Control total del sistema', 1),
  ('Admin', 'Administración general', 1),
  ('EncargadoEventos', 'Gestión de eventos', 1),
  ('Auditor', 'Revisión y auditoría', 1),
  ('Consulta', 'Acceso de solo lectura', 1);

INSERT INTO `municipalidad` (`nombre`, `rut`, `direccion`, `telefono`, `correo`, `logo_path`, `color_primary`, `color_secondary`)
VALUES ('Municipalidad', NULL, NULL, NULL, NULL, 'assets/images/logo.png', '#6658dd', '#4a81d4');

INSERT INTO `notificacion_correos` (`correo_imap`, `password_imap`, `host_imap`, `puerto_imap`, `seguridad_imap`, `from_nombre`, `from_correo`)
VALUES ('notificaciones@municipalidad.cl', 'cambiar_password', 'imap.municipalidad.cl', 993, 'ssl', 'Sistema Municipal', 'notificaciones@municipalidad.cl');

INSERT INTO `permissions` (`modulo`, `accion`, `descripcion`)
VALUES
  ('usuarios', 'ver', 'Ver usuarios'),
  ('usuarios', 'crear', 'Crear usuarios'),
  ('usuarios', 'editar', 'Editar usuarios'),
  ('usuarios', 'eliminar', 'Deshabilitar usuarios'),
  ('roles', 'ver', 'Ver roles'),
  ('roles', 'crear', 'Crear roles'),
  ('roles', 'editar', 'Editar roles'),
  ('roles', 'eliminar', 'Deshabilitar roles'),
  ('eventos', 'ver', 'Ver eventos'),
  ('eventos', 'crear', 'Crear eventos'),
  ('eventos', 'editar', 'Editar eventos'),
  ('eventos', 'eliminar', 'Deshabilitar eventos'),
  ('eventos', 'publicar', 'Publicar eventos'),
  ('autoridades', 'ver', 'Ver autoridades'),
  ('autoridades', 'crear', 'Crear autoridades'),
  ('autoridades', 'editar', 'Editar autoridades'),
  ('autoridades', 'eliminar', 'Deshabilitar autoridades'),
  ('adjuntos', 'subir', 'Subir adjuntos'),
  ('adjuntos', 'eliminar', 'Eliminar adjuntos'),
  ('adjuntos', 'descargar', 'Descargar adjuntos');

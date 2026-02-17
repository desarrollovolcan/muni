-- Actualización: registro de correos masivos para medios
-- Fecha: 2026-03-16

CREATE TABLE IF NOT EXISTS `media_mass_email_logs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `batch_id` VARCHAR(40) NOT NULL,
  `event_id` INT UNSIGNED NOT NULL,
  `media_request_id` INT UNSIGNED DEFAULT NULL,
  `recipient_name` VARCHAR(200) NOT NULL,
  `recipient_email` VARCHAR(180) NOT NULL,
  `media_name` VARCHAR(200) DEFAULT NULL,
  `subject` VARCHAR(255) NOT NULL,
  `mensaje_importante` MEDIUMTEXT NOT NULL,
  `contacto_nombre` VARCHAR(180) NOT NULL,
  `contacto_correo` VARCHAR(180) NOT NULL,
  `contacto_telefono` VARCHAR(80) NOT NULL,
  `sent_status` ENUM('enviado', 'fallido') NOT NULL,
  `error_message` VARCHAR(255) DEFAULT NULL,
  `sent_by_user_id` INT UNSIGNED DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `media_mass_email_logs_batch_idx` (`batch_id`),
  KEY `media_mass_email_logs_event_idx` (`event_id`),
  KEY `media_mass_email_logs_status_idx` (`sent_status`),
  CONSTRAINT `media_mass_email_logs_event_fk` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  CONSTRAINT `media_mass_email_logs_media_request_fk` FOREIGN KEY (`media_request_id`) REFERENCES `media_accreditation_requests` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

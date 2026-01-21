-- Base de datos: mun_beneficios

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS mun_beneficios CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE mun_beneficios;

CREATE TABLE `alertas_sistema` (
  `id_alerta` bigint(20) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `id_beneficiario` bigint(20) DEFAULT NULL,
  `id_solicitud` bigint(20) DEFAULT NULL,
  `tipo_alerta` varchar(60) NOT NULL,
  `detalle` text NOT NULL,
  `resuelta` tinyint(1) NOT NULL DEFAULT 0,
  `resuelta_por` int(11) DEFAULT NULL,
  `fecha_resolucion` datetime DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `auditoria` (
  `id_auditoria` bigint(20) NOT NULL,
  `tipo_actor` varchar(20) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_beneficiario` bigint(20) DEFAULT NULL,
  `accion` varchar(80) NOT NULL,
  `entidad` varchar(80) NOT NULL,
  `id_entidad` varchar(60) DEFAULT NULL,
  `detalle` text DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `beneficiarios` (
  `id_beneficiario` bigint(20) NOT NULL,
  `id_municipio_principal` int(11) NOT NULL,
  `id_tipo_beneficiario` int(11) NOT NULL,
  `rut` varchar(12) NOT NULL,
  `nombres` varchar(120) NOT NULL,
  `apellidos` varchar(120) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `estado_civil` varchar(30) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `id_comuna` int(11) DEFAULT NULL,
  `id_localidad` int(11) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `beneficiario_cuentas` (
  `id_cuenta` bigint(20) NOT NULL,
  `id_beneficiario` bigint(20) NOT NULL,
  `rut_login` varchar(12) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `ultimo_acceso` datetime DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `beneficios` (
  `id_beneficio` bigint(20) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `id_tipo_beneficio` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `nombre` varchar(160) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_termino` date DEFAULT NULL,
  `monto` decimal(12,2) DEFAULT NULL,
  `cupos` int(11) DEFAULT NULL,
  `requiere_rsh` tinyint(1) NOT NULL DEFAULT 0,
  `rsh_tramo_max` varchar(40) DEFAULT NULL,
  `edad_min` int(11) DEFAULT NULL,
  `edad_max` int(11) DEFAULT NULL,
  `requiere_residencia_comuna` tinyint(1) NOT NULL DEFAULT 0,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `beneficio_requisitos` (
  `id_req` bigint(20) NOT NULL,
  `id_beneficio` bigint(20) NOT NULL,
  `nombre_documento` varchar(120) NOT NULL,
  `obligatorio` tinyint(1) NOT NULL DEFAULT 1,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `cat_beneficio_estado` (
  `id_estado` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cat_beneficio_estado` (`id_estado`, `nombre`, `estado`) VALUES
(1, 'Borrador', 1),
(2, 'Publicado', 1),
(3, 'Suspendido', 1),
(4, 'Cerrado', 1);

CREATE TABLE `cat_entrega_estado` (
  `id_estado` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cat_entrega_estado` (`id_estado`, `nombre`, `estado`) VALUES
(1, 'Programada', 1),
(2, 'Entregada', 1),
(3, 'Anulada', 1);

CREATE TABLE `cat_etapa_estado` (
  `id_estado` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cat_etapa_estado` (`id_estado`, `nombre`, `estado`) VALUES
(1, 'Pendiente', 1),
(2, 'Observada', 1),
(3, 'Aprobada', 1),
(4, 'Rechazada', 1);

CREATE TABLE `cat_solicitud_estado` (
  `id_estado` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cat_solicitud_estado` (`id_estado`, `nombre`, `estado`) VALUES
(1, 'Borrador', 1),
(2, 'Enviada', 1),
(3, 'En evaluacion', 1),
(4, 'Aprobada', 1),
(5, 'Rechazada', 1),
(6, 'Anulada', 1);

CREATE TABLE `comunas` (
  `id_comuna` int(11) NOT NULL,
  `id_provincia` int(11) NOT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `nombre` varchar(120) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `documentos` (
  `id_documento` bigint(20) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `entidad` varchar(60) NOT NULL,
  `id_entidad` bigint(20) NOT NULL,
  `tipo` varchar(80) NOT NULL,
  `archivo_path` varchar(255) NOT NULL,
  `hash` varchar(80) DEFAULT NULL,
  `subido_por_usuario` int(11) DEFAULT NULL,
  `subido_por_portal` tinyint(1) NOT NULL DEFAULT 0,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `entregas` (
  `id_entrega` bigint(20) NOT NULL,
  `id_solicitud` bigint(20) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `id_beneficiario` bigint(20) NOT NULL,
  `tipo_programacion` varchar(20) NOT NULL,
  `fecha_programada` datetime DEFAULT NULL,
  `fecha_entrega` datetime DEFAULT NULL,
  `monto_entregado` decimal(12,2) DEFAULT NULL,
  `medio` varchar(30) DEFAULT NULL,
  `referencia` varchar(120) DEFAULT NULL,
  `id_estado` int(11) NOT NULL,
  `entregado_por` int(11) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `evaluaciones_sociales` (
  `id_eval` bigint(20) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `id_beneficiario` bigint(20) NOT NULL,
  `id_solicitud` bigint(20) DEFAULT NULL,
  `informe_social` mediumtext DEFAULT NULL,
  `puntaje` decimal(10,2) DEFAULT NULL,
  `recomendacion` varchar(120) DEFAULT NULL,
  `evaluado_por` int(11) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `grupos_familiares` (
  `id_grupo` bigint(20) NOT NULL,
  `id_beneficiario_titular` bigint(20) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `id_comuna` int(11) DEFAULT NULL,
  `id_localidad` int(11) DEFAULT NULL,
  `observacion` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `grupo_integrantes` (
  `id_integrante` bigint(20) NOT NULL,
  `id_grupo` bigint(20) NOT NULL,
  `rut` varchar(12) DEFAULT NULL,
  `nombres` varchar(120) NOT NULL,
  `apellidos` varchar(120) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `parentesco` varchar(60) NOT NULL,
  `es_carga` tinyint(1) NOT NULL DEFAULT 0,
  `ingreso_mensual` decimal(12,2) DEFAULT NULL,
  `discapacidad` tinyint(1) NOT NULL DEFAULT 0,
  `observacion` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `integraciones` (
  `id_integracion` bigint(20) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `tipo` varchar(40) NOT NULL,
  `endpoint` varchar(255) DEFAULT NULL,
  `token_enc` text DEFAULT NULL,
  `configuracion` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`configuracion`)),
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `integracion_logs` (
  `id_log` bigint(20) NOT NULL,
  `id_integracion` bigint(20) NOT NULL,
  `evento` varchar(80) NOT NULL,
  `request_payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`request_payload`)),
  `response_payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`response_payload`)),
  `http_code` int(11) DEFAULT NULL,
  `ok` tinyint(1) NOT NULL DEFAULT 0,
  `mensaje` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `localidades` (
  `id_localidad` int(11) NOT NULL,
  `id_comuna` int(11) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `municipios` (
  `id_municipio` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `rut` varchar(12) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `id_comuna` int(11) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `logo_path` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `muni_email_config` (
  `id_config` bigint(20) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `nombre_casilla` varchar(120) DEFAULT NULL,
  `from_name` varchar(120) NOT NULL,
  `from_email` varchar(160) NOT NULL,
  `smtp_host` varchar(160) NOT NULL,
  `smtp_port` int(11) NOT NULL DEFAULT 587,
  `smtp_secure` varchar(10) DEFAULT NULL,
  `smtp_auth` tinyint(1) NOT NULL DEFAULT 1,
  `smtp_user` varchar(160) NOT NULL,
  `smtp_password_enc` text NOT NULL,
  `reply_to_email` varchar(160) DEFAULT NULL,
  `max_por_minuto` int(11) DEFAULT NULL,
  `timeout_seg` int(11) DEFAULT NULL,
  `ultimo_test_ok` tinyint(1) NOT NULL DEFAULT 0,
  `ultimo_test_fecha` datetime DEFAULT NULL,
  `ultimo_test_mensaje` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `muni_email_templates` (
  `id_template` bigint(20) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `codigo` varchar(60) NOT NULL,
  `asunto` varchar(200) NOT NULL,
  `cuerpo_html` mediumtext NOT NULL,
  `cuerpo_text` mediumtext DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `notificaciones` (
  `id_notificacion` bigint(20) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `canal` varchar(20) NOT NULL DEFAULT 'EMAIL',
  `destinatario_email` varchar(160) NOT NULL,
  `asunto` varchar(200) NOT NULL,
  `cuerpo_html` mediumtext DEFAULT NULL,
  `cuerpo_text` mediumtext DEFAULT NULL,
  `entidad` varchar(60) DEFAULT NULL,
  `id_entidad` bigint(20) DEFAULT NULL,
  `envio_estado` varchar(20) NOT NULL DEFAULT 'PENDIENTE',
  `intentos` int(11) NOT NULL DEFAULT 0,
  `ultimo_error` varchar(255) DEFAULT NULL,
  `programada_para` datetime DEFAULT NULL,
  `enviada_en` datetime DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `observaciones_solicitud` (
  `id_obs` bigint(20) NOT NULL,
  `id_solicitud` bigint(20) NOT NULL,
  `tipo` varchar(60) NOT NULL,
  `mensaje` text NOT NULL,
  `visible_portal` tinyint(1) NOT NULL DEFAULT 1,
  `creado_por` int(11) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `parametros_sistema` (
  `id_param` bigint(20) NOT NULL,
  `id_municipio` int(11) DEFAULT NULL,
  `clave` varchar(100) NOT NULL,
  `valor` text NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `periodos_postulacion` (
  `id_periodo` bigint(20) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_termino` datetime NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL,
  `clave` varchar(120) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `presupuestos` (
  `id_presupuesto` bigint(20) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `monto_total` decimal(14,2) NOT NULL DEFAULT 0.00,
  `monto_comprometido` decimal(14,2) NOT NULL DEFAULT 0.00,
  `monto_pagado` decimal(14,2) NOT NULL DEFAULT 0.00,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `presupuesto_beneficio` (
  `id_pb` bigint(20) NOT NULL,
  `id_presupuesto` bigint(20) NOT NULL,
  `id_beneficio` bigint(20) NOT NULL,
  `monto_asignado` decimal(14,2) NOT NULL DEFAULT 0.00,
  `monto_utilizado` decimal(14,2) NOT NULL DEFAULT 0.00,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `provincias` (
  `id_provincia` int(11) NOT NULL,
  `id_region` int(11) NOT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `nombre` varchar(120) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `reclamos` (
  `id_reclamo` bigint(20) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `id_beneficiario` bigint(20) NOT NULL,
  `id_solicitud` bigint(20) DEFAULT NULL,
  `tipo` varchar(60) NOT NULL,
  `mensaje` text NOT NULL,
  `respuesta` text DEFAULT NULL,
  `resuelto` tinyint(1) NOT NULL DEFAULT 0,
  `resuelto_por` int(11) DEFAULT NULL,
  `fecha_resolucion` datetime DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `regiones` (
  `id_region` int(11) NOT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `nombre` varchar(120) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `reglas_control` (
  `id_regla` bigint(20) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `tipo` varchar(40) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `expresion` text DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `resoluciones` (
  `id_resolucion` bigint(20) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `id_solicitud` bigint(20) NOT NULL,
  `numero_resolucion` varchar(80) NOT NULL,
  `fecha` date NOT NULL,
  `archivo_path` varchar(255) DEFAULT NULL,
  `emitido_por` int(11) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`id_rol`, `nombre`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'Admin del sistema municipal', 1, '2025-12-14 14:15:15', NULL),
(2, 'AsistenteSocial', 'Evalúa solicitudes', 1, '2025-12-14 14:15:15', NULL),
(3, 'Jefatura', 'Aprueba etapa jefatura', 1, '2025-12-14 14:15:15', NULL),
(4, 'Finanzas', 'Gestiona pagos/entregas', 1, '2025-12-14 14:15:15', NULL);

CREATE TABLE `rol_permiso` (
  `id_rol` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `rsh_fichas` (
  `id_rsh` bigint(20) NOT NULL,
  `id_beneficiario` bigint(20) NOT NULL,
  `folio` varchar(40) NOT NULL,
  `tramo` varchar(40) DEFAULT NULL,
  `detalle` varchar(120) DEFAULT NULL,
  `fecha_emision` date DEFAULT NULL,
  `fecha_vigencia` date DEFAULT NULL,
  `fuente` varchar(20) NOT NULL DEFAULT 'Manual',
  `archivo_path` varchar(255) DEFAULT NULL,
  `observacion` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `sesiones` (
  `id_sesion` bigint(20) NOT NULL,
  `tipo_actor` varchar(20) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_beneficiario` bigint(20) DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `inicio` datetime NOT NULL DEFAULT current_timestamp(),
  `fin` datetime DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `solicitudes` (
  `id_solicitud` bigint(20) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `id_beneficiario` bigint(20) NOT NULL,
  `id_beneficio` bigint(20) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `canal` varchar(20) NOT NULL DEFAULT 'Portal',
  `fecha_solicitud` datetime NOT NULL DEFAULT current_timestamp(),
  `motivo_rechazo` varchar(255) DEFAULT NULL,
  `creado_por_usuario` int(11) DEFAULT NULL,
  `creado_por_portal` tinyint(1) NOT NULL DEFAULT 1,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `solicitudes_etapas` (
  `id_sol_etapa` bigint(20) NOT NULL,
  `id_solicitud` bigint(20) NOT NULL,
  `id_etapa` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `comentario` text DEFAULT NULL,
  `asignado_a` int(11) DEFAULT NULL,
  `fecha_asignacion` datetime DEFAULT NULL,
  `fecha_resolucion` datetime DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `solicitud_documentos` (
  `id_doc` bigint(20) NOT NULL,
  `id_solicitud` bigint(20) NOT NULL,
  `nombre_documento` varchar(120) NOT NULL,
  `archivo_path` varchar(255) NOT NULL,
  `checksum` varchar(80) DEFAULT NULL,
  `subido_por_usuario` int(11) DEFAULT NULL,
  `subido_por_portal` tinyint(1) NOT NULL DEFAULT 1,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `tipos_beneficiario` (
  `id_tipo_beneficiario` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `tipos_beneficio` (
  `id_tipo_beneficio` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `rut` varchar(12) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `foto_path` varchar(255) DEFAULT NULL,
  `ultimo_acceso` datetime DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `usuario_rol` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `visitas_domiciliarias` (
  `id_visita` bigint(20) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `id_beneficiario` bigint(20) NOT NULL,
  `id_solicitud` bigint(20) DEFAULT NULL,
  `fecha_visita` datetime NOT NULL,
  `observaciones` text DEFAULT NULL,
  `resultado` varchar(120) DEFAULT NULL,
  `usuario_responsable` int(11) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `workflow_etapas` (
  `id_etapa` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `orden` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `id_rol_requerido` int(11) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `alertas_sistema`
  ADD PRIMARY KEY (`id_alerta`),
  ADD KEY `fk_alerta_muni` (`id_municipio`),
  ADD KEY `fk_alerta_ben` (`id_beneficiario`),
  ADD KEY `fk_alerta_sol` (`id_solicitud`),
  ADD KEY `fk_alerta_user` (`resuelta_por`);

ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`id_auditoria`),
  ADD KEY `idx_aud_actor` (`tipo_actor`,`created_at`),
  ADD KEY `idx_aud_entidad` (`entidad`);

ALTER TABLE `beneficiarios`
  ADD PRIMARY KEY (`id_beneficiario`),
  ADD UNIQUE KEY `uq_ben_rut` (`rut`),
  ADD KEY `fk_ben_muni` (`id_municipio_principal`),
  ADD KEY `fk_ben_tipo` (`id_tipo_beneficiario`),
  ADD KEY `fk_ben_comuna` (`id_comuna`),
  ADD KEY `fk_ben_localidad` (`id_localidad`);

ALTER TABLE `beneficiario_cuentas`
  ADD PRIMARY KEY (`id_cuenta`),
  ADD UNIQUE KEY `uq_ben_login` (`rut_login`),
  ADD UNIQUE KEY `uq_ben_cuenta` (`id_beneficiario`);

ALTER TABLE `beneficios`
  ADD PRIMARY KEY (`id_beneficio`),
  ADD KEY `fk_benef_tipo` (`id_tipo_beneficio`),
  ADD KEY `fk_benef_estado` (`id_estado`),
  ADD KEY `idx_benef_muni` (`id_municipio`,`estado`),
  ADD KEY `idx_benef_publico` (`id_municipio`,`id_estado`,`estado`);

ALTER TABLE `beneficio_requisitos`
  ADD PRIMARY KEY (`id_req`),
  ADD KEY `fk_req_benef` (`id_beneficio`);

ALTER TABLE `cat_beneficio_estado`
  ADD PRIMARY KEY (`id_estado`),
  ADD UNIQUE KEY `uq_benef_estado` (`nombre`);

ALTER TABLE `cat_entrega_estado`
  ADD PRIMARY KEY (`id_estado`),
  ADD UNIQUE KEY `uq_entrega_estado` (`nombre`);

ALTER TABLE `cat_etapa_estado`
  ADD PRIMARY KEY (`id_estado`),
  ADD UNIQUE KEY `uq_etapa_estado` (`nombre`);

ALTER TABLE `cat_solicitud_estado`
  ADD PRIMARY KEY (`id_estado`),
  ADD UNIQUE KEY `uq_sol_estado` (`nombre`);

ALTER TABLE `comunas`
  ADD PRIMARY KEY (`id_comuna`),
  ADD UNIQUE KEY `uq_comuna` (`id_provincia`,`nombre`);

ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id_documento`),
  ADD KEY `fk_doc_muni` (`id_municipio`),
  ADD KEY `fk_doc_user` (`subido_por_usuario`),
  ADD KEY `idx_doc_ref` (`entidad`,`id_entidad`,`estado`);

ALTER TABLE `entregas`
  ADD PRIMARY KEY (`id_entrega`),
  ADD KEY `fk_ent_sol` (`id_solicitud`),
  ADD KEY `fk_ent_estado` (`id_estado`),
  ADD KEY `fk_ent_user` (`entregado_por`),
  ADD KEY `idx_ent_programadas` (`id_municipio`,`id_estado`,`fecha_programada`,`estado`),
  ADD KEY `idx_ent_benef` (`id_beneficiario`,`estado`);

ALTER TABLE `evaluaciones_sociales`
  ADD PRIMARY KEY (`id_eval`),
  ADD KEY `fk_eval_muni` (`id_municipio`),
  ADD KEY `fk_eval_ben` (`id_beneficiario`),
  ADD KEY `fk_eval_sol` (`id_solicitud`),
  ADD KEY `fk_eval_user` (`evaluado_por`);

ALTER TABLE `grupos_familiares`
  ADD PRIMARY KEY (`id_grupo`),
  ADD KEY `fk_grupo_titular` (`id_beneficiario_titular`),
  ADD KEY `fk_grupo_comuna` (`id_comuna`),
  ADD KEY `fk_grupo_localidad` (`id_localidad`);

ALTER TABLE `grupo_integrantes`
  ADD PRIMARY KEY (`id_integrante`),
  ADD KEY `fk_integrante_grupo` (`id_grupo`);

ALTER TABLE `integraciones`
  ADD PRIMARY KEY (`id_integracion`),
  ADD KEY `fk_int_muni` (`id_municipio`);

ALTER TABLE `integracion_logs`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `fk_il_int` (`id_integracion`);

ALTER TABLE `localidades`
  ADD PRIMARY KEY (`id_localidad`),
  ADD UNIQUE KEY `uq_localidad` (`id_comuna`,`nombre`);

ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id_municipio`),
  ADD UNIQUE KEY `uq_muni_rut` (`rut`),
  ADD KEY `fk_muni_comuna` (`id_comuna`);

ALTER TABLE `muni_email_config`
  ADD PRIMARY KEY (`id_config`),
  ADD KEY `idx_mec_activa` (`id_municipio`,`estado`);

ALTER TABLE `muni_email_templates`
  ADD PRIMARY KEY (`id_template`),
  ADD UNIQUE KEY `uq_template` (`id_municipio`,`codigo`);

ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id_notificacion`),
  ADD KEY `idx_notif` (`id_municipio`,`envio_estado`,`programada_para`,`estado`),
  ADD KEY `idx_notif_ref` (`entidad`,`id_entidad`);

ALTER TABLE `observaciones_solicitud`
  ADD PRIMARY KEY (`id_obs`),
  ADD KEY `fk_obs_sol` (`id_solicitud`),
  ADD KEY `fk_obs_user` (`creado_por`);

ALTER TABLE `parametros_sistema`
  ADD PRIMARY KEY (`id_param`),
  ADD UNIQUE KEY `uq_param` (`id_municipio`,`clave`);

ALTER TABLE `periodos_postulacion`
  ADD PRIMARY KEY (`id_periodo`),
  ADD KEY `idx_periodo` (`id_municipio`,`estado`,`fecha_inicio`,`fecha_termino`);

ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`),
  ADD UNIQUE KEY `uq_permiso` (`clave`);

ALTER TABLE `presupuestos`
  ADD PRIMARY KEY (`id_presupuesto`),
  ADD UNIQUE KEY `uq_presu` (`id_municipio`,`anio`);

ALTER TABLE `presupuesto_beneficio`
  ADD PRIMARY KEY (`id_pb`),
  ADD UNIQUE KEY `uq_pb` (`id_presupuesto`,`id_beneficio`),
  ADD KEY `fk_pb_benef` (`id_beneficio`);

ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id_provincia`),
  ADD UNIQUE KEY `uq_prov` (`id_region`,`nombre`);

ALTER TABLE `reclamos`
  ADD PRIMARY KEY (`id_reclamo`),
  ADD KEY `fk_rec_muni` (`id_municipio`),
  ADD KEY `fk_rec_ben` (`id_beneficiario`),
  ADD KEY `fk_rec_sol` (`id_solicitud`),
  ADD KEY `fk_rec_user` (`resuelto_por`);

ALTER TABLE `regiones`
  ADD PRIMARY KEY (`id_region`),
  ADD UNIQUE KEY `uq_region` (`nombre`);

ALTER TABLE `reglas_control`
  ADD PRIMARY KEY (`id_regla`),
  ADD KEY `fk_regla_muni` (`id_municipio`);

ALTER TABLE `resoluciones`
  ADD PRIMARY KEY (`id_resolucion`),
  ADD UNIQUE KEY `uq_res` (`id_municipio`,`numero_resolucion`),
  ADD KEY `fk_res_sol` (`id_solicitud`),
  ADD KEY `fk_res_user` (`emitido_por`);

ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `uq_rol` (`nombre`);

ALTER TABLE `rol_permiso`
  ADD PRIMARY KEY (`id_rol`,`id_permiso`),
  ADD KEY `fk_rp_permiso` (`id_permiso`);

ALTER TABLE `rsh_fichas`
  ADD PRIMARY KEY (`id_rsh`),
  ADD UNIQUE KEY `uq_rsh` (`id_beneficiario`,`folio`);

ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`id_sesion`),
  ADD KEY `idx_sesion_actor` (`tipo_actor`,`inicio`);

ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `fk_sol_estado` (`id_estado`),
  ADD KEY `fk_sol_user` (`creado_por_usuario`),
  ADD KEY `idx_sol_muni_estado` (`id_municipio`,`id_estado`,`estado`),
  ADD KEY `idx_sol_ben` (`id_beneficiario`,`estado`),
  ADD KEY `idx_sol_beneficio` (`id_beneficio`,`estado`);

ALTER TABLE `solicitudes_etapas`
  ADD PRIMARY KEY (`id_sol_etapa`),
  ADD KEY `fk_se_etapa` (`id_etapa`),
  ADD KEY `fk_se_user` (`asignado_a`),
  ADD KEY `idx_se_sol` (`id_solicitud`,`estado`),
  ADD KEY `idx_se_estado` (`id_estado`,`estado`);

ALTER TABLE `solicitud_documentos`
  ADD PRIMARY KEY (`id_doc`),
  ADD KEY `fk_sdoc_sol` (`id_solicitud`),
  ADD KEY `fk_sdoc_user` (`subido_por_usuario`);

ALTER TABLE `tipos_beneficiario`
  ADD PRIMARY KEY (`id_tipo_beneficiario`),
  ADD UNIQUE KEY `uq_tipo_ben` (`nombre`);

ALTER TABLE `tipos_beneficio`
  ADD PRIMARY KEY (`id_tipo_beneficio`),
  ADD UNIQUE KEY `uq_tipo_beneficio` (`nombre`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `uq_user_email` (`email`),
  ADD UNIQUE KEY `uq_user_muni_rut` (`id_municipio`,`rut`);

ALTER TABLE `usuario_rol`
  ADD PRIMARY KEY (`id_usuario`,`id_rol`),
  ADD KEY `fk_ur_rol` (`id_rol`);

ALTER TABLE `visitas_domiciliarias`
  ADD PRIMARY KEY (`id_visita`),
  ADD KEY `fk_vis_muni` (`id_municipio`),
  ADD KEY `fk_vis_ben` (`id_beneficiario`),
  ADD KEY `fk_vis_sol` (`id_solicitud`),
  ADD KEY `fk_vis_user` (`usuario_responsable`);

ALTER TABLE `workflow_etapas`
  ADD PRIMARY KEY (`id_etapa`),
  ADD UNIQUE KEY `uq_etapa` (`id_municipio`,`orden`),
  ADD KEY `fk_etapa_rol` (`id_rol_requerido`);

ALTER TABLE `alertas_sistema`
  MODIFY `id_alerta` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `auditoria`
  MODIFY `id_auditoria` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `beneficiarios`
  MODIFY `id_beneficiario` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `beneficiario_cuentas`
  MODIFY `id_cuenta` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `beneficios`
  MODIFY `id_beneficio` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `beneficio_requisitos`
  MODIFY `id_req` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `cat_beneficio_estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE `cat_entrega_estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE `cat_etapa_estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE `cat_solicitud_estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
ALTER TABLE `comunas`
  MODIFY `id_comuna` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `documentos`
  MODIFY `id_documento` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `entregas`
  MODIFY `id_entrega` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `evaluaciones_sociales`
  MODIFY `id_eval` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `grupos_familiares`
  MODIFY `id_grupo` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `grupo_integrantes`
  MODIFY `id_integrante` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `integraciones`
  MODIFY `id_integracion` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `integracion_logs`
  MODIFY `id_log` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `localidades`
  MODIFY `id_localidad` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `municipios`
  MODIFY `id_municipio` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `muni_email_config`
  MODIFY `id_config` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `muni_email_templates`
  MODIFY `id_template` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `notificaciones`
  MODIFY `id_notificacion` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `observaciones_solicitud`
  MODIFY `id_obs` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `parametros_sistema`
  MODIFY `id_param` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `periodos_postulacion`
  MODIFY `id_periodo` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `presupuestos`
  MODIFY `id_presupuesto` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `presupuesto_beneficio`
  MODIFY `id_pb` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `provincias`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `reclamos`
  MODIFY `id_reclamo` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `regiones`
  MODIFY `id_region` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `reglas_control`
  MODIFY `id_regla` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `resoluciones`
  MODIFY `id_resolucion` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE `rol_permiso`
  MODIFY `id_rol` int(11) NOT NULL;
ALTER TABLE `rsh_fichas`
  MODIFY `id_rsh` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `sesiones`
  MODIFY `id_sesion` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `solicitudes`
  MODIFY `id_solicitud` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `solicitudes_etapas`
  MODIFY `id_sol_etapa` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `solicitud_documentos`
  MODIFY `id_doc` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `tipos_beneficiario`
  MODIFY `id_tipo_beneficiario` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `tipos_beneficio`
  MODIFY `id_tipo_beneficio` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `usuario_rol`
  MODIFY `id_usuario` int(11) NOT NULL;
ALTER TABLE `visitas_domiciliarias`
  MODIFY `id_visita` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `workflow_etapas`
  MODIFY `id_etapa` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `alertas_sistema`
  ADD CONSTRAINT `fk_alerta_ben` FOREIGN KEY (`id_beneficiario`) REFERENCES `beneficiarios` (`id_beneficiario`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_alerta_muni` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_alerta_sol` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitudes` (`id_solicitud`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_alerta_user` FOREIGN KEY (`resuelta_por`) REFERENCES `usuarios` (`id_usuario`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `beneficiarios`
  ADD CONSTRAINT `fk_ben_comuna` FOREIGN KEY (`id_comuna`) REFERENCES `comunas` (`id_comuna`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ben_localidad` FOREIGN KEY (`id_localidad`) REFERENCES `localidades` (`id_localidad`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ben_muni` FOREIGN KEY (`id_municipio_principal`) REFERENCES `municipios` (`id_municipio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ben_tipo` FOREIGN KEY (`id_tipo_beneficiario`) REFERENCES `tipos_beneficiario` (`id_tipo_beneficiario`) ON UPDATE CASCADE;

ALTER TABLE `beneficiario_cuentas`
  ADD CONSTRAINT `fk_bencuenta_ben` FOREIGN KEY (`id_beneficiario`) REFERENCES `beneficiarios` (`id_beneficiario`) ON UPDATE CASCADE;

ALTER TABLE `beneficios`
  ADD CONSTRAINT `fk_benef_estado` FOREIGN KEY (`id_estado`) REFERENCES `cat_beneficio_estado` (`id_estado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_benef_muni` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_benef_tipo` FOREIGN KEY (`id_tipo_beneficio`) REFERENCES `tipos_beneficio` (`id_tipo_beneficio`) ON UPDATE CASCADE;

ALTER TABLE `beneficio_requisitos`
  ADD CONSTRAINT `fk_req_benef` FOREIGN KEY (`id_beneficio`) REFERENCES `beneficios` (`id_beneficio`) ON UPDATE CASCADE;

ALTER TABLE `comunas`
  ADD CONSTRAINT `fk_comuna_prov` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`id_provincia`) ON UPDATE CASCADE;

ALTER TABLE `documentos`
  ADD CONSTRAINT `fk_doc_muni` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_doc_user` FOREIGN KEY (`subido_por_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `entregas`
  ADD CONSTRAINT `fk_ent_ben` FOREIGN KEY (`id_beneficiario`) REFERENCES `beneficiarios` (`id_beneficiario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ent_estado` FOREIGN KEY (`id_estado`) REFERENCES `cat_entrega_estado` (`id_estado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ent_muni` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ent_sol` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitudes` (`id_solicitud`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ent_user` FOREIGN KEY (`entregado_por`) REFERENCES `usuarios` (`id_usuario`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `evaluaciones_sociales`
  ADD CONSTRAINT `fk_eval_ben` FOREIGN KEY (`id_beneficiario`) REFERENCES `beneficiarios` (`id_beneficiario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_eval_muni` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_eval_sol` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitudes` (`id_solicitud`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_eval_user` FOREIGN KEY (`evaluado_por`) REFERENCES `usuarios` (`id_usuario`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `grupos_familiares`
  ADD CONSTRAINT `fk_grupo_comuna` FOREIGN KEY (`id_comuna`) REFERENCES `comunas` (`id_comuna`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_grupo_localidad` FOREIGN KEY (`id_localidad`) REFERENCES `localidades` (`id_localidad`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_grupo_titular` FOREIGN KEY (`id_beneficiario_titular`) REFERENCES `beneficiarios` (`id_beneficiario`) ON UPDATE CASCADE;

ALTER TABLE `grupo_integrantes`
  ADD CONSTRAINT `fk_integrante_grupo` FOREIGN KEY (`id_grupo`) REFERENCES `grupos_familiares` (`id_grupo`) ON UPDATE CASCADE;

ALTER TABLE `integraciones`
  ADD CONSTRAINT `fk_int_muni` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`) ON UPDATE CASCADE;

ALTER TABLE `integracion_logs`
  ADD CONSTRAINT `fk_il_int` FOREIGN KEY (`id_integracion`) REFERENCES `integraciones` (`id_integracion`) ON UPDATE CASCADE;

ALTER TABLE `localidades`
  ADD CONSTRAINT `fk_localidad_comuna` FOREIGN KEY (`id_comuna`) REFERENCES `comunas` (`id_comuna`) ON UPDATE CASCADE;

ALTER TABLE `municipios`
  ADD CONSTRAINT `fk_muni_comuna` FOREIGN KEY (`id_comuna`) REFERENCES `comunas` (`id_comuna`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `muni_email_config`
  ADD CONSTRAINT `fk_mec_muni` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`) ON UPDATE CASCADE;

ALTER TABLE `muni_email_templates`
  ADD CONSTRAINT `fk_met_muni` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`) ON UPDATE CASCADE;

ALTER TABLE `notificaciones`
  ADD CONSTRAINT `fk_notif_muni` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`) ON UPDATE CASCADE;

ALTER TABLE `observaciones_solicitud`
  ADD CONSTRAINT `fk_obs_sol` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitudes` (`id_solicitud`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_obs_user` FOREIGN KEY (`creado_por`) REFERENCES `usuarios` (`id_usuario`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `periodos_postulacion`
  ADD CONSTRAINT `fk_periodo_muni` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`) ON UPDATE CASCADE;

ALTER TABLE `presupuestos`
  ADD CONSTRAINT `fk_presu_muni` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`) ON UPDATE CASCADE;

ALTER TABLE `presupuesto_beneficio`
  ADD CONSTRAINT `fk_pb_benef` FOREIGN KEY (`id_beneficio`) REFERENCES `beneficios` (`id_beneficio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pb_presu` FOREIGN KEY (`id_presupuesto`) REFERENCES `presupuestos` (`id_presupuesto`) ON UPDATE CASCADE;

ALTER TABLE `provincias`
  ADD CONSTRAINT `fk_prov_region` FOREIGN KEY (`id_region`) REFERENCES `regiones` (`id_region`) ON UPDATE CASCADE;

ALTER TABLE `reclamos`
  ADD CONSTRAINT `fk_rec_ben` FOREIGN KEY (`id_beneficiario`) REFERENCES `beneficiarios` (`id_beneficiario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rec_muni` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rec_sol` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitudes` (`id_solicitud`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rec_user` FOREIGN KEY (`resuelto_por`) REFERENCES `usuarios` (`id_usuario`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `reglas_control`
  ADD CONSTRAINT `fk_regla_muni` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`) ON UPDATE CASCADE;

ALTER TABLE `resoluciones`
  ADD CONSTRAINT `fk_res_muni` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_res_sol` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitudes` (`id_solicitud`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_res_user` FOREIGN KEY (`emitido_por`) REFERENCES `usuarios` (`id_usuario`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `rol_permiso`
  ADD CONSTRAINT `fk_rp_permiso` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id_permiso`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rp_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON UPDATE CASCADE;

ALTER TABLE `rsh_fichas`
  ADD CONSTRAINT `fk_rsh_ben` FOREIGN KEY (`id_beneficiario`) REFERENCES `beneficiarios` (`id_beneficiario`) ON UPDATE CASCADE;

ALTER TABLE `solicitudes`
  ADD CONSTRAINT `fk_sol_ben` FOREIGN KEY (`id_beneficiario`) REFERENCES `beneficiarios` (`id_beneficiario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sol_beneficio` FOREIGN KEY (`id_beneficio`) REFERENCES `beneficios` (`id_beneficio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sol_estado` FOREIGN KEY (`id_estado`) REFERENCES `cat_solicitud_estado` (`id_estado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sol_muni` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sol_user` FOREIGN KEY (`creado_por_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `solicitudes_etapas`
  ADD CONSTRAINT `fk_se_estado` FOREIGN KEY (`id_estado`) REFERENCES `cat_etapa_estado` (`id_estado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_se_etapa` FOREIGN KEY (`id_etapa`) REFERENCES `workflow_etapas` (`id_etapa`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_se_sol` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitudes` (`id_solicitud`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_se_user` FOREIGN KEY (`asignado_a`) REFERENCES `usuarios` (`id_usuario`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `solicitud_documentos`
  ADD CONSTRAINT `fk_sdoc_sol` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitudes` (`id_solicitud`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sdoc_user` FOREIGN KEY (`subido_por_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_user_muni` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`) ON UPDATE CASCADE;

ALTER TABLE `usuario_rol`
  ADD CONSTRAINT `fk_ur_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ur_user` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE;

ALTER TABLE `visitas_domiciliarias`
  ADD CONSTRAINT `fk_vis_ben` FOREIGN KEY (`id_beneficiario`) REFERENCES `beneficiarios` (`id_beneficiario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vis_muni` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vis_sol` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitudes` (`id_solicitud`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vis_user` FOREIGN KEY (`usuario_responsable`) REFERENCES `usuarios` (`id_usuario`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `workflow_etapas`
  ADD CONSTRAINT `fk_etapa_muni` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_etapa_rol` FOREIGN KEY (`id_rol_requerido`) REFERENCES `roles` (`id_rol`) ON DELETE SET NULL ON UPDATE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

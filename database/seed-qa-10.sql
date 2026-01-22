-- Datos QA para pruebas de flujo (10 registros por tabla)

-- Sección: unidades
INSERT INTO unidades (id, nombre, descripcion) VALUES
    (1, 'Unidad 1', 'Descripción unidad 1'),
    (2, 'Unidad 2', 'Descripción unidad 2'),
    (3, 'Unidad 3', 'Descripción unidad 3'),
    (4, 'Unidad 4', 'Descripción unidad 4'),
    (5, 'Unidad 5', 'Descripción unidad 5'),
    (6, 'Unidad 6', 'Descripción unidad 6'),
    (7, 'Unidad 7', 'Descripción unidad 7'),
    (8, 'Unidad 8', 'Descripción unidad 8'),
    (9, 'Unidad 9', 'Descripción unidad 9'),
    (10, 'Unidad 10', 'Descripción unidad 10');

-- Sección: roles
INSERT INTO roles (id, nombre, descripcion, estado) VALUES
    (1, 'Rol 1', 'Rol QA 1', 1),
    (2, 'Rol 2', 'Rol QA 2', 1),
    (3, 'Rol 3', 'Rol QA 3', 1),
    (4, 'Rol 4', 'Rol QA 4', 1),
    (5, 'Rol 5', 'Rol QA 5', 1),
    (6, 'Rol 6', 'Rol QA 6', 1),
    (7, 'Rol 7', 'Rol QA 7', 1),
    (8, 'Rol 8', 'Rol QA 8', 1),
    (9, 'Rol 9', 'Rol QA 9', 1),
    (10, 'Rol 10', 'Rol QA 10', 1);

-- Sección: users
INSERT INTO users (id, rut, nombre, apellido, correo, telefono, direccion, username, rol, unidad_id, password_hash, estado) VALUES
    (1, '100.000.001-2', 'Nombre1', 'Apellido1', 'user1@muni.cl', '+56 9 1000 0001', 'Dirección 1', 'usuario1', 'Rol 1', 1, '$2y$12$nNyFQLLuFHy7yjLILUTlIO3NQ96Vw5rS90YCDml1ZKINCPv7Lvshe', 1),
    (2, '100.000.002-3', 'Nombre2', 'Apellido2', 'user2@muni.cl', '+56 9 1000 0002', 'Dirección 2', 'usuario2', 'Rol 2', 2, '$2y$12$nNyFQLLuFHy7yjLILUTlIO3NQ96Vw5rS90YCDml1ZKINCPv7Lvshe', 1),
    (3, '100.000.003-4', 'Nombre3', 'Apellido3', 'user3@muni.cl', '+56 9 1000 0003', 'Dirección 3', 'usuario3', 'Rol 3', 3, '$2y$12$nNyFQLLuFHy7yjLILUTlIO3NQ96Vw5rS90YCDml1ZKINCPv7Lvshe', 1),
    (4, '100.000.004-5', 'Nombre4', 'Apellido4', 'user4@muni.cl', '+56 9 1000 0004', 'Dirección 4', 'usuario4', 'Rol 4', 4, '$2y$12$nNyFQLLuFHy7yjLILUTlIO3NQ96Vw5rS90YCDml1ZKINCPv7Lvshe', 1),
    (5, '100.000.005-6', 'Nombre5', 'Apellido5', 'user5@muni.cl', '+56 9 1000 0005', 'Dirección 5', 'usuario5', 'Rol 5', 5, '$2y$12$nNyFQLLuFHy7yjLILUTlIO3NQ96Vw5rS90YCDml1ZKINCPv7Lvshe', 1),
    (6, '100.000.006-7', 'Nombre6', 'Apellido6', 'user6@muni.cl', '+56 9 1000 0006', 'Dirección 6', 'usuario6', 'Rol 6', 6, '$2y$12$nNyFQLLuFHy7yjLILUTlIO3NQ96Vw5rS90YCDml1ZKINCPv7Lvshe', 1),
    (7, '100.000.007-8', 'Nombre7', 'Apellido7', 'user7@muni.cl', '+56 9 1000 0007', 'Dirección 7', 'usuario7', 'Rol 7', 7, '$2y$12$nNyFQLLuFHy7yjLILUTlIO3NQ96Vw5rS90YCDml1ZKINCPv7Lvshe', 1),
    (8, '100.000.008-9', 'Nombre8', 'Apellido8', 'user8@muni.cl', '+56 9 1000 0008', 'Dirección 8', 'usuario8', 'Rol 8', 8, '$2y$12$nNyFQLLuFHy7yjLILUTlIO3NQ96Vw5rS90YCDml1ZKINCPv7Lvshe', 1),
    (9, '100.000.009-1', 'Nombre9', 'Apellido9', 'user9@muni.cl', '+56 9 1000 0009', 'Dirección 9', 'usuario9', 'Rol 9', 9, '$2y$12$nNyFQLLuFHy7yjLILUTlIO3NQ96Vw5rS90YCDml1ZKINCPv7Lvshe', 1),
    (10, '100.000.010-2', 'Nombre10', 'Apellido10', 'user10@muni.cl', '+56 9 1000 0010', 'Dirección 10', 'usuario10', 'Rol 10', 10, '$2y$12$nNyFQLLuFHy7yjLILUTlIO3NQ96Vw5rS90YCDml1ZKINCPv7Lvshe', 1);

-- Sección: user_roles
INSERT INTO user_roles (user_id, role_id) VALUES
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 5),
    (6, 6),
    (7, 7),
    (8, 8),
    (9, 9),
    (10, 10);

-- Sección: permissions
INSERT INTO permissions (id, modulo, accion, descripcion) VALUES
    (1, 'modulo1', 'accion1', 'Permiso QA 1'),
    (2, 'modulo2', 'accion2', 'Permiso QA 2'),
    (3, 'modulo3', 'accion3', 'Permiso QA 3'),
    (4, 'modulo4', 'accion4', 'Permiso QA 4'),
    (5, 'modulo5', 'accion5', 'Permiso QA 5'),
    (6, 'modulo6', 'accion6', 'Permiso QA 6'),
    (7, 'modulo7', 'accion7', 'Permiso QA 7'),
    (8, 'modulo8', 'accion8', 'Permiso QA 8'),
    (9, 'modulo9', 'accion9', 'Permiso QA 9'),
    (10, 'modulo10', 'accion10', 'Permiso QA 10');

-- Sección: role_permissions
INSERT INTO role_permissions (role_id, permission_id) VALUES
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 5),
    (6, 6),
    (7, 7),
    (8, 8),
    (9, 9),
    (10, 10);

-- Sección: role_unit_permissions
INSERT INTO role_unit_permissions (role_id, unidad_id, permission_id) VALUES
    (1, 1, 1),
    (2, 2, 2),
    (3, 3, 3),
    (4, 4, 4),
    (5, 5, 5),
    (6, 6, 6),
    (7, 7, 7),
    (8, 8, 8),
    (9, 9, 9),
    (10, 10, 10);

-- Sección: user_sessions
INSERT INTO user_sessions (id, user_id, session_id, ip, user_agent) VALUES
    (1, 1, 'session-01', '127.0.0.1', 'QA Agent 1'),
    (2, 2, 'session-02', '127.0.0.2', 'QA Agent 2'),
    (3, 3, 'session-03', '127.0.0.3', 'QA Agent 3'),
    (4, 4, 'session-04', '127.0.0.4', 'QA Agent 4'),
    (5, 5, 'session-05', '127.0.0.5', 'QA Agent 5'),
    (6, 6, 'session-06', '127.0.0.6', 'QA Agent 6'),
    (7, 7, 'session-07', '127.0.0.7', 'QA Agent 7'),
    (8, 8, 'session-08', '127.0.0.8', 'QA Agent 8'),
    (9, 9, 'session-09', '127.0.0.9', 'QA Agent 9'),
    (10, 10, 'session-10', '127.0.0.10', 'QA Agent 10');

-- Sección: audit_logs
INSERT INTO audit_logs (id, user_id, tabla, accion, registro_id, descripcion) VALUES
    (1, 1, 'tabla1', 'accion1', 1, 'Registro QA 1'),
    (2, 2, 'tabla2', 'accion2', 2, 'Registro QA 2'),
    (3, 3, 'tabla3', 'accion3', 3, 'Registro QA 3'),
    (4, 4, 'tabla4', 'accion4', 4, 'Registro QA 4'),
    (5, 5, 'tabla5', 'accion5', 5, 'Registro QA 5'),
    (6, 6, 'tabla6', 'accion6', 6, 'Registro QA 6'),
    (7, 7, 'tabla7', 'accion7', 7, 'Registro QA 7'),
    (8, 8, 'tabla8', 'accion8', 8, 'Registro QA 8'),
    (9, 9, 'tabla9', 'accion9', 9, 'Registro QA 9'),
    (10, 10, 'tabla10', 'accion10', 10, 'Registro QA 10');

-- Sección: events
INSERT INTO events (id, titulo, descripcion, ubicacion, fecha_inicio, fecha_fin, tipo, cupos, publico_objetivo, estado, aprobacion_estado, habilitado, unidad_id, creado_por, encargado_id) VALUES
    (1, 'Evento 1', 'Descripción evento 1', 'Ubicación 1', '2025-01-01 09:00:00', '2025-01-01 18:00:00', 'Tipo 1', 51, 'Público 1', 'publicado', 'publicado', 1, 1, 1, 1),
    (2, 'Evento 2', 'Descripción evento 2', 'Ubicación 2', '2025-01-02 09:00:00', '2025-01-02 18:00:00', 'Tipo 2', 52, 'Público 2', 'publicado', 'publicado', 1, 2, 2, 2),
    (3, 'Evento 3', 'Descripción evento 3', 'Ubicación 3', '2025-01-03 09:00:00', '2025-01-03 18:00:00', 'Tipo 3', 53, 'Público 3', 'publicado', 'publicado', 1, 3, 3, 3),
    (4, 'Evento 4', 'Descripción evento 4', 'Ubicación 4', '2025-01-04 09:00:00', '2025-01-04 18:00:00', 'Tipo 4', 54, 'Público 4', 'publicado', 'publicado', 1, 4, 4, 4),
    (5, 'Evento 5', 'Descripción evento 5', 'Ubicación 5', '2025-01-05 09:00:00', '2025-01-05 18:00:00', 'Tipo 5', 55, 'Público 5', 'publicado', 'publicado', 1, 5, 5, 5),
    (6, 'Evento 6', 'Descripción evento 6', 'Ubicación 6', '2025-01-06 09:00:00', '2025-01-06 18:00:00', 'Tipo 6', 56, 'Público 6', 'publicado', 'publicado', 1, 6, 6, 6),
    (7, 'Evento 7', 'Descripción evento 7', 'Ubicación 7', '2025-01-07 09:00:00', '2025-01-07 18:00:00', 'Tipo 7', 57, 'Público 7', 'publicado', 'publicado', 1, 7, 7, 7),
    (8, 'Evento 8', 'Descripción evento 8', 'Ubicación 8', '2025-01-08 09:00:00', '2025-01-08 18:00:00', 'Tipo 8', 58, 'Público 8', 'publicado', 'publicado', 1, 8, 8, 8),
    (9, 'Evento 9', 'Descripción evento 9', 'Ubicación 9', '2025-01-09 09:00:00', '2025-01-09 18:00:00', 'Tipo 9', 59, 'Público 9', 'publicado', 'publicado', 1, 9, 9, 9),
    (10, 'Evento 10', 'Descripción evento 10', 'Ubicación 10', '2025-01-10 09:00:00', '2025-01-10 18:00:00', 'Tipo 10', 60, 'Público 10', 'publicado', 'publicado', 1, 10, 10, 10);

-- Sección: event_attachments
INSERT INTO event_attachments (id, event_id, archivo_nombre, archivo_ruta, archivo_tipo, subido_por) VALUES
    (1, 1, 'evento1.pdf', 'uploads/evento1.pdf', 'application/pdf', 1),
    (2, 2, 'evento2.pdf', 'uploads/evento2.pdf', 'application/pdf', 2),
    (3, 3, 'evento3.pdf', 'uploads/evento3.pdf', 'application/pdf', 3),
    (4, 4, 'evento4.pdf', 'uploads/evento4.pdf', 'application/pdf', 4),
    (5, 5, 'evento5.pdf', 'uploads/evento5.pdf', 'application/pdf', 5),
    (6, 6, 'evento6.pdf', 'uploads/evento6.pdf', 'application/pdf', 6),
    (7, 7, 'evento7.pdf', 'uploads/evento7.pdf', 'application/pdf', 7),
    (8, 8, 'evento8.pdf', 'uploads/evento8.pdf', 'application/pdf', 8),
    (9, 9, 'evento9.pdf', 'uploads/evento9.pdf', 'application/pdf', 9),
    (10, 10, 'evento10.pdf', 'uploads/evento10.pdf', 'application/pdf', 10);

-- Sección: authorities
INSERT INTO authorities (id, nombre, tipo, correo, telefono, fecha_inicio, fecha_fin, estado, aprobacion_estado, unidad_id) VALUES
    (1, 'Autoridad 1', 'Tipo 1', 'autoridad1@muni.cl', '+56 9 2000 0001', '2025-01-01', NULL, 1, 'vigente', 1),
    (2, 'Autoridad 2', 'Tipo 2', 'autoridad2@muni.cl', '+56 9 2000 0002', '2025-01-02', NULL, 1, 'vigente', 2),
    (3, 'Autoridad 3', 'Tipo 3', 'autoridad3@muni.cl', '+56 9 2000 0003', '2025-01-03', NULL, 1, 'vigente', 3),
    (4, 'Autoridad 4', 'Tipo 4', 'autoridad4@muni.cl', '+56 9 2000 0004', '2025-01-04', NULL, 1, 'vigente', 4),
    (5, 'Autoridad 5', 'Tipo 5', 'autoridad5@muni.cl', '+56 9 2000 0005', '2025-01-05', NULL, 1, 'vigente', 5),
    (6, 'Autoridad 6', 'Tipo 6', 'autoridad6@muni.cl', '+56 9 2000 0006', '2025-01-06', NULL, 1, 'vigente', 6),
    (7, 'Autoridad 7', 'Tipo 7', 'autoridad7@muni.cl', '+56 9 2000 0007', '2025-01-07', NULL, 1, 'vigente', 7),
    (8, 'Autoridad 8', 'Tipo 8', 'autoridad8@muni.cl', '+56 9 2000 0008', '2025-01-08', NULL, 1, 'vigente', 8),
    (9, 'Autoridad 9', 'Tipo 9', 'autoridad9@muni.cl', '+56 9 2000 0009', '2025-01-09', NULL, 1, 'vigente', 9),
    (10, 'Autoridad 10', 'Tipo 10', 'autoridad10@muni.cl', '+56 9 2000 0010', '2025-01-10', NULL, 1, 'vigente', 10);

-- Sección: event_authorities
INSERT INTO event_authorities (event_id, authority_id) VALUES
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 5),
    (6, 6),
    (7, 7),
    (8, 8),
    (9, 9),
    (10, 10);

-- Sección: event_authority_requests
INSERT INTO event_authority_requests (id, event_id, destinatario_nombre, destinatario_correo, token, correo_enviado, estado) VALUES
    (1, 1, 'Destinatario 1', 'destinatario1@muni.cl', 'token-01', 1, 'respondido'),
    (2, 2, 'Destinatario 2', 'destinatario2@muni.cl', 'token-02', 1, 'respondido'),
    (3, 3, 'Destinatario 3', 'destinatario3@muni.cl', 'token-03', 1, 'respondido'),
    (4, 4, 'Destinatario 4', 'destinatario4@muni.cl', 'token-04', 1, 'respondido'),
    (5, 5, 'Destinatario 5', 'destinatario5@muni.cl', 'token-05', 1, 'respondido'),
    (6, 6, 'Destinatario 6', 'destinatario6@muni.cl', 'token-06', 1, 'respondido'),
    (7, 7, 'Destinatario 7', 'destinatario7@muni.cl', 'token-07', 1, 'respondido'),
    (8, 8, 'Destinatario 8', 'destinatario8@muni.cl', 'token-08', 1, 'respondido'),
    (9, 9, 'Destinatario 9', 'destinatario9@muni.cl', 'token-09', 1, 'respondido'),
    (10, 10, 'Destinatario 10', 'destinatario10@muni.cl', 'token-10', 1, 'respondido');

-- Sección: event_authority_confirmations
INSERT INTO event_authority_confirmations (request_id, authority_id) VALUES
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 5),
    (6, 6),
    (7, 7),
    (8, 8),
    (9, 9),
    (10, 10);

-- Sección: authority_attachments
INSERT INTO authority_attachments (id, authority_id, archivo_nombre, archivo_ruta, archivo_tipo, subido_por) VALUES
    (1, 1, 'autoridad1.pdf', 'uploads/autoridad1.pdf', 'application/pdf', 1),
    (2, 2, 'autoridad2.pdf', 'uploads/autoridad2.pdf', 'application/pdf', 2),
    (3, 3, 'autoridad3.pdf', 'uploads/autoridad3.pdf', 'application/pdf', 3),
    (4, 4, 'autoridad4.pdf', 'uploads/autoridad4.pdf', 'application/pdf', 4),
    (5, 5, 'autoridad5.pdf', 'uploads/autoridad5.pdf', 'application/pdf', 5),
    (6, 6, 'autoridad6.pdf', 'uploads/autoridad6.pdf', 'application/pdf', 6),
    (7, 7, 'autoridad7.pdf', 'uploads/autoridad7.pdf', 'application/pdf', 7),
    (8, 8, 'autoridad8.pdf', 'uploads/autoridad8.pdf', 'application/pdf', 8),
    (9, 9, 'autoridad9.pdf', 'uploads/autoridad9.pdf', 'application/pdf', 9),
    (10, 10, 'autoridad10.pdf', 'uploads/autoridad10.pdf', 'application/pdf', 10);

-- Sección: municipalidad
INSERT INTO municipalidad (id, nombre, rut, direccion, telefono, correo, logo_path, logo_topbar_height, logo_login_height, logo_sidenav_height, logo_sidenav_height_sm, color_primary, color_secondary) VALUES
    (1, 'Municipalidad 1', '76.123.451-7', 'Dirección 1', '+56 2 3000 001', 'contacto1@muni.cl', 'assets/images/logo.png', 56, 48, 48, 36, '#1f6feb', '#0ea5e9'),
    (2, 'Municipalidad 2', '76.123.452-7', 'Dirección 2', '+56 2 3000 002', 'contacto2@muni.cl', 'assets/images/logo.png', 56, 48, 48, 36, '#1f6feb', '#0ea5e9'),
    (3, 'Municipalidad 3', '76.123.453-7', 'Dirección 3', '+56 2 3000 003', 'contacto3@muni.cl', 'assets/images/logo.png', 56, 48, 48, 36, '#1f6feb', '#0ea5e9'),
    (4, 'Municipalidad 4', '76.123.454-7', 'Dirección 4', '+56 2 3000 004', 'contacto4@muni.cl', 'assets/images/logo.png', 56, 48, 48, 36, '#1f6feb', '#0ea5e9'),
    (5, 'Municipalidad 5', '76.123.455-7', 'Dirección 5', '+56 2 3000 005', 'contacto5@muni.cl', 'assets/images/logo.png', 56, 48, 48, 36, '#1f6feb', '#0ea5e9'),
    (6, 'Municipalidad 6', '76.123.456-7', 'Dirección 6', '+56 2 3000 006', 'contacto6@muni.cl', 'assets/images/logo.png', 56, 48, 48, 36, '#1f6feb', '#0ea5e9'),
    (7, 'Municipalidad 7', '76.123.457-7', 'Dirección 7', '+56 2 3000 007', 'contacto7@muni.cl', 'assets/images/logo.png', 56, 48, 48, 36, '#1f6feb', '#0ea5e9'),
    (8, 'Municipalidad 8', '76.123.458-7', 'Dirección 8', '+56 2 3000 008', 'contacto8@muni.cl', 'assets/images/logo.png', 56, 48, 48, 36, '#1f6feb', '#0ea5e9'),
    (9, 'Municipalidad 9', '76.123.459-7', 'Dirección 9', '+56 2 3000 009', 'contacto9@muni.cl', 'assets/images/logo.png', 56, 48, 48, 36, '#1f6feb', '#0ea5e9'),
    (10, 'Municipalidad 10', '76.123.4510-7', 'Dirección 10', '+56 2 3000 010', 'contacto10@muni.cl', 'assets/images/logo.png', 56, 48, 48, 36, '#1f6feb', '#0ea5e9');

-- Sección: notificacion_correos
INSERT INTO notificacion_correos (id, correo_imap, password_imap, host_imap, puerto_imap, seguridad_imap, from_nombre, from_correo) VALUES
    (1, 'notifica1@muni.cl', 'Pass01', 'imap.muni1.cl', 993, 'ssl', 'Municipalidad 1', 'notifica1@muni.cl'),
    (2, 'notifica2@muni.cl', 'Pass02', 'imap.muni2.cl', 993, 'ssl', 'Municipalidad 2', 'notifica2@muni.cl'),
    (3, 'notifica3@muni.cl', 'Pass03', 'imap.muni3.cl', 993, 'ssl', 'Municipalidad 3', 'notifica3@muni.cl'),
    (4, 'notifica4@muni.cl', 'Pass04', 'imap.muni4.cl', 993, 'ssl', 'Municipalidad 4', 'notifica4@muni.cl'),
    (5, 'notifica5@muni.cl', 'Pass05', 'imap.muni5.cl', 993, 'ssl', 'Municipalidad 5', 'notifica5@muni.cl'),
    (6, 'notifica6@muni.cl', 'Pass06', 'imap.muni6.cl', 993, 'ssl', 'Municipalidad 6', 'notifica6@muni.cl'),
    (7, 'notifica7@muni.cl', 'Pass07', 'imap.muni7.cl', 993, 'ssl', 'Municipalidad 7', 'notifica7@muni.cl'),
    (8, 'notifica8@muni.cl', 'Pass08', 'imap.muni8.cl', 993, 'ssl', 'Municipalidad 8', 'notifica8@muni.cl'),
    (9, 'notifica9@muni.cl', 'Pass09', 'imap.muni9.cl', 993, 'ssl', 'Municipalidad 9', 'notifica9@muni.cl'),
    (10, 'notifica10@muni.cl', 'Pass10', 'imap.muni10.cl', 993, 'ssl', 'Municipalidad 10', 'notifica10@muni.cl');

-- Sección: notification_settings
INSERT INTO notification_settings (id, canal_email, canal_sms, canal_app, frecuencia) VALUES
    (1, 1, 0, 1, 'diario'),
    (2, 1, 0, 1, 'semanal'),
    (3, 1, 0, 1, 'mensual'),
    (4, 1, 0, 1, 'diario'),
    (5, 1, 0, 1, 'semanal'),
    (6, 1, 0, 1, 'mensual'),
    (7, 1, 0, 1, 'diario'),
    (8, 1, 0, 1, 'semanal'),
    (9, 1, 0, 1, 'mensual'),
    (10, 1, 0, 1, 'diario');

-- Sección: notification_rules
INSERT INTO notification_rules (id, evento, destino, canal, estado) VALUES
    (1, 'Evento regla 1', 'destino1@muni.cl', 'email', 'activa'),
    (2, 'Evento regla 2', 'destino2@muni.cl', 'email', 'activa'),
    (3, 'Evento regla 3', 'destino3@muni.cl', 'email', 'activa'),
    (4, 'Evento regla 4', 'destino4@muni.cl', 'email', 'activa'),
    (5, 'Evento regla 5', 'destino5@muni.cl', 'email', 'activa'),
    (6, 'Evento regla 6', 'destino6@muni.cl', 'email', 'activa'),
    (7, 'Evento regla 7', 'destino7@muni.cl', 'email', 'activa'),
    (8, 'Evento regla 8', 'destino8@muni.cl', 'email', 'activa'),
    (9, 'Evento regla 9', 'destino9@muni.cl', 'email', 'activa'),
    (10, 'Evento regla 10', 'destino10@muni.cl', 'email', 'activa');

-- Sección: document_categories
INSERT INTO document_categories (id, nombre, descripcion) VALUES
    (1, 'Categoría 1', 'Descripción categoría 1'),
    (2, 'Categoría 2', 'Descripción categoría 2'),
    (3, 'Categoría 3', 'Descripción categoría 3'),
    (4, 'Categoría 4', 'Descripción categoría 4'),
    (5, 'Categoría 5', 'Descripción categoría 5'),
    (6, 'Categoría 6', 'Descripción categoría 6'),
    (7, 'Categoría 7', 'Descripción categoría 7'),
    (8, 'Categoría 8', 'Descripción categoría 8'),
    (9, 'Categoría 9', 'Descripción categoría 9'),
    (10, 'Categoría 10', 'Descripción categoría 10');

-- Sección: document_tags
INSERT INTO document_tags (id, nombre) VALUES
    (1, 'Etiqueta 1'),
    (2, 'Etiqueta 2'),
    (3, 'Etiqueta 3'),
    (4, 'Etiqueta 4'),
    (5, 'Etiqueta 5'),
    (6, 'Etiqueta 6'),
    (7, 'Etiqueta 7'),
    (8, 'Etiqueta 8'),
    (9, 'Etiqueta 9'),
    (10, 'Etiqueta 10');

-- Sección: documents
INSERT INTO documents (id, titulo, descripcion, categoria_id, unidad_id, estado, created_by) VALUES
    (1, 'Documento 1', 'Descripción documento 1', 1, 1, 'vigente', 1),
    (2, 'Documento 2', 'Descripción documento 2', 2, 2, 'vigente', 2),
    (3, 'Documento 3', 'Descripción documento 3', 3, 3, 'vigente', 3),
    (4, 'Documento 4', 'Descripción documento 4', 4, 4, 'vigente', 4),
    (5, 'Documento 5', 'Descripción documento 5', 5, 5, 'vigente', 5),
    (6, 'Documento 6', 'Descripción documento 6', 6, 6, 'vigente', 6),
    (7, 'Documento 7', 'Descripción documento 7', 7, 7, 'vigente', 7),
    (8, 'Documento 8', 'Descripción documento 8', 8, 8, 'vigente', 8),
    (9, 'Documento 9', 'Descripción documento 9', 9, 9, 'vigente', 9),
    (10, 'Documento 10', 'Descripción documento 10', 10, 10, 'vigente', 10);

-- Sección: document_versions
INSERT INTO document_versions (id, document_id, version, archivo_ruta, archivo_tipo, vencimiento, created_by) VALUES
    (1, 1, 'v1.1', 'uploads/documento1.pdf', 'application/pdf', '2026-12-31', 1),
    (2, 2, 'v1.2', 'uploads/documento2.pdf', 'application/pdf', '2026-12-31', 2),
    (3, 3, 'v1.3', 'uploads/documento3.pdf', 'application/pdf', '2026-12-31', 3),
    (4, 4, 'v1.4', 'uploads/documento4.pdf', 'application/pdf', '2026-12-31', 4),
    (5, 5, 'v1.5', 'uploads/documento5.pdf', 'application/pdf', '2026-12-31', 5),
    (6, 6, 'v1.6', 'uploads/documento6.pdf', 'application/pdf', '2026-12-31', 6),
    (7, 7, 'v1.7', 'uploads/documento7.pdf', 'application/pdf', '2026-12-31', 7),
    (8, 8, 'v1.8', 'uploads/documento8.pdf', 'application/pdf', '2026-12-31', 8),
    (9, 9, 'v1.9', 'uploads/documento9.pdf', 'application/pdf', '2026-12-31', 9),
    (10, 10, 'v1.10', 'uploads/documento10.pdf', 'application/pdf', '2026-12-31', 10);

-- Sección: document_tag_links
INSERT INTO document_tag_links (document_id, tag_id) VALUES
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 5),
    (6, 6),
    (7, 7),
    (8, 8),
    (9, 9),
    (10, 10);

-- Sección: document_access
INSERT INTO document_access (document_id, role_id) VALUES
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 5),
    (6, 6),
    (7, 7),
    (8, 8),
    (9, 9),
    (10, 10);

-- Sección: document_shares
INSERT INTO document_shares (document_id, user_id) VALUES
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 5),
    (6, 6),
    (7, 7),
    (8, 8),
    (9, 9),
    (10, 10);

-- Sección: approval_flows
INSERT INTO approval_flows (id, nombre, entidad, unidad_id, sla_horas, estado) VALUES
    (1, 'Flujo 1', 'Entidad 1', 1, 48, 'activo'),
    (2, 'Flujo 2', 'Entidad 2', 2, 48, 'activo'),
    (3, 'Flujo 3', 'Entidad 3', 3, 48, 'activo'),
    (4, 'Flujo 4', 'Entidad 4', 4, 48, 'activo'),
    (5, 'Flujo 5', 'Entidad 5', 5, 48, 'activo'),
    (6, 'Flujo 6', 'Entidad 6', 6, 48, 'activo'),
    (7, 'Flujo 7', 'Entidad 7', 7, 48, 'activo'),
    (8, 'Flujo 8', 'Entidad 8', 8, 48, 'activo'),
    (9, 'Flujo 9', 'Entidad 9', 9, 48, 'activo'),
    (10, 'Flujo 10', 'Entidad 10', 10, 48, 'activo');

-- Sección: approval_steps
INSERT INTO approval_steps (id, flow_id, orden, responsable) VALUES
    (1, 1, 1, 'Responsable 1'),
    (2, 2, 1, 'Responsable 2'),
    (3, 3, 1, 'Responsable 3'),
    (4, 4, 1, 'Responsable 4'),
    (5, 5, 1, 'Responsable 5'),
    (6, 6, 1, 'Responsable 6'),
    (7, 7, 1, 'Responsable 7'),
    (8, 8, 1, 'Responsable 8'),
    (9, 9, 1, 'Responsable 9'),
    (10, 10, 1, 'Responsable 10');

USE mun_beneficios;

INSERT INTO municipios (id_municipio, nombre, rut, email, estado) VALUES
(1, 'Municipio Demo', '11111111-1', 'contacto@demo.cl', 1);

INSERT INTO tipos_beneficiario (id_tipo_beneficiario, nombre, descripcion) VALUES
(1, 'Persona Natural', 'Beneficiario persona natural');

INSERT INTO tipos_beneficio (id_tipo_beneficio, nombre, descripcion) VALUES
(1, 'Subsidio', 'Apoyo económico directo');

INSERT INTO permisos (id_permiso, clave, descripcion) VALUES
(1, 'admin.full', 'Acceso completo'),
(2, 'solicitudes.resolver', 'Resolver etapas de solicitud'),
(3, 'entregas.gestionar', 'Gestionar entregas');

INSERT INTO roles (id_rol, nombre, descripcion, estado) VALUES
(5, 'Beneficios', 'Operador de beneficios', 1);

INSERT INTO rol_permiso (id_rol, id_permiso) VALUES
(1,1),(2,2),(3,2),(4,3),(5,2);

INSERT INTO usuarios (id_usuario, id_municipio, nombre, apellido, rut, cargo, fecha_nacimiento, email, telefono, password_hash, estado)
VALUES (1, 1, 'Administrador', 'Demo', '11111111-1', 'Administrador', '1980-01-01', 'admin@demo.cl', '+56911111111', '$2y$10$hJahtF81P5aFccC9D1TXmeC4AnmIgjDKGTeOitnkBC9rWlH0I1EAK', 1);

INSERT INTO usuario_rol (id_usuario, id_rol) VALUES (1,1);

INSERT INTO beneficiarios (id_beneficiario, id_municipio_principal, id_tipo_beneficiario, rut, nombres, apellidos, fecha_nacimiento, email, estado)
VALUES (1, 1, 1, '12345678-5', 'Beneficiario', 'Demo', '1990-01-01', 'beneficiario@demo.cl', 1);

INSERT INTO beneficiario_cuentas (id_cuenta, id_beneficiario, rut_login, password_hash, estado)
VALUES (1, 1, '12345678-5', '$2y$10$2YxHiF0A1JpMOaGHBHvNdel0DVpkl9ZtNRU9GvLKJx.nAsKUL5Jiu', 1);

INSERT INTO workflow_etapas (id_etapa, id_municipio, orden, nombre, id_rol_requerido, estado) VALUES
(1,1,1,'Asistente Social',2,1),
(2,1,2,'Jefatura',3,1),
(3,1,3,'Finanzas',4,1);

INSERT INTO beneficios (id_beneficio, id_municipio, id_tipo_beneficio, id_estado, nombre, descripcion, fecha_inicio, fecha_termino, monto, cupos, requiere_rsh, estado)
VALUES (1,1,1,2,'Beca Municipal','Apoyo económico municipal','2025-01-01','2025-12-31',50000,100,0,1);

INSERT INTO beneficio_requisitos (id_req, id_beneficio, nombre_documento, obligatorio)
VALUES (1,1,'Copia de cédula',1);

INSERT INTO solicitudes (id_solicitud, id_municipio, id_beneficiario, id_beneficio, id_estado, creado_por_portal, estado)
VALUES (1,1,1,1,2,1,1);

INSERT INTO solicitudes_etapas (id_sol_etapa, id_solicitud, id_etapa, id_estado, estado)
VALUES (1,1,1,1,1),(2,1,2,1,1),(3,1,3,1,1);

INSERT INTO entregas (id_entrega, id_solicitud, id_municipio, id_beneficiario, tipo_programacion, fecha_programada, fecha_entrega, id_estado, estado)
VALUES (1,1,1,1,'INMEDIATA',NULL,NOW(),2,1);

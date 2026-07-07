-- Mantenedores para estados y etapas de proyectos del mapa
-- Ejecutar en producción antes de publicar los cambios de la aplicación.

CREATE TABLE IF NOT EXISTS project_statuses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(80) NOT NULL,
    orden INT NOT NULL DEFAULT 0,
    activo TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY project_statuses_nombre_unique (nombre)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS project_stages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(80) NOT NULL,
    orden INT NOT NULL DEFAULT 0,
    activo TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY project_stages_nombre_unique (nombre)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO project_statuses (nombre, orden, activo)
SELECT 'En ejecución', 10, 1 WHERE NOT EXISTS (SELECT 1 FROM project_statuses WHERE nombre = 'En ejecución');
INSERT INTO project_statuses (nombre, orden, activo)
SELECT 'Finalizado', 20, 1 WHERE NOT EXISTS (SELECT 1 FROM project_statuses WHERE nombre = 'Finalizado');
INSERT INTO project_statuses (nombre, orden, activo)
SELECT 'Planificación', 30, 1 WHERE NOT EXISTS (SELECT 1 FROM project_statuses WHERE nombre = 'Planificación');
INSERT INTO project_statuses (nombre, orden, activo)
SELECT 'Licitación', 40, 1 WHERE NOT EXISTS (SELECT 1 FROM project_statuses WHERE nombre = 'Licitación');
INSERT INTO project_statuses (nombre, orden, activo)
SELECT 'Pausado', 50, 1 WHERE NOT EXISTS (SELECT 1 FROM project_statuses WHERE nombre = 'Pausado');

INSERT INTO project_stages (nombre, orden, activo)
SELECT 'Diseño', 10, 1 WHERE NOT EXISTS (SELECT 1 FROM project_stages WHERE nombre = 'Diseño');
INSERT INTO project_stages (nombre, orden, activo)
SELECT 'Licitación', 20, 1 WHERE NOT EXISTS (SELECT 1 FROM project_stages WHERE nombre = 'Licitación');
INSERT INTO project_stages (nombre, orden, activo)
SELECT 'Construcción', 30, 1 WHERE NOT EXISTS (SELECT 1 FROM project_stages WHERE nombre = 'Construcción');
INSERT INTO project_stages (nombre, orden, activo)
SELECT 'Recepción', 40, 1 WHERE NOT EXISTS (SELECT 1 FROM project_stages WHERE nombre = 'Recepción');
INSERT INTO project_stages (nombre, orden, activo)
SELECT 'Operación', 50, 1 WHERE NOT EXISTS (SELECT 1 FROM project_stages WHERE nombre = 'Operación');
INSERT INTO project_stages (nombre, orden, activo)
SELECT 'Convenio', 60, 1 WHERE NOT EXISTS (SELECT 1 FROM project_stages WHERE nombre = 'Convenio');

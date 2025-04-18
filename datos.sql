-- Insertar datos en la tabla Sedes
INSERT INTO Sedes (Nombre_sede, Provincia, Horario, Estado)
VALUES
('Cartago', 'Cartago', 'Lunes a Viernes 7:00 AM - 10:00 PM', 'Activo'),
('San José', 'San José', 'Lunes a Viernes 8:00 AM - 9:00 PM', 'Activo'),
('Alajuela', 'Alajuela', 'Lunes a Viernes 8:00 AM - 8:00 PM', 'Inactivo'),
('Limón', 'Limón', 'Lunes a Viernes 9:00 AM - 6:00 PM', 'Activo'),
('San Carlos', 'Alajuela', 'Lunes a Viernes 7:00 AM - 5:00 PM', 'Activo');

-- Insertar datos en la tabla Departamentos
INSERT INTO Departamentos (Nombre, Estado)
VALUES
('Ingeniería en Computación', 'Activo'),
('Ingeniería en Electrónica', 'Activo'),
('Ingeniería en Mecatrónica', 'Activo'),
('Administración de Empresas', 'Activo'),
('Ingeniería Ambiental', 'Activo'),
('Ingeniería Industrial', 'Activo');

-- Insertar datos en la tabla Carreras
INSERT INTO Carreras (Nombre, Duracion, Inversion, Descripcion, Perfil_salida, Departamento, Planes_de_estudio, Estado)
VALUES
('Ingeniería en Computación', '5 años', '₡2,500,000', 'Carrera enfocada en el desarrollo de software y sistemas.', 'Desarrollador de software, ingeniero de sistemas.', 1, 'https://www.tec.ac.cr/plan-computacion', 'Activo'),
('Ingeniería en Electrónica', '5 años', '₡2,800,000', 'Carrera enfocada en circuitos y sistemas electrónicos.', 'Ingeniero en electrónica, diseñador de circuitos.', 2, 'https://www.tec.ac.cr/plan-electronica', 'Activo'),
('Ingeniería en Mecatrónica', '5 años', '₡3,000,000', 'Carrera que combina mecánica, electrónica y control.', 'Ingeniero en mecatrónica, diseñador de sistemas automatizados.', 3, 'https://www.tec.ac.cr/plan-mecatronica', 'Activo'),
('Administración de Empresas', '4 años', '₡2,000,000', 'Carrera enfocada en la gestión empresarial.', 'Administrador de empresas, gerente de proyectos.', 4, 'https://www.tec.ac.cr/plan-administracion', 'Activo'),
('Ingeniería Ambiental', '5 años', '₡2,700,000', 'Carrera enfocada en la sostenibilidad y el medio ambiente.', 'Ingeniero ambiental, gestor de proyectos sostenibles.', 5, 'https://www.tec.ac.cr/plan-ambiental', 'Activo'),
('Ingeniería Industrial', '5 años', '₡2,600,000', 'Carrera enfocada en la optimización de procesos industriales.', 'Ingeniero industrial, gestor de operaciones.', 6, 'https://www.tec.ac.cr/plan-industrial', 'Activo');

-- Insertar datos en la tabla Materias
INSERT INTO Materias (Nombre_materia, Estado)
VALUES
('Programación I', 'Activo'),
('Programación II', 'Activo'),
('Circuitos Electrónicos', 'Activo'),
('Control Automático', 'Activo'),
('Gestión Empresarial', 'Activo'),
('Matemáticas I', 'Activo'),
('Matemáticas II', 'Activo'),
('Física I', 'Activo'),
('Física II', 'Activo'),
('Química General', 'Activo');

-- Insertar datos en la tabla Grupos
INSERT INTO Grupos (Grupo, ID_carrera, Cuatrimestre, ID_sede, Estado)
VALUES
('IC1A', 1, '1', 1, 'Activo'),
('IC2A', 1, '2', 1, 'Activo'),
('IE1A', 2, '1', 1, 'Activo'),
('IE2A', 2, '2', 1, 'Activo'),
('IM1A', 3, '1', 1, 'Activo'),
('IM2A', 3, '2', 1, 'Activo'),
('AE1A', 4, '1', 1, 'Activo'),
('AE2A', 4, '2', 1, 'Activo'),
('IA1A', 5, '1', 1, 'Activo'),
('IA2A', 5, '2', 1, 'Activo'),
('II1A', 6, '1', 1, 'Activo'),
('II2A', 6, '2', 1, 'Activo');

-- Insertar datos en la tabla Docente
INSERT INTO Docente (Num_cedula, Nombre, Apellidos, Num_telefono, Correo, Direccion, Estado)
VALUES
(101010101, 'Carlos', 'Ramírez', 88888888, 'carlos.ramirez@tec.ac.cr', 'Cartago', 'Activo'),
(202020202, 'María', 'Gómez', 87777777, 'maria.gomez@tec.ac.cr', 'San José', 'Activo'),
(303030303, 'Luis', 'Fernández', 86666666, 'luis.fernandez@tec.ac.cr', 'Cartago', 'Activo'),
(404040404, 'Ana', 'Soto', 85555555, 'ana.soto@tec.ac.cr', 'Cartago', 'Inactivo'),
(505050505, 'Jorge', 'Vargas', 84444444, 'jorge.vargas@tec.ac.cr', 'Limón', 'Activo'),
(606060606, 'Laura', 'Jiménez', 83333333, 'laura.jimenez@tec.ac.cr', 'San Carlos', 'Activo');

-- Insertar datos en la tabla Estudiante
INSERT INTO Estudiante (Num_cedula, Nombre, Apellidos, Adecuacion, Correo, Num_telefono, Direccion, Estado)
VALUES
(707070707, 'Juan', 'Pérez', 'Ninguna', 'juan.perez@tec.ac.cr', 82222222, 'Cartago', 'Activo'),
(808080808, 'Laura', 'Jiménez', 'Auditiva', 'laura.jimenez@tec.ac.cr', 81111111, 'San José', 'Egresado'),
(909090909, 'Pedro', 'Sánchez', 'Visual', 'pedro.sanchez@tec.ac.cr', 80000000, 'Cartago', 'Inactivo'),
(101112113, 'María', 'Fernández', 'Ninguna', 'maria.fernandez@tec.ac.cr', 89999999, 'Cartago', 'Activo'),
(111213114, 'Luis', 'Gómez', 'Ninguna', 'luis.gomez@tec.ac.cr', 88888888, 'San José', 'Activo'),
(121314115, 'Ana', 'Soto', 'Ninguna', 'ana.soto@tec.ac.cr', 87777777, 'Cartago', 'Activo');

-- Insertar datos en la tabla Estudiante_info
INSERT INTO Estudiante_info (ID_estudiante, ID_departamento, ID_carrera, ID_materia, ID_grupo, Cuatrimestre, ID_sede, Curso_lectivo, Estado)
VALUES
(707070707, 1, 1, 1, 1, 1, 1, '2022', 'Activo'),
(808080808, 2, 2, 2, 2, 1, 1, '2022', 'Egresado'),
(909090909, 3, 3, 3, 3, 1, 1, '2022', 'Inactivo'),
(101112113, 1, 1, 1, 1, 1, 1, '2023', 'Activo'),
(111213114, 2, 2, 2, 2, 1, 1, '2023', 'Activo'),
(121314115, 3, 3, 3, 3, 1, 1, '2023', 'Activo');

-- Insertar datos en la tabla Calificaciones
INSERT INTO Calificaciones (ID_estudiante, ID_docente, ID_carrera, ID_materia, Cuatrimestre, ID_grupo, Curso_lectivo, Nota, Estado)
VALUES
(707070707, 101010101, 1, 1, 1, 1, '2022', NULL, 'Activo'),
(808080808, 202020202, 2, 2, 1, 2, '2022', 85, 'Egresado'),
(909090909, 303030303, 3, 3, 1, 3, '2022', NULL, 'Inactivo'),
(101112113, 101010101, 1, 1, 1, 1, '2023', NULL, 'Activo'),
(111213114, 202020202, 2, 2, 1, 2, '2023', NULL, 'Activo'),
(121314115, 303030303, 3, 3, 1, 3, '2023', NULL, 'Activo');

-- Insertar datos en la tabla Bienes
INSERT INTO Bienes (Nombre, Categoria, ID_sede, Valor, Descripcion, Estado)
VALUES
('Computadora', 'Tecnología', 1, '₡500,000', 'Computadora para laboratorio de computación.', 'Activo'),
('Osciloscopio', 'Electrónica', 1, '₡300,000', 'Osciloscopio para laboratorio de electrónica.', 'Activo'),
('Brazo Robótico', 'Mecatrónica', 1, '₡1,000,000', 'Brazo robótico para prácticas de mecatrónica.', 'Activo'),
('Proyector', 'General', 1, '₡200,000', 'Proyector para aulas.', 'Inactivo');

-- Insertar más datos en la tabla Sedes
INSERT INTO Sedes (Nombre_sede, Provincia, Horario, Estado)
VALUES
('San Ramón', 'Alajuela', 'Lunes a Viernes 8:00 AM - 6:00 PM', 'Activo'),
('Pérez Zeledón', 'San José', 'Lunes a Viernes 9:00 AM - 5:00 PM', 'Activo');

-- Insertar más datos en la tabla Departamentos
INSERT INTO Departamentos (Nombre, Estado)
VALUES
('Ingeniería en Materiales', 'Activo'),
('Ingeniería en Producción Industrial', 'Activo');

-- Insertar más datos en la tabla Carreras
INSERT INTO Carreras (Nombre, Duracion, Inversion, Descripcion, Perfil_salida, Departamento, Planes_de_estudio, Estado)
VALUES
('Ingeniería en Materiales', '5 años', '₡2,900,000', 'Carrera enfocada en el desarrollo y análisis de materiales.', 'Ingeniero en materiales, investigador.', 7, 'https://www.tec.ac.cr/plan-materiales', 'Activo'),
('Ingeniería en Producción Industrial', '5 años', '₡2,700,000', 'Carrera enfocada en la optimización de procesos productivos.', 'Ingeniero en producción, gestor de procesos.', 8, 'https://www.tec.ac.cr/plan-produccion', 'Activo');

-- Insertar más datos en la tabla Materias
INSERT INTO Materias (Nombre_materia, Estado)
VALUES
('Termodinámica', 'Activo'),
('Resistencia de Materiales', 'Activo'),
('Producción Industrial I', 'Activo'),
('Producción Industrial II', 'Activo');

-- Insertar más datos en la tabla Grupos
INSERT INTO Grupos (Grupo, ID_carrera, Cuatrimestre, ID_sede, Estado)
VALUES
('IM1B', 3, '1', 2, 'Activo'),
('IM2B', 3, '2', 2, 'Activo'),
('IP1A', 8, '1', 1, 'Activo'),
('IP2A', 8, '2', 1, 'Activo');

-- Insertar más datos en la tabla Docente
INSERT INTO Docente (Num_cedula, Nombre, Apellidos, Num_telefono, Correo, Direccion, Estado)
VALUES
(707070707, 'Andrea', 'Castro', 89998888, 'andrea.castro@tec.ac.cr', 'San Ramón', 'Activo'),
(808080808, 'Fernando', 'Mora', 87776655, 'fernando.mora@tec.ac.cr', 'Pérez Zeledón', 'Activo');

-- Insertar más datos en la tabla Estudiante
INSERT INTO Estudiante (Num_cedula, Nombre, Apellidos, Adecuacion, Correo, Num_telefono, Direccion, Estado)
VALUES
(131415161, 'Sofía', 'Hernández', 'Ninguna', 'sofia.hernandez@tec.ac.cr', 89997777, 'San Ramón', 'Activo'),
(141516171, 'Diego', 'Vargas', 'Ninguna', 'diego.vargas@tec.ac.cr', 88886666, 'Pérez Zeledón', 'Activo');

-- Insertar más datos en la tabla Estudiante_info
INSERT INTO Estudiante_info (ID_estudiante, ID_departamento, ID_carrera, ID_materia, ID_grupo, Cuatrimestre, ID_sede, Curso_lectivo, Estado)
VALUES
(131415161, 7, 7, 11, 5, 1, 2, '2023', 'Activo'),
(141516171, 8, 8, 12, 6, 1, 2, '2023', 'Activo');

-- Insertar más datos en la tabla Calificaciones
INSERT INTO Calificaciones (ID_estudiante, ID_docente, ID_carrera, ID_materia, Cuatrimestre, ID_grupo, Curso_lectivo, Nota, Estado)
VALUES
(131415161, 707070707, 7, 11, 1, 5, '2023', NULL, 'Activo'),
(141516171, 808080808, 8, 12, 1, 6, '2023', NULL, 'Activo');

-- Insertar más datos en la tabla Bienes
INSERT INTO Bienes (Nombre, Categoria, ID_sede, Valor, Descripcion, Estado)
VALUES
('Impresora 3D', 'Tecnología', 2, '₡1,200,000', 'Impresora 3D para prototipos.', 'Activo'),
('Microscopio', 'Laboratorio', 2, '₡800,000', 'Microscopio para análisis de materiales.', 'Activo');
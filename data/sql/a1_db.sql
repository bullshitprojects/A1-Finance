-- DATABASE CREATION 
CREATE DATABASE a1_finance_db;
USE a1_finance_db;

-- tables
-- Table: categoria
CREATE TABLE categoria (
    id_categoria int NOT NULL AUTO_INCREMENT,
    nombre varchar(50) NOT NULL,
    CONSTRAINT categoria_pk PRIMARY KEY (id_categoria)
);

-- Table: cuenta
CREATE TABLE cuenta (
    id_cuenta int NOT NULL AUTO_INCREMENT,
    no_cuenta varchar(50) NOT NULL COMMENT 'Puede ser numero o nombre',
    usuario_id_usuario int NOT NULL,
    tipo_cuenta_tipo varchar(50) NOT NULL,
    CONSTRAINT cuenta_pk PRIMARY KEY (id_cuenta)
);

-- Table: tipo_cuenta
CREATE TABLE tipo_cuenta (
    tipo varchar(50) NOT NULL AUTO_INCREMENT,
    id_tipo_cuenta int NOT NULL,
    CONSTRAINT tipo_cuenta_pk PRIMARY KEY (tipo)
);

-- Table: tipo_transaccion
CREATE TABLE tipo_transaccion (
    id_tipo_transaccion int NOT NULL AUTO_INCREMENT,
    descripcion varchar(100) NOT NULL,
    CONSTRAINT tipo_transaccion_pk PRIMARY KEY (id_tipo_transaccion)
);

-- Table: tipo_usuario
CREATE TABLE tipo_usuario (
    id_tipo_usuario int NOT NULL AUTO_INCREMENT,
    descripcion varchar(150) NOT NULL,
    CONSTRAINT tipo_usuario_pk PRIMARY KEY (id_tipo_usuario)
);

-- Table: transaccion
CREATE TABLE transaccion (
    id_transaccion int NOT NULL AUTO_INCREMENT,
    monto double NOT NULL,
    fecha date NOT NULL,
    descripcion varchar(100) NOT NULL,
    categoria_id_categoria int NOT NULL,
    cuenta_id_cuenta int NOT NULL,
    tipo_transaccion_id_tipo_transaccion int NOT NULL,
    CONSTRAINT transaccion_pk PRIMARY KEY (id_transaccion)
);

-- Table: usuario
CREATE TABLE usuario (
    id_usuario int NOT NULL AUTO_INCREMENT,
    nombre varchar(100) NOT NULL,
    telefono varchar(20) NOT NULL,
    correo_usuario varchar(50) NOT NULL,
    pwd varchar(512) NOT NULL,
    url_foto varchar(512) NOT NULL,
    tipo_usuario_id_tipo_usuario int NOT NULL,
    CONSTRAINT usuario_pk PRIMARY KEY (id_usuario)
);

-- foreign keys
-- Reference: cuenta_tipo_cuenta (table: cuenta)
ALTER TABLE cuenta ADD CONSTRAINT cuenta_tipo_cuenta FOREIGN KEY cuenta_tipo_cuenta (tipo_cuenta_tipo)
    REFERENCES tipo_cuenta (tipo);

-- Reference: cuenta_usuario (table: cuenta)
ALTER TABLE cuenta ADD CONSTRAINT cuenta_usuario FOREIGN KEY cuenta_usuario (usuario_id_usuario)
    REFERENCES usuario (id_usuario);

-- Reference: transaccion_categoria (table: transaccion)
ALTER TABLE transaccion ADD CONSTRAINT transaccion_categoria FOREIGN KEY transaccion_categoria (categoria_id_categoria)
    REFERENCES categoria (id_categoria);

-- Reference: transaccion_cuenta (table: transaccion)
ALTER TABLE transaccion ADD CONSTRAINT transaccion_cuenta FOREIGN KEY transaccion_cuenta (cuenta_id_cuenta)
    REFERENCES cuenta (id_cuenta);

-- Reference: transaccion_tipo_transaccion (table: transaccion)
ALTER TABLE transaccion ADD CONSTRAINT transaccion_tipo_transaccion FOREIGN KEY transaccion_tipo_transaccion (tipo_transaccion_id_tipo_transaccion)
    REFERENCES tipo_transaccion (id_tipo_transaccion);

-- Reference: usuario_tipo_usuario (table: usuario)
ALTER TABLE usuario ADD CONSTRAINT usuario_tipo_usuario FOREIGN KEY usuario_tipo_usuario (tipo_usuario_id_tipo_usuario)
    REFERENCES tipo_usuario (id_tipo_usuario);

-- End of file.

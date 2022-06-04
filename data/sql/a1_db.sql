
CREATE DATABASE a1_finance_db;
USE a1_finance_db;;

-- tables
-- Table: categoria
CREATE TABLE categoria (
    id_categoria int NOT NULL AUTO_INCREMENT,
    nombre varchar(50) NOT NULL,
    tipo_transaccion_id_tipo_transaccion int NOT NULL,
    CONSTRAINT categoria_pk PRIMARY KEY (id_categoria)
);

-- Table: cuenta
CREATE TABLE cuenta (
    id_cuenta int NOT NULL AUTO_INCREMENT,
    no_cuenta varchar(50) NOT NULL COMMENT 'Puede ser numero o nombre',
    presupuesto double NOT NULL,
    balance float NOT NULL,
    usuario_id_usuario int NOT NULL,
    tipo_cuenta_id_tipo_cuenta int NOT NULL,
    moneda_id_moneda int NOT NULL,
    CONSTRAINT cuenta_pk PRIMARY KEY (id_cuenta)
);

-- Table: moneda
CREATE TABLE moneda (
    id_moneda int NOT NULL COMMENT '1 Dolar
2 Peso mexicano
3 Peso argentino
etc.',
    nombre varchar(25) NOT NULL,
    CONSTRAINT moneda_pk PRIMARY KEY (id_moneda)
) COMMENT 'Esta tabla guardara la moneda de preferencia del usuario. Ejemplo: Dolares, colones lempiras.';

-- Table: tipo_cuenta
CREATE TABLE tipo_cuenta (
    id_tipo_cuenta int NOT NULL AUTO_INCREMENT,
    tipo varchar(50) NOT NULL,
    CONSTRAINT tipo_cuenta_pk PRIMARY KEY (id_tipo_cuenta)
);

-- Table: tipo_transaccion
CREATE TABLE tipo_transaccion (
    id_tipo_transaccion int NOT NULL AUTO_INCREMENT COMMENT '1 Ingreso
2 Egreso',
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
    fecha_nacimiento date NOT NULL,
    telefono varchar(20) NOT NULL,
    correo_usuario varchar(50) NOT NULL COLUMN_FORMAT FIXED,
    pwd varchar(512) NOT NULL,
    url_foto varchar(512) NOT NULL,
    tipo_usuario_id_tipo_usuario int NOT NULL,
    CONSTRAINT usuario_pk PRIMARY KEY (id_usuario)
);

-- foreign keys
-- Reference: categoria_tipo_transaccion (table: categoria)
ALTER TABLE categoria ADD CONSTRAINT categoria_tipo_transaccion FOREIGN KEY categoria_tipo_transaccion (tipo_transaccion_id_tipo_transaccion)
    REFERENCES tipo_transaccion (id_tipo_transaccion);

-- Reference: cuenta_moneda (table: cuenta)
ALTER TABLE cuenta ADD CONSTRAINT cuenta_moneda FOREIGN KEY cuenta_moneda (moneda_id_moneda)
    REFERENCES moneda (id_moneda);

-- Reference: cuenta_tipo_cuenta (table: cuenta)
ALTER TABLE cuenta ADD CONSTRAINT cuenta_tipo_cuenta FOREIGN KEY cuenta_tipo_cuenta (tipo_cuenta_id_tipo_cuenta)
    REFERENCES tipo_cuenta (id_tipo_cuenta);

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

ALTER TABLE usuario
ADD CONSTRAINT correo_usuario_unique UNIQUE (correo_usuario);;

-- End of file.

-- INSERTS

-- ACCOUNT TYPES
INSERT INTO tipo_usuario (descripcion) VALUES ('FREEMIUM'); -- 1
INSERT INTO tipo_usuario (descripcion) VALUES ('PREMIUM'); -- 2
INSERT INTO tipo_usuario (descripcion) VALUES ('ENTERPRISE'); -- 3
INSERT INTO tipo_usuario (descripcion) VALUES ('EMPLOYEE'); -- 4

-- CURRENCY
INSERT INTO moneda (id_moneda, nombre) VALUES (1, 'DOLAR ($)'); -- 1
INSERT INTO moneda (id_moneda, nombre) VALUES (2, 'PESO MEXICANO ($)'); -- 2
INSERT INTO moneda (id_moneda, nombre) VALUES (3, 'PESO ARGENTINO($)'); -- 3

-- TRANSACTION TYPE
INSERT INTO tipo_transaccion (descripcion) VALUES ('INGRESO'); -- 1
INSERT INTO tipo_transaccion (descripcion) VALUES ('EGRESO'); -- 2
--INSERT INTO tipo_transaccion (descripcion) VALUES ('TRANSFERENCIA'); -- 3

-- ACCOUNT TYPE
INSERT INTO tipo_cuenta (tipo) VALUES ('EFECTIVO');
INSERT INTO tipo_cuenta (tipo) VALUES ('TARJETA CREDITO');
INSERT INTO tipo_cuenta (tipo) VALUES ('TARJETA DEBITO');
INSERT INTO tipo_cuenta (tipo) VALUES ('CUENTA AHORRO');
INSERT INTO tipo_cuenta (tipo) VALUES ('CUENTA CORRIENTE');

-- CATEGORY
INSERT INTO categoria (nombre, tipo_transaccion_id_tipo_transaccion) VALUES ('COMPRA', 3);
INSERT INTO categoria (nombre, tipo_transaccion_id_tipo_transaccion) VALUES ('VENTA', 1);
INSERT INTO categoria (nombre, tipo_transaccion_id_tipo_transaccion) VALUES ('SALARIO', 1);
INSERT INTO categoria (nombre, tipo_transaccion_id_tipo_transaccion) VALUES ('REEMBOLSO', 1);
INSERT INTO categoria (nombre, tipo_transaccion_id_tipo_transaccion) VALUES ('CUPONES', 1);
INSERT INTO categoria (nombre, tipo_transaccion_id_tipo_transaccion) VALUES ('INVERSIONES', 1);
INSERT INTO categoria (nombre, tipo_transaccion_id_tipo_transaccion) VALUES ('REMESA', 1);
INSERT INTO categoria (nombre, tipo_transaccion_id_tipo_transaccion) VALUES ('RETIRO', 1);
INSERT INTO categoria (nombre, tipo_transaccion_id_tipo_transaccion) VALUES ('PENSION', 1);
INSERT INTO categoria (nombre, tipo_transaccion_id_tipo_transaccion) VALUES ('DEPOSITO', 1);
INSERT INTO categoria (nombre, tipo_transaccion_id_tipo_transaccion) VALUES ('SUPERMERCADO', 2);
INSERT INTO categoria (nombre, tipo_transaccion_id_tipo_transaccion) VALUES ('ROPA', 2);
INSERT INTO categoria (nombre, tipo_transaccion_id_tipo_transaccion) VALUES ('ZAPATOS', 2);
INSERT INTO categoria (nombre, tipo_transaccion_id_tipo_transaccion) VALUES ('ELECTRODOMESTICOS', 2);
INSERT INTO categoria (nombre, tipo_transaccion_id_tipo_transaccion) VALUES ('TECNOLOGIA', 2);
INSERT INTO categoria (nombre, tipo_transaccion_id_tipo_transaccion) VALUES ('SERVICIOS', 2);
INSERT INTO categoria (nombre, tipo_transaccion_id_tipo_transaccion) VALUES ('ACCESORIOS', 2);
INSERT INTO categoria (nombre, tipo_transaccion_id_tipo_transaccion) VALUES ('FERRETERIA', 2);
INSERT INTO categoria (nombre, tipo_transaccion_id_tipo_transaccion) VALUES ('GASOLINA', 2);

DROP DATABASE IF EXISTS farmacia_jesusito;
CREATE DATABASE IF NOT EXISTS farmacia_jesusito
CHARACTER SET = 'latin1'
COLLATE = 'latin1_spanish_ci';
USE farmacia_jesusito;

CREATE TABLE usuarios(
    id INT(255) AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(255),
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    rol VARCHAR(20),
    imagenes VARCHAR(255),
    CONSTRAINT pk_usuarios PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email)
)Engine = InnoDB;
INSERT INTO usuarios VALUES(NULL, 'admin', 'admin', 'admin@admin.com', 'password', 'admin', NUll);

CREATE TABLE categorias(
    id INT(255) AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    CONSTRAINT pk_categorias PRIMARY KEY(id)
)Engine = InnoDB;

INSERT INTO categorias VALUES(NULL, 'Manga corta'), (NULL, 'Tirantes'), (NULL, 'Manga Larga'),
(NULL, 'Sudaderas');

CREATE TABLE productos(
    id INT(255) AUTO_INCREMENT NOT NULL,
    categoria_id INT(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio FLOAT(100, 2) NOT NULL,
    stock INT(255) NOT NULL,
    oferta VARCHAR(2),
    fecha DATE NOT NULL,
    imagen VARCHAR(255),
    CONSTRAINT pk_productos PRIMARY KEY(id),
    CONSTRAINT fk_productos_categorias FOREIGN KEY(categoria_id) REFERENCES categorias(id)
)Engine = InnoDB;

CREATE TABLE pedidos(
    id INT(255) AUTO_INCREMENT NOT NULL,
    usuario_id INT(255) NOT NULL,
    municipio VARCHAR(100) NOT NULL,
    localidad VARCHAR(100) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    referencia TEXT,
    coste FLOAT(200, 2) NOT NULL,
    estado VARCHAR(20) NOT NULL,
    fecha DATE,
    hora TIME,
    CONSTRAINT pk_pedidos PRIMARY KEY(id),
    CONSTRAINT pk_pedidos_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
)Engine = InnoDB;

CREATE TABLE lineas_pedidos(
    id INT(255) AUTO_INCREMENT NOT NULL,
    pedido_id INT(255) NOT NULL,
    producto_id INT(255) NOT NULL,
    unidades INT(255) NOT NULL,
    CONSTRAINT pk_lineas_pedidos PRIMARY KEY(id),
    CONSTRAINT fk_linea_pedido FOREIGN KEY(pedido_id) REFERENCES pedidos(id),
    CONSTRAINT fk_linea_producto FOREIGN KEY(producto_id) REFERENCES productos(id)
)Engine = InnoDB;
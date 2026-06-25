CREATE TABLE bodegas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    estado INT DEFAULT 1
);

INSERT INTO `bodegas` (`id`, `nombre`, `estado`) VALUES('1','Bodega Central Santiago','1');
INSERT INTO `bodegas` (`id`, `nombre`, `estado`) VALUES('2','Bodega Norte','1');
INSERT INTO `bodegas` (`id`, `nombre`, `estado`) VALUES('3','Bodega Sur','1');


CREATE TABLE sucursales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idbodega INT NOT NULL,
    nombre VARCHAR(150) NOT NULL,
    estado INT DEFAULT 1
);

ALTER TABLE sucursales
ADD CONSTRAINT sucursales_idbodega
FOREIGN KEY (idbodega) REFERENCES bodegas(id)
ON DELETE CASCADE ON UPDATE CASCADE;

INSERT INTO `sucursales` (`id`, `idbodega`, `nombre`, `estado`) VALUES('1', '1', 'Sucursal Maipú','1');
INSERT INTO `sucursales` (`id`, `idbodega`, `nombre`, `estado`) VALUES('2', '1', 'Sucursal La Florida','1');
INSERT INTO `sucursales` (`id`, `idbodega`, `nombre`, `estado`) VALUES('3', '1', 'Sucursal Puente Alto','1');
INSERT INTO `sucursales` (`id`, `idbodega`, `nombre`, `estado`) VALUES('4', '1', 'Sucursal Ñuñoa','1');
INSERT INTO `sucursales` (`id`, `idbodega`, `nombre`, `estado`) VALUES('5', '2', 'Sucursal Antofagasta','1');
INSERT INTO `sucursales` (`id`, `idbodega`, `nombre`, `estado`) VALUES('6', '2', 'Sucursal Calama','1');
INSERT INTO `sucursales` (`id`, `idbodega`, `nombre`, `estado`) VALUES('7', '2', 'Sucursal Iquique','1');
INSERT INTO `sucursales` (`id`, `idbodega`, `nombre`, `estado`) VALUES('8', '3', 'Sucursal Puerto Montt','1');
INSERT INTO `sucursales` (`id`, `idbodega`, `nombre`, `estado`) VALUES('9', '3', 'Valdivia','1');


CREATE TABLE monedas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    estado INT DEFAULT 1
);


INSERT INTO `monedas` (`id`, `nombre`, `estado`) VALUES('1','Peso Chileno','1');
INSERT INTO `monedas` (`id`, `nombre`, `estado`) VALUES('2','Dólar','1');


CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codigo VARCHAR(70) NOT NULL,
    nombre VARCHAR(70) NOT NULL,
    idbodega INT NOT NULL,
    idsucursal INT NOT NULL,
    idmoneda INT NOT NULL,
    precio FLOAT NOT NULL,
    descripcion TEXT,
    estado INT DEFAULT 1,
    created_at DATE
);


ALTER TABLE productos
ADD CONSTRAINT productos_idbodega
FOREIGN KEY (idbodega) REFERENCES bodegas(id)
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE productos
ADD CONSTRAINT productos_idsucursal
FOREIGN KEY (idsucursal) REFERENCES sucursales(id)
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE productos
ADD CONSTRAINT productos_idmoneda
FOREIGN KEY (idmoneda) REFERENCES monedas(id)
ON DELETE CASCADE ON UPDATE CASCADE;


CREATE TABLE materiales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    estado INT DEFAULT 1
);


INSERT INTO `materiales` (`id`, `nombre`, `estado`) VALUES('1','Plástico','1');
INSERT INTO `materiales` (`id`, `nombre`, `estado`) VALUES('2','Metal','1');
INSERT INTO `materiales` (`id`, `nombre`, `estado`) VALUES('3','Madera','1');
INSERT INTO `materiales` (`id`, `nombre`, `estado`) VALUES('4','Vidrio','1');
INSERT INTO `materiales` (`id`, `nombre`, `estado`) VALUES('5','Textil','1');



CREATE TABLE productos_materiales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idproducto INT NOT NULL,
    idmaterial INT NOT NULL
);

ALTER TABLE productos_materiales
ADD CONSTRAINT productos_mt_idproducto
FOREIGN KEY (idproducto) REFERENCES productos(id)
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE productos_materiales
ADD CONSTRAINT productos_mt_idmaterial
FOREIGN KEY (idmaterial) REFERENCES materiales(id)
ON DELETE CASCADE ON UPDATE CASCADE;
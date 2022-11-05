create database if not exists backend_NVSC;
use backend_NVSC;

/* SENTENCIAS DDL */
create table if not exists Usuario(
ID_Usuario int auto_increment primary key,
Email varchar(128) not null,
Contrasenia varchar(32) not null,
NombreUsuario varchar(64) not null,
Estado bit not null,
FechaRegistro date not null,
Tipo char(1) not null,
Direccion varchar(64),
Telefono varchar(16)
check (Tipo='U' or Tipo='J' or Tipo='V' or Tipo='C')
);

create table if not exists Proveedor(
ID_Proveedor int auto_increment primary key,
Nombre_Proveedor varchar(64) not null,
Direccion varchar(64) not null,
TelefonoProv varchar(16) not null
);

create table if not exists Categoria (
ID_Categoria int auto_increment primary key,
Nombre_Categoria varchar (64) not null
);

create table if not exists Producto(
ID_Producto int auto_increment primary key,
Nombre_Producto varchar(128) not null,
Descripcion varchar(1024),
Precio decimal not null,
Stock int not null,
Talle varchar(3),
Descuento decimal not null,
Ruta_Imagen varchar(128) not null,
ID_Proveedor int not null,
ID_Categoria int not null,
constraint fk_productoProveedor foreign key (ID_Proveedor) references Proveedor(ID_Proveedor),
constraint fk_productoCategoria foreign key (ID_Categoria) references Categoria(ID_Categoria)
);

create table if not exists Paquete(
ID_Paquete int auto_increment primary key,
Nombre_Paquete varchar(64) not null,
Precio_Paquete int not null
);

create table if not exists Paquete_Producto(
ID_Paquete int,
ID_Producto int,
Primary key(ID_Paquete,ID_Producto),
constraint fk_productoPaquete foreign key (ID_Paquete) references Paquete(ID_Paquete),
constraint fk_PaqueteProducto foreign key (ID_Producto) references Producto(ID_Producto)
);

CREATE TABLE Venta(
  ID_Venta int NOT NULL AUTO_INCREMENT,
  ID_Cliente int NOT NULL,
  ID_Pago varchar(255) not null,
  Fecha datetime NOT NULL,
  NombreTarjeta varchar(255) not null,
  NumeroTarjeta int not null,
  VencTarjeta varchar(7) not null,
  CVV int not null,
  Estado varchar(32) not null,
  PRIMARY KEY (ID_Venta),
  CONSTRAINT fk_ventaUsuario FOREIGN KEY (ID_Cliente) REFERENCES Usuario(ID_Usuario)
);
alter table Venta
MODIFY COLUMN Fecha date;
alter table Venta
MODIFY COLUMN NumeroTarjeta varchar(15);

CREATE TABLE detalleVenta (
  ID_detalleVenta int AUTO_INCREMENT,
  ID_Producto int NOT NULL,
  ID_Venta int NOT NULL,
  Cantidad int NOT NULL,
  Precio double NOT NULL,
  Subtotal double NOT NULL,
  PRIMARY KEY (ID_detalleVenta),
  CONSTRAINT fk_detalleProducto FOREIGN KEY (ID_Producto) REFERENCES Producto (ID_Producto),
  CONSTRAINT fk_detalleVenta FOREIGN KEY (ID_Venta) REFERENCES Venta (ID_Venta)
);

CREATE TABLE datosEnvio (
  ID_datosEnvio int AUTO_INCREMENT,
  ID_Cliente int not null,
  Email varchar(128) NOT NULL,
  Direccion varchar(64) NOT NULL,
  Telefono varchar(16) NOT NULL,
  Nombre varchar(64),
  PRIMARY KEY (ID_datosEnvio),
  CONSTRAINT fk_EnvioCliente FOREIGN KEY (ID_Cliente) REFERENCES Usuario (ID_Usuario)
);

/* SENTENCIAS DML */

-- Ingresar Jefe  --
INSERT INTO Usuario(Email, Contrasenia, NombreUsuario, Estado, FechaRegistro, Tipo, Direccion, Telefono)
        VALUE ('seguridadcorporal@gmail.com','fbbeb2c1b438db0258b1e55046e0dc40','Natalia Viera', 1,'	
2022-10-7', 'J', 'Moltke 1194', '092065001');

-- Ingresar Comprador/Vendedor --
INSERT INTO `usuario` (`ID_Usuario`, `Email`, `Contrasenia`, `NombreUsuario`, `Estado`, `FechaRegistro`, `Tipo`, `Direccion`, `Telefono`) 
VALUES (NULL, 'emanuelsilveira@gmail.com', '70b36d25d26d0e7521c0916602621954', 'Emanuel Silveira', 1, '2022-11-05', 'V', 'La Casa del Ema 4055', '099111234'), 
		(NULL, 'sheyko97@gmail.com', '624c7d5ed0d5950aea2f9d17d53ba922', 'Sheyko 97', 1, '2022-11-05', 'C', 'La Casa del Sheyko 234', '094123456');

-- Ingresar Usuario Normal --
INSERT INTO Usuario(Email, Contrasenia, NombreUsuario, Estado, FechaRegistro, Tipo)
        VALUE ('tricogus@gmail.com','78eaa014a3e8f0fa5f7d332249f6795a','Gustavo Velazquez',1,'2022-10-31', 'U');

-- Ingreso Proveedores --
INSERT INTO Proveedor(Nombre_Proveedor, Direccion, TelefonoProv)
        VALUES ('Montevideo Uniformes','Ferrer Serra 2172','095292764'),
			   ('Fupi Seguridad Industrial','Avda. Uruguay 1124','29033359'),
               ('VICAS','Río Negro 1566','099760205'),
               ('Garimport','Vilardebó 2133','22095620'),
               ('Mundo Trabajo','Justicia 2233','094501542');

-- Ingreso Categorias --
INSERT INTO Categoria(Nombre_Categoria)
        VALUES ('Uniformes'),
			   ('Calzado'),
               ('Seguridad'),
               ('Accesorios'),
               ('Otros');
               
		-- Ingreso Productos --
INSERT INTO `producto` (`ID_Producto`, `Nombre_Producto`, `Descripcion`, `Precio`, `Stock`, `Talle`, `Descuento`, `Ruta_Imagen`, `ID_Proveedor`, `ID_Categoria`) 
	VALUES (NULL, 'Mascara Soldador', 'Mascara de Soldador.', '10000', '15', '', '0', 'MASCARA SOLDADOR $2700.jpg', '1', '3'), 
			(NULL, 'Arnés', 'Arnés completo con 3 puntos de enganche, regulable en hombros y piernas.', '2920', '20', 'M', '0', 'ARNES $2920.jpg', '2', '1'),
			(NULL, 'Botas de Lluvia Blanco', 'Producto desarrollado con material maleable, cabedal con 2,7mm de espesor, con diseño que facilita el calzado y descalzar.', '598', '30', '42', '0', 'BOTAS DE LLUVIA $598.jpg', '1', '2'),
			(NULL, 'Casco de Seguridad', 'Diseño modular que permite el montaje de productos de protección facial, auditiva, ocular y soldadura.\r\nFabricado en polietileno, se distingue por su moderno diseño y excelente terminación.\r\nHebilla trasera para anclaje de mentonera de 3 puntos.\r\nVersiones: Sin ventilación\r\nVisera Frontal de 3,5 cm que permite una óptima visión superior manteniendo las prestaciones de seguridad.', '210', '40', '', '0', 'CASCO DE SEGURIDAD $210.jpg', '2', '3'),
			(NULL, 'Botas de Lluvia con Puntera', 'Botas de lluvia con puntera, Producto desarrollado con material maleable, cabedal Constituida en PVC (Policloruro de vinilo).', '1150', '15', '40', '0', 'BOTAS DE LLUVIA CON PUNTERA $1150.jpg', '1', '2');
INSERT INTO `producto` (`ID_Producto`, `Nombre_Producto`, `Descripcion`, `Precio`, `Stock`, `Talle`, `Descuento`, `Ruta_Imagen`, `ID_Proveedor`, `ID_Categoria`) 
VALUES (NULL, 'Campera con Reflectivo', 'Composición: Micropolar 100% Polyester Gramaje: 260g.', '1100', '19', 'L', '0', 'CAMPERA CON REFLECTIVO $1100.jpg', '1', '1'),
		(NULL, 'Campera Micropolar con Reflectivo', '100% Polyester Gramaje: 120 Gramos', '125', '50', 'XL', '0', 'CAMPERA MICROPOLAR CON REFLECTIVO $125.jpg', '1', '1'), 
		(NULL, 'Cola de Amarre', 'Cola de amarre elastizada , 1,5 m. con amortiguador y mosquetón de 55mm, en extremo.', '4150', '55', '', '0', 'COLA DE AMARRE $4150.jpg', '2', '3'),
		(NULL, 'Cono Reflectivo 50cm', 'Material PVC rígido Altura 50 cm', '250', '10', '', '0', 'CONO REFLECTIVO 50CM $250.jpg', '2', '3'),
		(NULL, 'Cono Reflectivo 70cm', 'Material goma eva muy flexible. Altura 70cm Base 40x40cm', '690', '12', '', '0', 'CONO REFLECTIVO 70CM $690.jpg', '2', '3'), 
		(NULL, 'Delantal de Soldador', 'Confeccionado en cuero descarne. Diseño sin costuras. 60 x 90 cm en una sola pieza.', '1020', '50', 'XL', '0', 'DELANTAL DE SOLDADOR $1020.jpg', '2', '1'),
		(NULL, 'Equipo de Lluvia con Reflectivo', 'Ropa de protección frente a la lluvia.', '898', '15', 'L', '0', 'EQUIPO DE LLUVIA CON REFLECTIVO $898.jpg', '1', '1'),
		(NULL, 'Faja Lumbar', '100% elastizada. Doble ajuste / velcro de máxima adherencia. 5 ballenas de PVC con memoria. Cinta reflectiva trasera. Acentúa la flexibilidad muscular. \r\nOtorga calor terapéutico en la zona lumbar. Mediante una confortable compresión reduce la presión sobre ligamentos, discos y vértebras.', '598', '20', 'XL', '0', 'FAJA LUMBAR $598.jpg', '2', '1'),
		(NULL, 'Guantes Anti Corte', 'Guantes de nitrilo negro con puño de lona Ofrece una gran resistencia\r\nante objetos cortantes y abrasivos y a la penetración de grasa o aceite.', '250', '15', '', '0', 'GUANTES ANTI CORTE $250.jpg', '2', '3'),
		(NULL, 'Guantes Antivibración', 'Guante sin costuras con un panel sólido de Goma, panel sólido de goma recubriendo la palma que protege contra las vibraciones.', '420', '35', '', '0', 'GUANTES ANTIVIBRACION $420.jpg', '2', '3');
INSERT INTO `producto` (`ID_Producto`, `Nombre_Producto`, `Descripcion`, `Precio`, `Stock`, `Talle`, `Descuento`, `Ruta_Imagen`, `ID_Proveedor`, `ID_Categoria`)
 VALUES (NULL, 'Guantes de Seguridad', 'Guante de seguridad hecha de cuero de vaca con la palma, la palma\r\nde los dedos, el pulgar y los dedos; nylon en la parte posterior.', '990', '16', '', '0', 'GUANTES DE SEGURIDAD $990.jpg', '2', '3'),
	(NULL, 'Pantalón para Operador de Motosierra', 'Pantalón de seguridad hecho en poliester. Con capas internas\r\nde protección en poliester 360º, forro en poliester y algodón.', '4620', '18', 'L', '0', 'PANTALON PARA OPERADOR DE MOTOSIERRA $4620.jpg', '1', '1'),
	(NULL, 'Polainas', 'Polaina de cuero descarne. Utilizada para proteger al usuario en trabajos de soldadura, chispas y calor generado en este proceso.\r\n Buena resistencia y flexibilidad,lo que permite trabajar en condiciones seguras y cómodas.\r\n', '670', '12', '42', '0', 'POLAINAS $670.jpg', '1', '2'),
	(NULL, 'Protector Auditivo', 'Suministra protección de manera no invasiva, aislando el oído de la fuente de ruido.\r\n', '650', '12', '', '0', 'PROTECTOR AUDITIVO.jpg', '2', '3'),
	(NULL, 'Rollo de Cinta Peligro', 'Largo 300 metros Ancho 7.6 cm Peso aprox. 900 gr.', '470', '100', '', '0', 'ROLLO DE CINTA PELIGRO $470.jpg', '2', '3'),
	(NULL, 'Zapato de Seguridad con Puntera', 'Material cuero Puntera pvc Hecho en Brasil.\r\n', '850', '15', '45', '0', 'ZAPATO DE SEGURIDAD CON PUNTERA $850.jpg', '1', '2'),
	(NULL, 'Zapato de Seguridad sin Puntera Talle 45', 'Talle 45\r\nResistente al impacto hasta 200J. \r\nPlantilla sintética, cosida en sistema strobel antibacteriana. \r\nSuela de PU bidensidad, inyectado directamente en la capellada.', '1050', '16', '45', '0', 'ZAPATO DE SEGURIDAD SIN PUNTERA $1050.png', '1', '2'),
	(NULL, 'Zapato de Seguridad sin Puntera Talle 44', 'Talle 44\r\nResistente al impacto hasta 200J. \r\nPlantilla sintética, cosida en sistema strobel antibacteriana. \r\nSuela de PU bidensidad, inyectado directamente en la capellada.', '1050', '15', '44', '0', 'ZAPATO DE SEGURIDAD SIN PUNTERA $1050.png', '1', '2');

-- Select Producto + NombreCategoria + NombreProveedor --
select * from Producto P 
join Categoria C on C.ID_Categoria=P.ID_Categoria
join Proveedor Pr on Pr.ID_Proveedor=P.ID_Proveedor;

-- Ver todos los productos Activos --
SELECT ID_Producto,Nombre_Producto,Precio from Producto where Stock>0;
        
        -- Busqueda de palabra/coincidencia --
SELECT ID_Producto, Nombre_Producto, Precio, Ruta_Imagen ,Stock 
FROM Producto where 1=1 and Nombre_Producto like '%Ca%';

        -- Productos Vendidos --
SELECT P.Nombre_Producto,U.NombreUsuario,V.Fecha,Dv.Cantidad,Dv.Precio,Dv.SubTotal
FROM Venta AS V
INNER JOIN detalleVenta AS Dv ON Dv.ID_Venta = V.ID_Venta
INNER JOIN Producto AS P ON P.ID_Producto = Dv.ID_Producto
INNER JOIN Usuario AS U ON U.ID_Usuario = V.ID_Cliente;

		-- Cantidad Productos --
SELECT COUNT(ID_Producto) AS num from Producto where Stock>0;

SELECT 
                        ID_Producto,
                        Nombre_Producto,
                        Precio,
                        Ruta_Imagen,
                        Stock
                        FROM
                        Producto
                        GROUP BY Precio;



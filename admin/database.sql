create database if not exists backend_NVSC;
use backend_NVSC;
drop database backend_NVSC;

/* SENTENCIAS DDL */
create table if not exists Usuario(
ID_Usuario int auto_increment primary key,
Email varchar(64) not null,
Contrasenia varchar(32) not null,
NombreUsuario varchar(32) not null,
Estado bit not null,
FechaRegistro date not null,
Tipo char(1) not null
check (Tipo='U' or Tipo='J' or Tipo='V' or Tipo='C')
);

create table if not exists TelefonoUsuario(
ID_Usuario int auto_increment,
Telefono varchar(15) not null,
Primary key (ID_Usuario, Telefono),
constraint fk_telefono_Usuario foreign key (ID_Usuario) references Usuario(ID_Usuario)
);

create table if not exists Proveedor(
ID_Proveedor int auto_increment primary key,
Nombre_Proveedor varchar(50) not null,
Direccion varchar(50) not null,
TelefonoProv varchar(15) not null
);

create table if not exists Categoria (
ID_Categoria int auto_increment primary key,
Nombre_Categoria varchar (20) not null
);

create table if not exists Producto(
ID_Producto int auto_increment primary key,
Nombre_Producto varchar(128) not null,
Precio decimal not null,
Stock int not null,
Talle varchar(4),
Descuento decimal not null,
Ruta_Imagen varchar(128) not null,
ID_Proveedor int not null,
ID_Categoria int not null,
constraint fk_productoProveedor foreign key (ID_Proveedor) references Proveedor(ID_Proveedor),
constraint fk_productoCategoria foreign key (ID_Categoria) references Categoria(ID_Categoria)
);

create table if not exists Paquete(
ID_Paquete int auto_increment primary key,
Nombre_Paquete varchar(50) not null,
Precio_Paquete int not null
);

CREATE TABLE Venta (
  ID_Venta int NOT NULL AUTO_INCREMENT,
  ID_Cliente int NOT NULL,
  Fecha datetime NOT NULL,
  PRIMARY KEY (ID_Venta),
  CONSTRAINT fk_ventaUsuario FOREIGN KEY (ID_Cliente) REFERENCES Usuario(ID_Usuario)
);

CREATE TABLE detalleVenta (
  ID_detalleVenta int(11) NOT NULL AUTO_INCREMENT,
  ID_Producto int(5) NOT NULL,
  ID_Venta int(5) NOT NULL,
  Cantidad int(5) NOT NULL,
  Precio double NOT NULL,
  Subtotal double NOT NULL,
  PRIMARY KEY (ID_detalleVenta),
  CONSTRAINT fk_detalleProducto FOREIGN KEY (ID_Producto) REFERENCES Producto (ID_Producto),
  CONSTRAINT fk_detalleVenta FOREIGN KEY (ID_Venta) REFERENCES Venta (ID_Venta)
);

/* SENTENCIAS DML */

-- Ingresar Usuario/Cliente  --

-- Ingresar Jefe  --
INSERT INTO Usuario(Email, Contrasenia, NombreUsuario, Estado, FechaRegistro, Tipo)
        VALUE ('seguridadcorporal@gmail.com','fbbeb2c1b438db0258b1e55046e0dc40','Natalia Viera', 1,'	
2022-10-31', 'J');
INSERT INTO TelefonoUsuario(Telefono)
        VALUE ('092065001');

-- Ingresar Usuario Normal --
INSERT INTO Usuario(Email, Contrasenia, NombreUsuario, Estado, FechaRegistro, Tipo)
        VALUE ('tricogus@gmail.com','78eaa014a3e8f0fa5f7d332249f6795a','Gustavo Velazquez',1,'2022-10-31', 'U');
INSERT INTO TelefonoUsuario(Telefono)
        VALUE ('094935236');
        
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
               
-- Select Producto + NombreCategoria + NombreProveedor --
select * from Producto P 
join Categoria C on C.ID_Categoria=P.ID_Categoria
join Proveedor Pr on Pr.ID_Proveedor=P.ID_Proveedor;






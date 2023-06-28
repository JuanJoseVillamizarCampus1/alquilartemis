CREATE DATABASE alquilartemis;
USE alquilartemis;

CREATE TABLE clientes(
    cliente_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    edad INT NOT NULL,
    direccion VARCHAR(50),
    texto_adicional VARCHAR(100)
);

CREATE TABLE empleados(
    empleado_id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    cargo VARCHAR(255),
    otros_detalles TEXT
);

CREATE TABLE obras (
    obra_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    cliente_id INT NOT NULL,
    nombre_obra VARCHAR(70) NOT NULL,
    direccion VARCHAR(50) NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES clientes(cliente_id)
);


CREATE TABLE productos(
  producto_id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  descripcion TEXT,
  codigo VARCHAR(50) NOT NULL
);

CREATE TABLE salida (
  salida_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  cliente_id INT,
  fecha_salida DATE,
  hora_salida TIME,
  subtotalPeso DECIMAL(10, 2),
  empleado_id INT,
  placatransporte VARCHAR(20),
  observaciones VARCHAR(100),
  FOREIGN KEY(cliente_id)REFERENCES clientes(cliente_id),
  FOREIGN KEY(empleado_id)REFERENCES empleados(empleado_id)
);


CREATE TABLE salida_detalle (
  salida_id INT,
  producto_id INT,
  obra_id INT,
  cantidad_salida INT,
  cantidad_propia INT,
  cantidad_subalquilada INT,
  valorUnidad DECIMAL(10, 2),
  fecha_standBye DATE,
  estado VARCHAR(20),
  valorTotal DECIMAL(10, 2),
  empleado_id INT,
  FOREIGN KEY (salida_id) REFERENCES salida(salida_id),
  FOREIGN KEY (producto_id) REFERENCES productos(producto_id),
  FOREIGN KEY (obra_id) REFERENCES obras(obra_id),
  FOREIGN KEY (empleado_id) REFERENCES empleados(empleado_id)
);



CREATE TABLE entrada (
  entrada_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  salida_id INT NOT NULL,
  empleado_id INT NOT NULL,
  cliente_id INT NOT NULL,
  fecha_entrada DATE,
  hora_entrada TIME,
  observaciones VARCHAR(100),
  FOREIGN KEY (salida_id) REFERENCES salida(salida_id),
  FOREIGN KEY (empleado_id) REFERENCES empleados(empleado_id),
  FOREIGN KEY (cliente_id) REFERENCES clientes(cliente_id)
);

CREATE TABLE entrada_detalle (
  entrada_id INT,
  producto_id INT,
  obra_id INT,
  entrada_cantidad INT,
  entrada_cantidad_propia INT,
  entrada_cantidad_subalquilada INT,
  estado VARCHAR(20),
  FOREIGN KEY (entrada_id) REFERENCES entrada(entrada_id),
  FOREIGN KEY (producto_id) REFERENCES productos(producto_id),
  FOREIGN KEY (obra_id) REFERENCES obras(obra_id)
);

CREATE TABLE inventario (
  producto_id INT PRIMARY KEY AUTO_INCREMENT,
  CantidadInicial INT,
  CantidadIngresos INT,
  CantidadSalidas INT,
  CantidadFinal INT,
  FechaInventario DATE,
  TipoOperacion VARCHAR(20)
);
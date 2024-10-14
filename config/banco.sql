CREATE DATABASE ebanking_project;

USE ebanking_project;

CREATE TABLE cuenta (
  Num_Cun int(8) NOT NULL,
  Saldo decimal(20,0) NOT NULL,
  Cuenta_fav int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE transacciones (
  ID_trans int(8) NOT NULL,
  Fecha date NOT NULL,
  Concepto varchar(60) NOT NULL,
  Monto decimal(20,0) NOT NULL,
  cuenta_dest int(8) NOT NULL
);

CREATE TABLE usuario (
  ID_Usuario int(8) NOT NULL,
  Nombre varchar(20) NOT NULL,
  Apellido varchar(20) NOT NULL,
  Gmail varchar(40) NOT NULL,
  Contrasena varchar(200) NOT NULL
);

ALTER TABLE cuenta
  ADD PRIMARY KEY (Num_Cun);

ALTER TABLE transacciones
  ADD PRIMARY KEY (ID_trans);

ALTER TABLE usuario
  ADD PRIMARY KEY (ID_Usuario);

ALTER TABLE cuenta
  MODIFY Num_Cun int(8) NOT NULL AUTO_INCREMENT;

ALTER TABLE transacciones
  MODIFY ID_trans int(8) NOT NULL AUTO_INCREMENT;

ALTER TABLE usuario
  MODIFY ID_Usuario int(8) NOT NULL AUTO_INCREMENT;

ALTER TABLE cuenta
  ADD CONSTRAINT cuenta_ibfk_1 FOREIGN KEY (Num_Cun) REFERENCES transacciones (ID_trans);

ALTER TABLE usuario
  ADD CONSTRAINT usuario_ibfk_1 FOREIGN KEY (ID_Usuario) REFERENCES cuenta (Num_Cun);



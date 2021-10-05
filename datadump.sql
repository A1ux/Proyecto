create database proyecto;
use proyecto;

create table users(
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    password varchar(100) NOT NULL,
    isAdmin bool NOT NULL,
    PRIMARY KEY(id)
);

create table products(
    id INT NOT NULL AUTO_INCREMENT,
    name varchar(150) NOT NULL,
    price float(8,2) NOT NULL,
    stock int not null,
    PRIMARY KEY(id)
);

create table comentarios(
    id INT NOT NULL AUTO_INCREMENT,
    usuario varchar(100) NOT NULL,
    comentario varchar(255),
    primary key (id)
);


insert into users(name, password, isAdmin) values ("admin","admin",true);
insert into users(name, password, isAdmin) values ("mario","mario1234$",false);
insert into users(name, password, isAdmin) values ("ramiro","ramiro123",false);
insert into users(name, password, isAdmin) values ("fernando","password",false);
insert into users(name, password, isAdmin) values ("mariana","password123",false);

insert into products(name, price, stock) values ("Producto 1", 12.50, 40);
insert into products(name, price, stock) values ("Producto 2", 15, 30);
insert into products(name, price, stock) values ("Producto 3", 41.50, 20);
insert into products(name, price, stock) values ("Producto 4", 33.10, 30);
insert into products(name, price, stock) values ("Producto 5", 43, 90);
insert into products(name, price, stock) values ("Producto 6", 21.75, 10);
insert into products(name, price, stock) values ("Producto 7", 15, 150);
insert into products(name, price, stock) values ("Producto 8", 13.5, 100);
insert into products(name, price, stock) values ("Producto 9", 10, 70);
insert into products(name, price, stock) values ("Producto 10", 5.50, 10);

create database if not exists csantos;

use csantos;

create table usuarios(
    correo varchar(100) not null,
    contrasena varchar(100) not null,
    fechacreacion date not null,
    primary key (correo)
);

create table conferencistas(
    correo varchar(100) not null,
    nombre varchar(100) not null,
    apellido varchar(100) not null,
    profesion varchar(100) not null,
    biografia varchar(250) not null,
    primary key(correo)
);

create table conferencias(
    nombre varchar(100) not null,
    correo_Conferencistas varchar(100) not null,
    foreign key (correo_Conferencistas) 
    references conferencistas(correo)
);

create table asistentes(
    correo varchar(100) not null,
    nombre varchar(100) not null,
    apellido varchar(100) not null,
    primary key (correo)
);

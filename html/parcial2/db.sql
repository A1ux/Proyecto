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
    id int not null auto_increment,
    nombre varchar(100) not null,
    correo_Conferencistas varchar(100) not null,
    foreign key (correo_Conferencistas) 
    references conferencistas(correo),
    primary key (id)
);

create table asistentes(
    correo varchar(100) not null,
    nombre varchar(100) not null,
    apellido varchar(100) not null,
    primary key (correo)
);
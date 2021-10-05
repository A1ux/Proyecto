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
    comentario text not null,
    primary key (id)
);
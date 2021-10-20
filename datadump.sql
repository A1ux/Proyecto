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

CREATE TABLE IF NOT EXISTS tblpasswordhistory (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(150) DEFAULT NULL,
  password varchar(200) DEFAULT NULL,
  PostingDate timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  primary key(id)
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

insert into tblpasswordhistory(name,password) values("admin","admin");
insert into tblpasswordhistory(name,password) values("admin","abcd1234");
insert into tblpasswordhistory(name,password) values("admin","test123");
insert into tblpasswordhistory(name,password) values("admin","password");
insert into tblpasswordhistory(name,password) values("admin","password1");
insert into tblpasswordhistory(name,password) values("admin","password2");
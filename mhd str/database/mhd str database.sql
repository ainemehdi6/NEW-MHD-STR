
create database mhdstr;
use mhdstr;

create table Client(
id_client varchar(50) primary key not null ,
first_name varchar(50) not null,
last_name varchar(50) not null,
country varchar(50) not null,
house_adress varchar(200) not null,
state varchar(50) not null,
city varchar(50)  not null,
zip_code int(10) not null,
phone varchar(20) not null,
email_address varchar(50) not null,
login varchar(20) not null,
password varchar(50) not null 
);

create  table clients_subs(
idSub int primary key not null auto_increment,
emailSubs varchar(50) not null
);

create table commande(
num_cmd int(50) primary key not null auto_increment,
date_cmd varchar(50) not null,
id_client varchar(50) not null,
CONSTRAINT fk_client_id FOREIGN KEY (id_client) REFERENCES Client(id_client)
);
create table contient(
num_cmd int(50) not null auto_increment,
prod_ref varchar(50) not null,
qte int not null,
primary key(num_cmd,prod_ref),
CONSTRAINT fk_commande_num FOREIGN KEY (num_cmd) REFERENCES commande(num_cmd),
CONSTRAINT fk_produit_ref FOREIGN KEY (prod_ref) REFERENCES products(prod_ref)
);
create table products (
prod_ref varchar(20) primary key not null ,
prod_categ varchar(100) not null,
prod_name varchar(300) not null,
prod_price double not null,
prod_stock int(50) not null,
prod_details varchar(300) not null,
prod_facture varchar(100) not null,
prod_main_img varchar(50) not null
);
create table images (
prod_ref varchar(20) not null,
image1 varchar(50) not null,
image2 varchar(50) not null,
CONSTRAINT fk_prod_ref FOREIGN KEY (prod_ref) REFERENCES products(prod_ref)
);
create table users(
iduser varchar(50) primary key not null ,
nom varchar(50) not null ,
prenom varchar(50) not null,
login varchar(50) not null,
password varchar(50) not null
);
insert into users values ('admin','EL AINE','EL MEHDI','admin','admin');








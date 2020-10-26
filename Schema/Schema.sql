#create database if not exists moviepassdb;
use moviepassdb;

/*create table if not exists users(
idUser int not null auto_increment,
name varchar(30) not null,
lastName varchar(30) not null,
email varchar(30) not null,
password varchar(30) not null,
isAdmin boolean default(0),
constraint `PK-idUser` primary key (idUser)
);*/


#select * from users;

#insert into `users` (`name`, `lastName`, `email`, `password`) values ('client', 'client', 'client@client.com', 'client');
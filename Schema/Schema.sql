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
select * from cinemas;


/*create table if not exists cinemas(
name varchar(30) not null,
capacity int not null,
adress varchar(30) not null,
idCinema int not null auto_increment,
active boolean default(1),
constraint `PK-idCinema` primary key (idCinema)
);*/


/*create table if not exists auditoriums(
amountOfSeats int not null,
idAuditorium int not null auto_increment,
idCinema int not null,
ticketPrice int not null,
nameAuditorium varchar(30) not null,
active boolean default(1),
constraint `PK-idAuditorium` primary key (idAuditorium),
constraint `FK-idCinema` foreign key (idCinema) references cinemas(idCinema)
);*/


/*create table if not exists movies(
idMovie int not null,
adult boolean not null,
language varchar(5) not null,
title varchar(50) not null,
overview text not null,
releaseDate varchar(15) not null,
constraint `PK-idMovie` primary key (idMovie)
);*/

/*create table if not exists genres(
idGenre int not null,
genre varchar(10),
idMovie int not null,
constraint `PK-idGenre` primary key (idGenre),
constraint `FK-idMovie` foreign key (idMovie) references movies(idMovie)
);*/
#DROP DATABASE moviepassdb;
create database if not exists moviepassdb;
use moviepassdb;

create table if not exists users(
idUser int not null auto_increment,
firstName varchar(30) not null,
lastName varchar(30) not null,
email varchar(30) not null,
password varchar(30) not null,
isAdmin boolean default(0),
constraint `PK-idUser` primary key (idUser)
);

#UPDATE users SET isAdmin = 1 WHERE idUser = 1;
select * from users;

#DROP TABLE cinemas;
create table if not exists cinemas(
name varchar(30) not null,
capacity int not null,
adress varchar(50) not null,
idCinema int not null auto_increment,
isActive boolean default(1),
constraint `PK-idCinema` primary key (idCinema)
);

SELECT * FROM cinemas;

#UPDATE cinemas SET name = "Nuevo nombre 1", capacity = 200, adress = "Nueva calle 1" WHERE idCinema = 1; 

#DROP TABLE auditoriums;
create table if not exists auditoriums(
amountOfSeats int not null,
idAuditorium int not null auto_increment,
idCinema int not null,
ticketPrice int not null,
nameAuditorium varchar(30) not null,
active boolean default(1),
constraint `PK-idAuditorium` primary key (idAuditorium),
constraint `FK-idCinema` foreign key (idCinema) references cinemas(idCinema)
);

#DROP TABLE movies;
create table if not exists movies(
idMovie int not null,
adult boolean not null,
language varchar(5) not null,
title varchar(50) not null,
overview text not null,
releaseDate varchar(15) not null,
posterPath varchar(50) not null,
isActive boolean default(1),
constraint `PK-idMovie` primary key (idMovie)
);

#DROP TABLE genres;
create table if not exists genres(
idGenre int not null,
name varchar(20),
constraint `PK-idGenre` primary key (idGenre)
);

#DROP TABLE genresXmovies;
create table if not exists genresXmovies(
idGenreXmovie int auto_increment not null,
idMovie int not null,
idGenre int not null,
constraint `PK-idGenreXmovie` primary key (idGenreXmovie),
constraint `FK-idMovie` foreign key (idMovie) references movies (idMovie),
constraint `FK-idGenre` foreign key (idGenre) references genres (idGenre) 
);

#DROP TABLE projections;
create table if not exists projections(
idProjection int auto_increment not null,
dateTime varchar(50) not null,
idAuditorium int not null,
idMovie int not null,
constraint `PK-idProjection` primary key (idProjection),
constraint `FK-idAuditorium` foreign key (idAuditorium) references auditoriums (idAuditorium),
constraint `FK-projection-idMovie` foreign key (idMovie) references movies (idMovie)
); 
#DROP DATABASE moviepassdb;
create database if not exists moviepassdb;
use moviepassdb;

#DROP TABLE users;
create table if not exists users(
idUser int not null auto_increment,
firstName varchar(30) not null,
lastName varchar(30) not null,
email varchar(30) not null,
password varchar(30) not null,
city varchar(30) not null,
isAdmin boolean default(0),
constraint `PK-idUser` primary key (idUser)
);

#DROP TABLE cinemas;
create table if not exists cinemas(
name varchar(30) not null,
capacity int not null,
adress varchar(50) not null,
idCinema int not null auto_increment,
isActive boolean default(1),
constraint `PK-idCinema` primary key (idCinema)
);

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
adult varchar(15) not null,
language varchar(5) not null,
title varchar(70) not null,
runtime varchar(10) not null,
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
date varchar(15) not null,
startTime varchar(15) not null,
endTime varchar(50) not null,
idAuditorium int not null,
idMovie int not null,
isActive boolean default(1),
constraint `PK-idProjection` primary key (idProjection),
constraint `FK-idAuditorium` foreign key (idAuditorium) references auditoriums (idAuditorium),
constraint `FK-projection-idMovie` foreign key (idMovie) references movies (idMovie)
); 

#DROP TABLE PURCHASES;
create table if not exists purchases(
idPurchase int not null auto_increment,
totalPrice int not null,
discount int not null,
subtotal int not null,
datePurchase varchar(15) not null,
idProjection int not null,
idUser int not null,
constraint `PK-idPurchase` primary key (idPurchase),
constraint `FK-idProjection` foreign key (idProjection) references projections (idProjection),
constraint `FK-idUser` foreign key (idUser) references users (idUser)
);

#DROP TABLE TICKETS;
create table if not exists tickets(
number int not null auto_increment,
qrCode int not null,
idPurchase int not null,
constraint `PK-number` primary key (number),
constraint `FK-idPurchase` foreign key (idPurchase) references purchases (idPurchase)
);

#--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------#
 
SELECT idPurchase, totalPrice, discount, datePurchase
FROM purchases
WHERE idUser = 1
ORDER by idPurchase DESC
LIMIT 1;

select * from tickets
where idPurchase = 1;

#idPurchase, totalPrice, discount, subtotal, datepurchase, purchase.idProjection, p.idProjection, p.idMovie, m.idMovie, m.title

select p.idPurchase, p.totalPrice, p.discount, p.subtotal, p.datePurchase, f.idProjection, m.title
from purchases as p
join projections as f
on p.idProjection = f.idProjection
join movies as m
on f.idMovie = m.idMovie
where p.idUser = 2;

#INSERT INTO projections (date, startTime, endTime, idAuditorium, idMovie) VALUES ("2020-10-16", "16:00", "18:00", 1, 635302);
 
SELECT cinemas.name, cinemas.capacity, cinemas.adress, cinemas.idCinema
FROM cinemas
JOIN auditoriums
ON cinemas.idCinema = auditoriums.idCinema
WHERE auditoriums.idAuditorium = 1;

select * from movies;
select * from projections;
select * from auditoriums;
select * from purchases;
select * from cinemas;
select * from tickets;

select p.idPurchase, p.totalPrice, f.idProjection, f.idAuditorium, a.idAuditorium, a.idCinema, c.idCinema
from purchases as p
join projections as f
on p.idProjection = f.idProjection
join auditoriums as a
on f.idAuditorium = a.idAuditorium
join cinemas as c
where a.idCinema = 1 AND c.idCinema = 1;



select movies.idMovie, movies.adult, movies.language, movies.title, movies.runtime, movies.overview, movies.releaseDate, movies.posterPath
from movies
JOIN projections
ON movies.idMovie = projections.idMovie
WHERE projections.isActive = 1;

select idProjection, date, startTime, endTime, idAuditorium
from projections
where projections.idMovie = 671039 AND projections.isActive = 1;

select * from projections where projections.idMovie = 671039 and projections.isActive = 1;

select * from auditoriums;
select * from cinemas;

select 
p.idProjection, p.date, p.startTime, p.endTime, p.idAuditorium, a.nameAuditorium, a.amountOfSeats, a.ticketPrice, a.idCinema, c.name, c.adress, m.idMovie, m.title
from projections as p
join auditoriums as a
on p.idAuditorium = a.idAuditorium
join cinemas as c
on a.idCinema = c.idCinema
join movies as m
on p.idMovie = m.idMovie
WHERE p.idProjection = 1;
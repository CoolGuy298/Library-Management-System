-- create database tqb_lib;

create table publisher (
	publisher_id serial primary key,
	name varchar(255),
	address varchar(255),
	phone varchar(10) unique
);

create table book (
	book_id serial primary key,
	title varchar(255),
	description varchar(255),
	image varchar(255),
	ISBN varchar(13) unique,
	publication_year date,
	publisher_id int references publisher(publisher_id),
	book_copy int check (book_copy >= 0),
	loan_copy int,
	check ( 0 <= loan_copy and loan_copy <= book_copy),
	location varchar(255)
);

create table genre (
	genre_id serial primary key,
	name varchar(255)
);

create table book_genre(
	book_id int references book(book_id),
	genre_id int references genre(genre_id),
	primary key (book_id, genre_id)
);

create table author (
	author_id serial primary key,
	name varchar(255),
	nationality varchar(255)
);

create table book_author(
	book_id int references book(book_id),
	author_id int references author(author_id),
	primary key (book_id, author_id)
);

create table member(
	member_id serial primary key,
	name varchar(255),
	address varchar(255),
	phone varchar(10),
	username varchar(255) unique,
	password varchar(255)
);

create table librarian(
	librarian_id serial primary key,
	name varchar(255),
	address varchar(255),
	phone varchar(10),
	username varchar(255) unique,
	password varchar(255) 
);

create table loan(
	loan_id serial primary key,
	book_id int references book(book_id),
	member_id int references member(member_id),
	librarian_id int references librarian(librarian_id),
	borrow_date date,
	due_date date, 
	check (due_date >= borrow_date),
	return_date date
);
CREATE DATABASE IF NOT EXISTS tms;
USE tms;

CREATE TABLE IF NOT EXISTS users (
    userId int auto_increment primary key,
    userName varchar(255) not null
);

CREATE TABLE IF NOT EXISTS tasks (
    taskId int auto_increment primary key,
    taskName varchar(255) not null,
    is_done boolean default 0,
    userId int,
    foreign key (userId) references users(userId) on delete set null
);
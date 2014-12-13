create database yabukic;

use yabukic;

grant all on yabukic.* to Miura@localhost identified by 'ybkc';

create table users (
  id int auto_increment primary key,
  name varchar(10),
  password varchar(10),
  nickname varchar(10)
) charset=utf8;

insert into users (id,name,password,nickname) values (1,"矢吹","aaa","yabuki");
insert into users (id,name,password,nickname) values (2,"太郎","bbb","taro");

create table talks (
  id int auto_increment primary key,
  userFrom int,
  userTo int,
  body text,
  time timestamp
) charset=utf8;


create table friend (
  id int auto_increment primary key,
  userid int,
  friendid int,
) charset=utf8;
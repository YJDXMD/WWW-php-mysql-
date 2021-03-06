create database DB;
use DB;

CREATE TABLE user (
   id int auto_increment primary key,
   uname varchar(20) not null,
   pwd varchar(20) not null
)default charset=utf8;

create table member (
    id int primary key auto_increment,
    sid int not null,
    name varchar(15) not null,
    age int not null,
    sex enum('男', '女') not null,
    uid int not null,
    FOREIGN KEY(uid) REFERENCES user(id)
)default charset=utf8;
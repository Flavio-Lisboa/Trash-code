create database trashcode;

use trashcode;

create table users (
id_user int not null primary key auto_increment,
email varchar(50) not null,
user_password varchar(40) not null
)engine=innodb;

create table codes (
id_code int not null primary key auto_increment,
title varchar(40) not null,
content varchar(4000) not null,
id_user int not null,
code_date datetime not null	
)engine=innodb;

alter table codes
add constraint fk_users_codes
foreign key (id_user)
references users (id_user)
on delete cascade;
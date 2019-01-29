CREATE TABLE tbl_privilege(
id int PRIMARY KEY AUTO_INCREMENT,
privilege_name varchar(100),
status boolean DEFAULT 0,
image varchar(100),
created_at datetime,
updated_at datetime

);

CREATE TABLE tbl_users(
u_id int PRIMARY KEY AUTO_INCREMENT,
name varchar(100) not null,
username varchar(100) UNIQUE,
email varchar(100) UNIQUE,
password varchar(100),
status boolean DEFAULT 0,
image varchar(100),
created_at datetime,
updated_at datetime

);

CREATE TABLE tbl_manage_privilege(
id int AUTO_INCREMENT PRIMARY KEY,
user_id int,
privilege_id int,
FOREIGN KEY(user_id) REFERENCES tbl_users(u_id) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY(privilege_id) REFERENCES tbl_privilege(id) ON DELETE RESTRICT ON UPDATE CASCADE
);


ALTER TABLE tbl_users ADD remember_me varchar(100) not null AFTER image;


CREATE TABLE tbl_sliders(
id int AUTO_INCREMENT PRIMARY KEY,
title varchar(255) UNIQUE,
image varchar(100) not null,
status boolean DEFAULT 0,
description text,
created_at datetime,
updated_at datetime

);




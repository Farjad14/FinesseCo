drop table users;
drop table address;

create table users (
	username varchar(20) PRIMARY KEY,
  email varchar(40),
  password varchar(20),
	first varchar(20),
	last varchar(20),
  phone INTEGER
);

create table address (
	username varchar(20) REFERENCES users,
	city varchar(30),
  province_state varchar(20),
  country varchar(20),
  street varchar(100),
  postal_zip varchar(10)
);

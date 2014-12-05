CREATE TABLE users (
   username varchar(20),
   userpwd  varchar(20),
   reg_time  datetime,
   login_time  datetime,
   lastaccess  datetime,
   primary key (username));

INSERT INTO users VALUES
('johndoe',	'abc123',	'2011-05-12 13:44:34', '2014-09-25 13:22:48', '2014-11-12 21:14:32'),
('magicmike',	'abc123',	'2014-01-04 12:34:34', '2014-11-23 13:22:48', '2014-11-25 16:42:53'),
('mchotdog',	'abc123',	'2008-09-23 23:44:34', '2014-11-25 06:22:48', '2014-11-25 14:12:13');


CREATE TABLE genres (
   sub varchar(20),
   main varchar(20),
   primary key (sub));

INSERT INTO genres VALUES
('Indie rock', 'Rock'),
('Pop rock', 'Rock'),
('Alternative rock', 'Rock'),
('Indie folk', 'Folk'),
('Indie pop', 'Pop');

CREATE TABLE venues (
   vid char(10),
   vname varchar(40),
   street varchar(40),
   city  varchar(20),
   state  varchar(20),
   zipcode char(5),
   primary key (vid));

INSERT INTO venues VALUES
('8800000333', 'Radio City Music Hall',		'1260 6th Avenue',		'New York', 'NY', '10020'),
('8800000111', 'Barclays Center',			'620 Atlantic Ave',		'Brooklyn', 'NY', '11217'),
('8800000843', 'Beacon Theatre',			'2124 Broadway',		'New York', 'NY', '10023'),
('8800000678', 'Madison Square Garden',		'4 Pennsylvania Plaza',	'New York', 'NY', '10001'),
('8800000999', 'Terminal 5',				'610 W 56th St',		'New York', 'NY', '10019'),
('8800000256', 'The Bowery Ballroom', 		'6 Delancey St',		'New York', 'NY', '10002'),
('8800000765', 'Music Hall of Williamsburg',	'66 North 6th St.',	'Brooklyn', 'NY', '11211'),
('8800000532', 'Hammerstein Ballroom',		'311 W 34th St.',		'New York', 'NY', '10001'),
('8800000381', 'Mercury Lounge',			'217 East Houston St.',	'New York', 'NY', '10002');

CREATE TABLE artists (
   artistname varchar(30),
   artpwd  varchar(20),
   bio varchar(300), 
   reg_time  datetime,
   login_time  datetime,
   lastaccess  datetime,
   primary key (artistname));

INSERT INTO artists VALUES
('Damien Rice',	'abc123',	'Sounds good.',	'2010-04-22 16:44:34', '2014-11-15 13:22:48', '2014-11-25 16:32:54'),
('Bob Dylan',		'abc123',	'Sounds old.',	'2011-05-22 16:44:34', '2014-10-25 13:22:48', '2014-11-25 13:54:26'),
('Interpol',		'abc123',	'Sounds gay.',	'2009-07-22 16:44:34', '2014-08-25 13:22:48', '2014-11-25 10:23:32'),
('Billy Joel',	'abc123',	'Sounds old.',	'2013-11-22 16:44:34', '2014-09-25 13:22:48', '2014-11-24 09:42:23'),
('Linkin Park',	'abc123',	'Sounds rude.',	'2010-04-22 16:44:34', '2014-05-25 13:22:48', '2014-11-25 14:54:52'),
('Justin Timberlake',	'abc123',	'Sounds girly.',	'2009-04-22 16:44:34', '2014-04-25 13:22:48', '2014-11-22 17:14:24'),
('Belle & Sebastian',	'abc123',	'Sounds childish.',	'2010-04-22 16:44:34', '2014-11-25 13:22:48', '2014-11-23 15:23:32'),
('OneRepublic',	'abc123',	'Sounds pop.',	'2011-08-22 16:44:34', '2014-06-25 13:22:48', '2014-11-22 20:14:54'),
('Maroon 5',		'abc123',	'Sounds pop.',	'2013-12-21 16:44:34', '2014-10-12 13:22:48', '2014-11-24 18:15:23'),
('Snapline',		'abc123',	'Sounds experimental.',	'2010-08-13 16:44:34', '2014-05-23 23:22:48', '2014-11-25 21:15:23');

CREATE TABLE uprofile (
   username varchar(20),
   realname  varchar(30),
   birth   datetime,
   city  varchar(20),
   state  varchar(20),
   zipcode char(5),
   primary key (username),
   foreign key (username) references users(username));

INSERT INTO uprofile VALUES
('johndoe', 'John Doe',	'1985-05-12 13:44:34', 'New York', 'NY', '10012'),
('magicmike','Mike Fassbender',	'1977-04-02 00:00:00', 'Los Angeles', 'CA', '90001'),
('mchotdog', 'Barack Obama',	'1961-08-04 23:44:34', 'Washington', 'DC', '20500');


CREATE TABLE u_sub (
   username varchar(20),
   sub varchar(20),
   primary key (username, sub),
   foreign key (username) references users(username),
   foreign key (sub) references genres(sub));

INSERT INTO u_sub VALUES
('johndoe', 'Alternative rock'),
('johndoe', 'Indie rock');

CREATE TABLE follow (
  from_usr varchar(20),
  to_usr varchar(20),
  f_time datetime,
  primary key (from_usr, to_usr),
  foreign key (from_usr) references users(username),
  foreign key (to_usr) references users(username));


CREATE TABLE concerts (
  cid char(10),
  vid char(10),
  artistname char(30),
  start_time datetime,
  link varchar(40),
  primary key (cid),
  foreign key (vid) references venues(vid),
  foreign key (artistname) references artists(artistname));

INSERT INTO concerts VALUES
('5500000231', '8800000678', 'Bob Dylan', '2015-07-01 20:00:00', 'http://www.bandsintown.com'),
('5500000432', '8800000999', 'Damien Rice', '2014-11-24 19:00:00', 'http://www.bandsintown.com'),
('5500000945', '8800000843', 'Interpol', '2014-11-28 20:00:00', 'http://www.bandsintown.com'),
('5500000791', '8800000111', 'Billy Joel', '2014-12-14 20:00:00', 'http://www.bandsintown.com'),
('5500000953', '8800000111', 'Justin Timberlake', '2014-01-25 19:00:00', 'http://www.bandsintown.com'),
('5500000343', '8800000678', 'Linkin Park', '2014-12-12 19:00:00', 'http://www.bandsintown.com'),
('5500000634', '8800000678', 'Snapline', '2015-03-05 19:00:00', 'http://www.bandsintown.com'),
('5500000189', '8800000843', 'OneRepublic', '2015-04-14 20:00:00', 'http://www.bandsintown.com'),
('5500000513', '8800000333', 'Belle & Sebastian', '2015-06-10 19:00:00', 'http://www.bandsintown.com');


CREATE TABLE attendance (
  username varchar(20),
  cid char(10),
  rating int(2),
  review  varchar(300),
  rv_time datetime,
  primary key (username, cid),
  foreign key (username) references users(username),
  foreign key (cid) references concerts(cid));



CREATE TABLE ucomments (
   username varchar(20),
   cid char(10),
   c_time datetime,
   primary key (username, cid, c_time),
   foreign key (username) references users(username),
   foreign key (cid) references concerts(cid));


CREATE TABLE unew (
   username char(10),
   cid char(10),
   new_time datetime,
   primary key (username, cid),
   foreign key (username) references users(username),
   foreign key (cid) references concerts(cid));


CREATE TABLE fans (
   username char(10),
   artistname varchar(30),
   fan_time datetime,
   primary key (username, artistname),
   foreign key (username) references users(username),
   foreign key (artistname) references artists(artistname));


CREATE TABLE anew (
   artistname varchar(30),
   cid char(10),
   new_time datetime,
   primary key (artistname, cid),
   foreign key (artistname) references artists(artistname),
   foreign key (cid) references concerts(cid));


CREATE TABLE recommend (
   username char(10),
   cid char(10),
   listname varchar(30),
   rm_time datetime,
   primary key (username, cid, listname),
   foreign key (username) references users(username),
   foreign key (cid) references concerts(cid));

INSERT INTO recommend VALUES
('johndoe', '5500000432', 'Where to go this winter', '2014-11-25 15:12:13'),
('johndoe', '5500000189', 'Where to go this winter', '2014-11-25 15:12:13'),
('johndoe', '5500000513', 'Where to go this winter', '2014-11-25 15:12:13');

CREATE TABLE a_sub (
   artistname varchar(30),
   sub varchar(20),
   primary key (artistname, sub),
   foreign key (artistname) references artists(artistname),
   foreign key (sub) references genres(sub));

INSERT INTO a_sub VALUES
('Bob Dylan', 'Alternative rock'),
('Snapline', 'Indie rock'),
('Interpol', 'Indie rock'),
('Belle & Sebastian', 'Indie rock');

DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS login_attempts;
DROP TABLE IF EXISTS post;
DROP TABLE IF EXISTS twitter_accounts;
DROP TABLE IF EXISTS sponsors;
DROP TABLE IF EXISTS image;

CREATE TABLE users(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username varchar(30) NOT NULL,
	email VARCHAR(50) NOT NULL,
	password varchar(128) NOT NULL,
	salt CHAR(128) NOT NULL
);

CREATE TABLE login_attempts (
    user_id INT(11) NOT NULL,
    time VARCHAR(30) NOT NULL
);


INSERT INTO users VALUES(1, 'admin', 'admin@prairiestormchasers.ca',
'00807432eae173f652f2064bdca1b61b290b52d40e429a7d295d76a71084aa96c0233b82f1feac45529e0726559645acaed6f3ae58a286b9f075916ebf66cacc',
'f9aab579fc1b41ed0c44fe4ecdbfcdb4cb99b9023abb241a6db833288f4eea3c02f76e0d35204a8695077dcf81932aa59006423976224be0390395bae152d4ef');

CREATE TABLE post (
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	title varchar(128) NOT NULL,
	content TEXT,
	post_date DATE,
	draft BOOLEAN
);


INSERT INTO post (title, content, post_date, draft) VALUES ("Test Title", "Test Content", "2015-11-05", FALSE);


CREATE TABLE twitter_accounts (
	username varchar(30) NOT NULL PRIMARY KEY
);

INSERT INTO twitter_accounts(username) VALUES("bradcurler");
INSERT INTO twitter_accounts(username) VALUES("swiftchaser");



CREATE TABLE sponsors (
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	image MEDIUMBLOB,
	link varchar(256)
);

CREATE TABLE image (
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	image LONGBLOB
);
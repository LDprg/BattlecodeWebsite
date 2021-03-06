CREATE TABLE users (
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(50) NOT NULL,
	passwd VARCHAR(61) NOT NULL,
	email VARCHAR(50) NOT NULL,
	admin bool DEFAULT 0,
	session text,
	path text NOT NULL,
	created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  	updated TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

  	CONSTRAINT PKC_id PRIMARY KEY(id),
	CONSTRAINT UC_name UNIQUE(name),
	CONSTRAINT UC_email UNIQUE(email)
);

CREATE TABLE uploads (
	id INT NOT NULL AUTO_INCREMENT,
	userid INT,
	filename VARCHAR(50) NOT NULL,
	created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  	updated TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

  	CONSTRAINT PKC_id PRIMARY KEY(id),
  	CONSTRAINT FK_userid FOREIGN KEY(userid) REFERENCES users(id)
);
CREATE TABLE tb_user (
	id INT AUTO_INCREMENT PRIMARY KEY,
	eusrname VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	firstname VARCHAR(255) NOT NULL,
	lastname VARCHAR(255) NOT NULL,
	pass VARCHAR(255) NOT NULL,
	created TIMESTAMP NOT NULL DEFAULT current_timestamp(),
	edited TIMESTAMP NULL DEFAULT NULL,
)  ENGINE=INNODB;

INSERT INTO tb_user VALUES(
	NULL,
	'alercioborges',
	'alercio@email.com',
	'Alercio',
	'Silva',
	'gsdfghgdsfhh',
	NULL,
	NULL
)
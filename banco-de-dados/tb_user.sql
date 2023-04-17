CREATE TABLE tb_user (
	id INT AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(255) NOT NULL,
   email VARCHAR(255) NOT NULL,
	firstname VARCHAR(255) NOT NULL,
	lastname VARCHAR(255) NOT NULL,
	pass VARCHAR(255) NOT NULL,
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
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
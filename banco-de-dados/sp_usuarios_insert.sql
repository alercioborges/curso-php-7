DELIMITER $
CREATE PROCEDURE sp_user_insert(
	p_username VARCHAR(255),
	p_email VARCHAR(255),
	p_firstname VARCHAR(255),
	p_lastname VARCHAR(255),
	p_pass VARCHAR(255)
)
BEGIN

	INSERT INTO tb_user(
		id,
		username,
		email,
		firstname,
		lastname,
		pass,
		created,
		edited
	) VALUES(
		NULL,
		p_username,
		p_email,
		p_firstname,
		p_lastname,
		p_pass,
		NULL,
		NULL
		);
    
   SELECT * FROM tb_user WHERE id  = LAST_INSERT_ID();

END
$
DELIMITER;
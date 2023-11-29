DELIMITER //

CREATE PROCEDURE piUsuario (
	IN _nome			VARCHAR(100),
    IN _email			VARCHAR(100),
    IN _dtNascimento	DATE,
    IN _cidade			VARCHAR(100),
    IN _senha			VARCHAR(100)
)
BEGIN
	INSERT INTO usuario (nome, email, dtNascimento, cidade, senha) VALUES (_nome, _email, _dtNascimento , _cidade, _senha);
END //

DELIMITER // 

CREATE PROCEDURE psLoginUsuario(
	IN _email	VARCHAR(100),
    IN _senha	VARCHAR(100)
)

BEGIN
	SELECT * FROM usuario WHERE email = _email AND senha = _senha;
END //
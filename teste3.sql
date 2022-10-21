CREATE TABLE test.USUARIO (
   Id int NOT NULL AUTO_INCREMENT,
   cpf varchar(8) NULL,
   nome varchar(255) NULL,
   UNIQUE INDEX cpf (cpf),
   CONSTRAINT USUARIO_pk PRIMARY KEY (Id)
);

INSERT INTO test.USUARIO (Id, cpf, nome) VALUES
(1,'16798125050','Luke Skywalker'),
(2,'59875804045','Bruce Wayne'),
(3,'04707649025','Diane Prince'),
(4,'21142450040','Bruce Banner'),
(5,'83257946074','Harley Quinn'),
(6,'07583509025','Peter Parke');

CREATE TABLE test.INFO (
   Id int NULL,
   cpf varchar(11) NULL,
   genero ENUM('M','F') NULL,
   ano_nascimento YEAR NULL,
   UNIQUE INDEX cpf (cpf)
);
INSERT INTO test.INFO (Id, cpf, genero, ano_nascimento) VALUES
(1, '16798125050', 'M', 1976),
(2, '59875804045', 'M', 1960),
(3, '04707649025', 'F', 1988),
(4, '21142450040', 'M', 1954),
(5, '83257946074', 'F', 1970),
(6, '07583509025', 'M', 1972);

SELECT 
	CONCAT(u.nome, ' - ', i.genero)  as 'Usuário', 
	if(('2022'-i.ano_nascimento) > '50', 'SIM', 'NÃO') as 'maior_50_anos' 
FROM test.USUARIO u JOIN test.INFO i ON u.cpf = i.cpf 
WHERE i.cpf IN ('16798125050', '21142450040', '07583509025')
ORDER BY maior_50_anos, i.ano_nascimento ASC;
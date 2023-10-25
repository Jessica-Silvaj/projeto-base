create sequence seq_setor;
CREATE TABLE setor(
	id int auto_increment not null,
	nome varchar(255) not null,
	primary key (id)
);

create sequence seq_usuario;
CREATE TABLE usuario(
	id int auto_increment not null,
	cod_matricula int unique not null,
	nome varchar(255) not null,
	telefone varchar(20),
	senha varchar(255) not null,
	ativo boolean default 1,
	primary key (id)
);

create sequence seq_usuario_setor;
CREATE TABLE usuario_setor (
    usuario_id int,
    setor_id int,
    principal boolean,
	primary key (usuario_id, setor_id),
    foreign key (usuario_id) references usuario(id),
    foreign key (setor_id) references setor(id)
);

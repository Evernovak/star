/************ Add: Sequences ***************/

CREATE SEQUENCE actions_id_action_seq INCREMENT BY 1;

CREATE SEQUENCE agenda_id_agenda_seq INCREMENT BY 1;

CREATE SEQUENCE bairro_id_bairro_seq INCREMENT BY 1;

CREATE SEQUENCE banner_id_banner_seq INCREMENT BY 1;

CREATE SEQUENCE cidade_id_cidade_seq INCREMENT BY 1;

CREATE SEQUENCE foto_id_foto_seq INCREMENT BY 1;

CREATE SEQUENCE log_action_id_log_seq INCREMENT BY 1;

CREATE SEQUENCE permissao_id_permissao_seq INCREMENT BY 1;

CREATE SEQUENCE pessoa_id_pessoa_seq INCREMENT BY 1;

CREATE SEQUENCE vila_id_vila_seq INCREMENT BY 1;



/************ Update: Tables ***************/

/******************** Add Table: actions ************************/

/* Build Table Structure */
CREATE TABLE actions
(
	id_action INTEGER DEFAULT nextval('actions_id_action_seq'::regclass) NOT NULL,
	nome_action VARCHAR(60) NOT NULL
) WITHOUT OIDS;

/* Add Primary Key */
ALTER TABLE actions ADD CONSTRAINT pkactions
	PRIMARY KEY (id_action);


/******************** Add Table: agenda ************************/

/* Build Table Structure */
CREATE TABLE agenda
(
	id_agenda INTEGER DEFAULT nextval('agenda_id_agenda_seq'::regclass) NOT NULL,
	id_usuario INTEGER NOT NULL,
	descricao TEXT NOT NULL,
	dth_agenda TIMESTAMP NOT NULL,
	url CHAR(300) NULL
) WITHOUT OIDS;

/* Add Primary Key */
ALTER TABLE agenda ADD CONSTRAINT agenda_pkey
	PRIMARY KEY (id_agenda);

/* Add Comments */
COMMENT ON COLUMN agenda.id_agenda IS 'Campo identificador da agenda.';

COMMENT ON COLUMN agenda.id_usuario IS 'Campo referente ao usuário que tem um compromisso ou tarefa.';

COMMENT ON COLUMN agenda.descricao IS 'Campo referente a mensagem.';

COMMENT ON COLUMN agenda.dth_agenda IS 'Campo referente a data e hora do compromisso ou tarefa.';

COMMENT ON TABLE agenda IS 'Tabela agenda, refencia todas as ações, envios de mensagens, de um determinado usuario.
Todos os usuários deverão estar cadastrados na agenda.';


/******************** Add Table: bairro ************************/

/* Build Table Structure */
CREATE TABLE bairro
(
	id_bairro INTEGER DEFAULT nextval('bairro_id_bairro_seq'::regclass) NOT NULL,
	descricao VARCHAR(50) NULL,
	regiao VARCHAR(6) NULL
) WITHOUT OIDS;

/* Add Primary Key */
ALTER TABLE bairro ADD CONSTRAINT bairro_pkey
	PRIMARY KEY (id_bairro);

/* Add Comments */
COMMENT ON COLUMN bairro.id_bairro IS 'Identificador da tabela bairro';

COMMENT ON COLUMN bairro.descricao IS 'Campo referente ao nome do bairro';

COMMENT ON COLUMN bairro.regiao IS 'Campo referente aos pontos cardeias';


/******************** Add Table: banner ************************/

/* Build Table Structure */
CREATE TABLE banner
(
	id_banner INTEGER DEFAULT nextval('banner_id_banner_seq'::regclass) NOT NULL,
	nome VARCHAR(30) NULL,
	titulo VARCHAR(100) NULL,
	descricao VARCHAR(300) NULL
) WITHOUT OIDS;

/* Add Primary Key */
ALTER TABLE banner ADD CONSTRAINT pkbanner
	PRIMARY KEY (id_banner);

/* Add Comments */
COMMENT ON COLUMN banner.nome IS 'nome do arquivo ';

COMMENT ON COLUMN banner.titulo IS 'titulo na imagem';

COMMENT ON COLUMN banner.descricao IS 'descrição que aparece embaixo da imgem';

COMMENT ON TABLE banner IS 'banner da home do site';


/******************** Add Table: cidade ************************/

/* Build Table Structure */
CREATE TABLE cidade
(
	id_cidade INTEGER DEFAULT nextval('cidade_id_cidade_seq'::regclass) NOT NULL,
	descricao VARCHAR(50) NOT NULL,
	sigla_uf CHAR(2) NOT NULL
) WITHOUT OIDS;

/* Add Primary Key */
ALTER TABLE cidade ADD CONSTRAINT cidade_pkey
	PRIMARY KEY (id_cidade);

/* Add Comments */
COMMENT ON COLUMN cidade.id_cidade IS 'Identificador da tabela cidade';

COMMENT ON COLUMN cidade.descricao IS 'Campo referente ao nome da cidade';


/******************** Add Table: endereco ************************/

/* Build Table Structure */
CREATE TABLE endereco
(
	id_endereco INTEGER NOT NULL,
	tipo CHAR(1) NOT NULL,
	logradouro VARCHAR(50) NULL,
	complemento VARCHAR(50) NULL,
	numero VARCHAR(10) NULL,
	cep VARCHAR(8) NULL,
	id_bairro INTEGER NULL,
	id_vila INTEGER NULL,
	id_cidade INTEGER NULL
) WITHOUT OIDS;

/* Add Primary Key */
ALTER TABLE endereco ADD CONSTRAINT endereco_idx
	PRIMARY KEY (id_endereco, tipo);

/* Add Comments */
COMMENT ON COLUMN endereco.id_endereco IS 'Campo identificador de endereço. Este campo é uma chave estrangeira de pessoa ou imóvel. O que diferencia se é um endereço de pessoa ou imóvel é o tipo do endereço., ou do plantão do site';

COMMENT ON COLUMN endereco.tipo IS 'Campo referente ao tipo de endereço. Se referencia pessoa ou imóvel. Valores possíveis: ''I'' => Imóvel, ''P'' => Pessoa, ''S'' => Plantões site';

COMMENT ON COLUMN endereco.logradouro IS 'Campo referente ao logradouro do endereço da pessoa';

COMMENT ON COLUMN endereco.complemento IS 'Campo referente ao complemento do endereço da pessoa. Ex.: Casa, Ap, etc.';

COMMENT ON COLUMN endereco.numero IS 'Campo referente ao número do endereço da pessoa.';

COMMENT ON COLUMN endereco.cep IS 'Campo referente ao cep do endereço da pessoa';


/******************** Add Table: foto ************************/

/* Build Table Structure */
CREATE TABLE foto
(
	id_foto INTEGER DEFAULT nextval('foto_id_foto_seq'::regclass) NOT NULL,
	nome VARCHAR(30) NOT NULL,
	legenda VARCHAR(30) NULL
) WITHOUT OIDS;

/* Add Primary Key */
ALTER TABLE foto ADD CONSTRAINT pkfoto
	PRIMARY KEY (id_foto);


/******************** Add Table: log ************************/

/* Build Table Structure */
CREATE TABLE log
(
	id_tipo INTEGER NOT NULL,
	data TIMESTAMP NOT NULL,
	descricao TEXT NOT NULL,
	id_filial INTEGER NULL
) WITHOUT OIDS;

/* Add Comments */
COMMENT ON TABLE log IS 'registra todas as ações do sistema';


/******************** Add Table: log_action ************************/

/* Build Table Structure */
CREATE TABLE log_action
(
	id_log INTEGER DEFAULT nextval('log_action_id_log_seq'::regclass) NOT NULL,
	id_user_make_action INTEGER NULL,
	id_action INTEGER NOT NULL,
	description_action TEXT NOT NULL,
	data TIMESTAMP DEFAULT now() NOT NULL,
	id_related INTEGER NULL
) WITHOUT OIDS;

/* Add Primary Key */
ALTER TABLE log_action ADD CONSTRAINT pklog_action
	PRIMARY KEY (id_log);

/* Add Comments */
COMMENT ON COLUMN log_action.id_user_make_action IS 'Id do usuario que fez a ação';

COMMENT ON COLUMN log_action.id_related IS 'Id do relacionado';


/******************** Add Table: p_fisica ************************/

/* Build Table Structure */
CREATE TABLE p_fisica
(
	id_pessoa INTEGER NOT NULL,
	cpf VARCHAR(14) NULL,
	rg VARCHAR(11) NULL,
	dt_nascimento DATE NULL,
	orgao_expedidor VARCHAR(40) NULL,
	estado_civil VARCHAR(3) NULL,
	profissao VARCHAR(30) NULL,
	emissao DATE NULL
) WITHOUT OIDS;

/* Add Primary Key */
ALTER TABLE p_fisica ADD CONSTRAINT p_fisica_pkey
	PRIMARY KEY (id_pessoa);

/* Add Comments */
COMMENT ON COLUMN p_fisica.id_pessoa IS 'Campo identificador da pessoa física. É o mesmo identificador de pessoa. Caracterizando assim uma herança.';

COMMENT ON COLUMN p_fisica.cpf IS 'Campo referente ao Cadastro de Pessoa Física (CPF) de uma pessoa física';

COMMENT ON COLUMN p_fisica.rg IS 'Campo referente ao registro geral (rg) de uma pessoa física';

COMMENT ON COLUMN p_fisica.dt_nascimento IS 'Campo referente a data de nascimento da pessoa';

COMMENT ON COLUMN p_fisica.orgao_expedidor IS 'Campo referente ao Órgão Expedidor do documento de identidade da pessoa física. Evita redundância de RG.';


/******************** Add Table: p_juridica ************************/

/* Build Table Structure */
CREATE TABLE p_juridica
(
	id_pessoa INTEGER NOT NULL,
	cnpj VARCHAR(18) NULL,
	razao_social VARCHAR(50) NULL
) WITHOUT OIDS;

/* Add Primary Key */
ALTER TABLE p_juridica ADD CONSTRAINT p_juridica_pkey
	PRIMARY KEY (id_pessoa);

/* Add Comments */
COMMENT ON COLUMN p_juridica.id_pessoa IS 'Campo identificador da pessoa jurídica. É o mesmo identificador de pessoa. Caracterizando assim uma herança.';

COMMENT ON COLUMN p_juridica.cnpj IS 'Campo referente ao cnpj de uma pessoa jurídica (Empresa)';

COMMENT ON COLUMN p_juridica.razao_social IS 'Campo referente a razão social de uma pessoa jurídica (Empresa)';


/******************** Add Table: permissoes ************************/

/* Build Table Structure */
CREATE TABLE permissoes
(
	id_permissao INTEGER NOT NULL,
	tipo_permissao VARCHAR(50) NOT NULL,
	descricao TEXT NULL
) WITHOUT OIDS;

/* Add Primary Key */
ALTER TABLE permissoes ADD CONSTRAINT pk_permissoes
	PRIMARY KEY (id_permissao);

/* Add Unique Constraints */
ALTER TABLE permissoes
	ADD CONSTRAINT uc_id_permissao UNIQUE (id_permissao);


/******************** Add Table: pessoa ************************/

/* Build Table Structure */
CREATE TABLE pessoa
(
	id_pessoa INTEGER DEFAULT nextval('pessoa_id_pessoa_seq'::regclass) NOT NULL,
	nome VARCHAR(50) NOT NULL,
	email VARCHAR(50) NULL,
	nacionalidade VARCHAR(50) NULL,
	profissao VARCHAR(50) NULL,
	data_cadastro DATE NULL
) WITHOUT OIDS;

/* Add Primary Key */
ALTER TABLE pessoa ADD CONSTRAINT pessoa_pkey
	PRIMARY KEY (id_pessoa);

/* Add Comments */
COMMENT ON COLUMN pessoa.id_pessoa IS 'Campo identificador de pessoa.';

COMMENT ON COLUMN pessoa.nome IS 'Campo referente ao nome completo da pessoa';

COMMENT ON COLUMN pessoa.email IS 'Campo referente ao email da pessoa. Se possuir.';

COMMENT ON COLUMN pessoa.data_cadastro IS 'data em que foi feito o cadastro da pessoa';


/******************** Add Table: representante ************************/

/* Build Table Structure */
CREATE TABLE representante
(
	id_pessoa INTEGER NOT NULL,
	id_p_juridica INTEGER NOT NULL
) WITHOUT OIDS;

/* Add Primary Key */
ALTER TABLE representante ADD CONSTRAINT pkrepresentante
	PRIMARY KEY (id_pessoa, id_p_juridica);

/* Add Comments */
COMMENT ON TABLE representante IS 'tabela que liga a pessoa fisica a pessoa juridica';


/******************** Add Table: telefone ************************/

/* Build Table Structure */
CREATE TABLE telefone
(
	numero VARCHAR(14) NOT NULL,
	id_pessoa INTEGER NOT NULL,
	tipo VARCHAR(3) NOT NULL
) WITHOUT OIDS;

/* Add Primary Key */
ALTER TABLE telefone ADD CONSTRAINT pktelefone
	PRIMARY KEY (id_pessoa);

/* Add Comments */
COMMENT ON COLUMN telefone.tipo IS 'cel-Celular res-Residencial com-Comercial';

/* Add Unique Constraints */
ALTER TABLE telefone
	ADD CONSTRAINT uc_id_filial UNIQUE (id_filial);

ALTER TABLE telefone
	ADD CONSTRAINT uc_numero UNIQUE (numero);


/******************** Add Table: uf ************************/

/* Build Table Structure */
CREATE TABLE uf
(
	sigla CHAR(2) NOT NULL,
	descricao VARCHAR(50) NULL
) WITHOUT OIDS;

/* Add Primary Key */
ALTER TABLE uf ADD CONSTRAINT uf_pkey
	PRIMARY KEY (sigla);


/******************** Add Table: usuario ************************/

/* Build Table Structure */
CREATE TABLE usuario
(
	id_usuario INTEGER NOT NULL,
	usuario VARCHAR(120) NOT NULL,
	senha CHAR(32) NOT NULL,
	id_permissao INTEGER NOT NULL,
	status BOOL DEFAULT 'true' NOT NULL
) WITHOUT OIDS;

/* Add Primary Key */
ALTER TABLE usuario ADD CONSTRAINT pk_usuario
	PRIMARY KEY (id_usuario);

/* Add Comments */
COMMENT ON COLUMN usuario.id_usuario IS 'Campo identificador de usuário do sistema. Está referenciando o id_pessoa. Caracterizando uma herança.';

COMMENT ON COLUMN usuario.usuario IS 'Campo referente ao nome de usuário que será utilizado para acessar o sistema.';

COMMENT ON COLUMN usuario.senha IS 'Campo referente a senha usada pelo usuário para obter acesso ao sistema.';

COMMENT ON COLUMN usuario.id_permissao IS 'Tipo de usuário {1 = administrador}';

/* Add Unique Constraints */
ALTER TABLE usuario
	ADD CONSTRAINT uc_usuario UNIQUE (usuario);


/******************** Add Table: vila ************************/

/* Build Table Structure */
CREATE TABLE vila
(
	id_vila INTEGER DEFAULT nextval('vila_id_vila_seq'::regclass) NOT NULL,
	descricao VARCHAR(60) NULL
) WITHOUT OIDS;

/* Add Primary Key */
ALTER TABLE vila ADD CONSTRAINT vila_pkey
	PRIMARY KEY (id_vila);





/************ Add Foreign Keys ***************/

/* Add Foreign Key: fk_agenda_usuario */
ALTER TABLE agenda ADD CONSTRAINT fk_agenda_usuario
	FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario)
	ON UPDATE CASCADE ON DELETE CASCADE;

/* Add Foreign Key: fk_cidade_uf */
ALTER TABLE cidade ADD CONSTRAINT fk_cidade_uf
	FOREIGN KEY (sigla_uf) REFERENCES uf (sigla)
	ON UPDATE NO ACTION ON DELETE NO ACTION;

/* Add Foreign Key: fk_endereco_bairro */
ALTER TABLE endereco ADD CONSTRAINT fk_endereco_bairro
	FOREIGN KEY (id_bairro) REFERENCES bairro (id_bairro)
	ON UPDATE CASCADE ON DELETE RESTRICT;

/* Add Foreign Key: fk_endereco_cidade */
ALTER TABLE endereco ADD CONSTRAINT fk_endereco_cidade
	FOREIGN KEY (id_cidade) REFERENCES cidade (id_cidade)
	ON UPDATE CASCADE ON DELETE RESTRICT;

/* Add Foreign Key: fk_endereco_vila */
ALTER TABLE endereco ADD CONSTRAINT fk_endereco_vila
	FOREIGN KEY (id_vila) REFERENCES vila (id_vila)
	ON UPDATE CASCADE ON DELETE RESTRICT;

/* Add Foreign Key: fk_log_action_actions */
ALTER TABLE log_action ADD CONSTRAINT fk_log_action_actions
	FOREIGN KEY (id_action) REFERENCES actions (id_action)
	ON UPDATE NO ACTION ON DELETE NO ACTION;

/* Add Foreign Key: fk_log_action_usuario */
ALTER TABLE log_action ADD CONSTRAINT fk_log_action_usuario
	FOREIGN KEY (id_user_make_action) REFERENCES usuario (id_usuario)
	ON UPDATE NO ACTION ON DELETE NO ACTION;

/* Add Foreign Key: fk_p_fisica_pessoa */
ALTER TABLE p_fisica ADD CONSTRAINT fk_p_fisica_pessoa
	FOREIGN KEY (id_pessoa) REFERENCES pessoa (id_pessoa)
	ON UPDATE NO ACTION ON DELETE NO ACTION;

/* Add Foreign Key: fk_p_juridica_pessoa */
ALTER TABLE p_juridica ADD CONSTRAINT fk_p_juridica_pessoa
	FOREIGN KEY (id_pessoa) REFERENCES pessoa (id_pessoa)
	ON UPDATE NO ACTION ON DELETE NO ACTION;

/* Add Foreign Key: fk_representante_p_juridica */
ALTER TABLE representante ADD CONSTRAINT fk_representante_p_juridica
	FOREIGN KEY (id_p_juridica) REFERENCES p_juridica (id_pessoa)
	ON UPDATE NO ACTION ON DELETE NO ACTION;

/* Add Foreign Key: fk_representante_pessoa */
ALTER TABLE representante ADD CONSTRAINT fk_representante_pessoa
	FOREIGN KEY (id_pessoa) REFERENCES pessoa (id_pessoa)
	ON UPDATE NO ACTION ON DELETE NO ACTION;

/* Add Foreign Key: fk_telefone_pessoa */
ALTER TABLE telefone ADD CONSTRAINT fk_telefone_pessoa
	FOREIGN KEY (id_pessoa) REFERENCES pessoa (id_pessoa)
	ON UPDATE CASCADE ON DELETE CASCADE;

/* Add Foreign Key: fk_usuario_permissoes */
ALTER TABLE usuario ADD CONSTRAINT fk_usuario_permissoes
	FOREIGN KEY (id_permissao) REFERENCES permissoes (id_permissao)
	ON UPDATE NO ACTION ON DELETE NO ACTION;

/* Add Foreign Key: fk_usuario_pessoa */
ALTER TABLE usuario ADD CONSTRAINT fk_usuario_pessoa
	FOREIGN KEY (id_usuario) REFERENCES pessoa (id_pessoa)
	ON UPDATE NO ACTION ON DELETE NO ACTION;

/* Set Foreign Key Comments */
COMMENT ON CONSTRAINT fk_p_fisica_pessoa ON p_fisica IS 'p_fisica é uma pessoa.';

/* Set Foreign Key Comments */
COMMENT ON CONSTRAINT fk_p_juridica_pessoa ON p_juridica IS 'p_juridica é uma pessoa.';
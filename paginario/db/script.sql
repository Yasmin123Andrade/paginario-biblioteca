-- Criação da tabela Genero -- 
CREATE TABLE Genero (
    id_genero INT AUTO_INCREMENT PRIMARY KEY,
    nome_genero VARCHAR(100) NOT NULL
);

-- Criação da tabela Autor -- 
CREATE TABLE Autor (
    id_autor INT AUTO_INCREMENT PRIMARY KEY,
    nome_completo VARCHAR(100) NOT NULL,
    nacionalidade VARCHAR(100),
    data_nascimento DATE,
    biografia TEXT
);

-- Criação da tabela Usuario -- 
CREATE TABLE Usuario (
    cpf CHAR(11) PRIMARY KEY NOT NULL,
    nome_completo VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    telefone VARCHAR(11),
    login VARCHAR(50) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    id_acesso INT
);

-- Criação da tabela Administrador -- 
CREATE TABLE Administrador (
    cpf_administrador CHAR(11) PRIMARY KEY NOT NULL,
    nome_completo VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    telefone VARCHAR(11),
    login VARCHAR(50) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);

-- Criação da tabela Livro -- 
CREATE TABLE Livro (
    id_livro INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    ano_publicacao INT,
    editor VARCHAR(100),
    genero VARCHAR(100) NOT NULL,
    formato VARCHAR(100),
    link_arquivo VARCHAR(100) UNIQUE,
    capa VARCHAR(255), 
    sinopse VARCHAR(100) NOT NULL,
    classificacao_indicativa INT NOT NULL,
    genero_id INT,
    cpf_administrador CHAR(11),
    FOREIGN KEY (genero_id) REFERENCES Genero(id_genero),
    FOREIGN KEY (cpf_administrador) REFERENCES Administrador(cpf_administrador)
);

-- Criação da tabela Envio_Livro -- 
CREATE TABLE Envio_Livro (
    id_envio INT AUTO_INCREMENT PRIMARY KEY,
    data_envio DATE,
    estado VARCHAR(100),
    livro_id INT,
    autor_id INT,
    FOREIGN KEY (livro_id) REFERENCES Livro(id_livro),
    FOREIGN KEY (autor_id) REFERENCES Autor(id_autor)
);

-- Criação da tabela Le -- 
CREATE TABLE Le (
    id_leitura INT AUTO_INCREMENT PRIMARY KEY,
    cpf_usuario CHAR(11) NOT NULL,
    id_livro INT NOT NULL,
    data_leitura DATE, 
    FOREIGN KEY (cpf_usuario) REFERENCES Usuario(cpf),
    FOREIGN KEY (id_livro) REFERENCES Livro(id_livro)
);

-- Criação da tabela Editora -- 
CREATE TABLE Editora (
    id_editora INT PRIMARY KEY AUTO_INCREMENT,
    nome_editora VARCHAR(100) NOT NULL,
    cnpj VARCHAR(14) NOT NULL UNIQUE,
    telefone VARCHAR(11),
    email VARCHAR(100) NOT NULL UNIQUE
);

-- Criação da tabela Publica -- 
CREATE TABLE Publica (
    id_publicacao INT AUTO_INCREMENT PRIMARY KEY,
    id_editora INT ,
    id_livro INT ,
    data_publicacao DATE,
     FOREIGN KEY (id_editora) REFERENCES Editora(id_editora),
    FOREIGN KEY (id_livro) REFERENCES Livro(id_livro)
);

-- Criação da tabela Endereco_editora -- 
CREATE TABLE Endereco_editora (
    id_endereco INT PRIMARY KEY AUTO_INCREMENT,
    id_editora INT,
    rua VARCHAR(100) NOT NULL,
    numero INT NOT NULL ,
    bairro VARCHAR(100) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
     FOREIGN KEY (id_editora) REFERENCES Editora(id_editora)
     );

-- Criação da tabela Acesso -- 
CREATE TABLE Acesso (
    id_acesso INT PRIMARY KEY AUTO_INCREMENT,
    cpf_usuario CHAR(11) NOT NULL,
    id_livro INT,
    data_acesso DATE,
    FOREIGN KEY (cpf_usuario) REFERENCES Usuario(cpf),
    FOREIGN KEY (id_livro) REFERENCES Livro(id_livro)
);

-- Criação da tabela Solicitacao -- 
CREATE TABLE Solicitacao (
    id_solicitacao INT PRIMARY KEY AUTO_INCREMENT,
    cpf_usuario CHAR(11) NOT NULL,
    id_livro INT,
    data_solicitacao DATE NOT NULL,
    cpf_administrador CHAR(11) NOT NULL,
    FOREIGN KEY (cpf_usuario) REFERENCES Usuario(cpf),
    FOREIGN KEY (id_livro) REFERENCES Livro(id_livro),
    FOREIGN KEY (cpf_administrador) REFERENCES Administrador(cpf_administrador)
);


-- Criação da tabela Endereco usuario -- 
CREATE TABLE Endereco_usuario (
    cpf_usuario CHAR(11) PRIMARY KEY,
    rua VARCHAR(100) NOT NULL,
    numero INT NOT NULL,
    bairro VARCHAR(100) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    FOREIGN KEY (cpf_usuario) REFERENCES Usuario(cpf)
); 

ALTER TABLE Usuario DROP COLUMN id_acesso;

DROP TABLE IF EXISTS Acesso;

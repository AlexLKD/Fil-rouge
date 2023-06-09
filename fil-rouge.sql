CREATE TABLE languages(
   id_languages INT AUTO_INCREMENT,
   name_language VARCHAR(100) NOT NULL,
   PRIMARY KEY(id_languages)
);

CREATE TABLE person(
   id_person INT AUTO_INCREMENT,
   lastname VARCHAR(100) NOT NULL,
   firstname VARCHAR(100) NOT NULL,
   email VARCHAR(100) NOT NULL UNIQUE,
   password VARCHAR(100) NOT NULL,
   PRIMARY KEY(id_person),
   UNIQUE(email)
);

CREATE TABLE course(
   id_course INT AUTO_INCREMENT,
   date_course DATETIME NOT NULL,
   title_course VARCHAR(100) NOT NULL,
   difficulty VARCHAR(100) NOT NULL,
   id_person INT NOT NULL,
   id_languages INT NOT NULL,
   PRIMARY KEY(id_course),
   FOREIGN KEY(id_difficulty) REFERENCES difficulty(id_difficulty),
   FOREIGN KEY(id_person) REFERENCES person(id_person),
   FOREIGN KEY(id_languages) REFERENCES languages(id_languages)
);

CREATE TABLE learn(
   id_course INT,
   id_person INT,
   PRIMARY KEY(id_course, id_person),
   FOREIGN KEY(id_course) REFERENCES course(id_course),
   FOREIGN KEY(id_person) REFERENCES person(id_person)
);

CREATE TABLE difficulty(
   id_difficulty SMALLINT AUTO_INCREMENT,
   PRIMARY KEY(id_difficulty)
);
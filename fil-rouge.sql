CREATE TABLE languages (
    id_languages INT AUTO_INCREMENT,
    name_language VARCHAR(100),
    PRIMARY KEY (id_languages)
);

CREATE TABLE person (
    id_person INT AUTO_INCREMENT,
    lastname VARCHAR(100),
    firstname VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(100),
    PRIMARY KEY (id_person)
);

CREATE TABLE course (
    id_course INT AUTO_INCREMENT,
    date_course DATETIME,
    title_course VARCHAR(100),
    difficulty VARCHAR(100),
    id_person INT,
    id_languages INT,
    FOREIGN KEY (id_person) REFERENCES person(id_person),
    FOREIGN KEY (id_languages) REFERENCES languages(id_languages),
    PRIMARY KEY (id_course)
);

CREATE TABLE learn (
    id_course INT,
    id_person INT,
    FOREIGN KEY (id_course) REFERENCES course(id_course),
    FOREIGN KEY (id_person) REFERENCES person(id_person),
    PRIMARY KEY (id_course, id_person)
);
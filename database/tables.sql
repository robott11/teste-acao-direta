CREATE TABLE users (
    id bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username varchar(255) NOT NULL,
    name varchar(255),
    password varchar(61) NOT NULL
);
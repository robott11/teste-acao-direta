CREATE TABLE users (
    id bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    password varchar(61) NOT NULL
);

CREATE TABLE admins (
    id bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    password varchar(61) NOT NULL
);

CREATE TABLE points (
    id bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id bigint(20) NOT NULL,
    is_entrance boolean NOT NULL DEFAULT true,
    hour datetime NOT NULL DEFAULT now()
);
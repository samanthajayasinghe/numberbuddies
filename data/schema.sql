create database numberbuddy;

  CREATE TABLE number_buddy (
    id BIGINT UNSIGNED AUTO_INCREMENT,
    number_value BIGINT UNSIGNED NOT NULL,
    buddy_list LONGTEXT NOT NULL,
    created_at TIMESTAMP NOT NULL,
    PRIMARY KEY(id)
  ) engine=innodb default charset=utf8;

CREATE TABLE user (
  id BIGINT UNSIGNED AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  created_at TIMESTAMP NOT NULL,
  PRIMARY KEY(id)
) engine=innodb default charset=utf8;

CREATE TABLE user_number (
  id BIGINT UNSIGNED AUTO_INCREMENT,
  user_id BIGINT UNSIGNED NOT NULL,
  buddy_id BIGINT UNSIGNED NOT NULL,
  created_at TIMESTAMP NOT NULL,
  PRIMARY KEY(id),
  CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES user(id),
  CONSTRAINT fk_buddy_id FOREIGN KEY (buddy_id) REFERENCES number_buddy(id)
) engine=innodb default charset=utf8;

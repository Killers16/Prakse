-- Tabula: User		        Veids: PAMATTABULA
CREATE TABLE users(
	id_user INT AUTO_INCREMENT PRIMARY KEY,
	fname VARCHAR(40) NOT NULL,
	lname VARCHAR(40) NOT NULL,
	username VARCHAR(40) NOT NULL,
	psw VARCHAR(25) NOT NULL,
	email VARCHAR(100) NOT NULL);


-- Tabula: Category		        Veids: PAMATTABULA
CREATE TABLE act_category(
	id_category INT AUTO_INCREMENT PRIMARY KEY,
	cname VARCHAR(40) NOT NULL);

-- Tabula: Category		        Veids: PAMATTABULA
CREATE TABLE blg_category(
	id_category INT AUTO_INCREMENT PRIMARY KEY,
	cname VARCHAR(40) NOT NULL);

	-- Tabula: Activities		        Veids: ATVASINĀTA TABULA
CREATE TABLE activities(
	id_activities INT AUTO_INCREMENT PRIMARY KEY,
	aname VARCHAR(40) NOT NULL,
	opened_at VARCHAR(40) NOT NULL,
	closed_at VARCHAR(40) NOT NULL,
	content VARCHAR(200) NOT NULL,
	category_id INT,
	picture BLOB,
	FOREIGN KEY (category_id) REFERENCES act_category(id_category) ON UPDATE CASCADE ON DELETE CASCADE);

-- Tabula: Blog		            Veids: ATVASINĀTĀ TABULA (NO PAMATTABULAS)
CREATE TABLE blogs(
	id_blogs INT AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(100) NOT NULL,
	content MEDIUMTEXT NOT NULL,
	picture BLOB,
	created_at TIMESTAMP,
	full_name VARCHAR(50),
	posted_by INT,
	category_id INT,
	FOREIGN KEY (category_id) REFERENCES blg_category(id_category) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (posted_by) REFERENCES users(id_user) ON UPDATE CASCADE ON DELETE CASCADE);








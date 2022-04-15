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

-- Tabula: Category		        Veids: PAMATTABULA
CREATE TABLE doc_category(
	id_category INT AUTO_INCREMENT PRIMARY KEY,
	cname VARCHAR(40) NOT NULL);

-- Tabula: Category		        Veids: PAMATTABULA
CREATE TABLE ent_category(
	id_category INT AUTO_INCREMENT PRIMARY KEY,
	cname VARCHAR(40) NOT NULL);

-- Tabula: Category		        Veids: PAMATTABULA
CREATE TABLE gal_category(
	id_category INT AUTO_INCREMENT PRIMARY KEY,
	cname VARCHAR(40) NOT NULL);

-- Atvasināta tabulas Atvasināta tabulas Atvasināta tabulas Atvasināta tabulas Atvasināta tabulas Atvasināta tabulas Atvasināta tabulas

-- Tabula: Blogs
CREATE TABLE blogs(
	id_blogs INT AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(100) NOT NULL,
	content MEDIUMTEXT NOT NULL,
	picture MEDIUMBLOB,
	created_at TIMESTAMP,
	blog_author VARCHAR(50),
	posted_by INT,
	category_id INT,
	FOREIGN KEY (category_id) REFERENCES blg_category(id_category) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (posted_by) REFERENCES users(id_user) ON UPDATE CASCADE ON DELETE CASCADE);

-- Tabula: Documents
CREATE TABLE documents(
	id_doc INT AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(40) NOT NULL,
	content MEDIUMTEXT NOT NULL,
	created_at TIMESTAMP,
	files MEDIUMBLOB,
	file_type VARCHAR(30),
	file_size INT,
	file_namee VARCHAR(50),
	category_id INT,
	FOREIGN KEY (category_id) REFERENCES doc_category(id_category) ON UPDATE CASCADE ON DELETE CASCADE);

-- Tabula: Events
CREATE TABLE events(
	id_event INT AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(40) NOT NULL,
	content MEDIUMTEXT NOT NULL,
	ent_from TIME,
	ent_to TIME,
	ent_date_start DATE,
	location_name VARCHAR(50),
	location_address VARCHAR(50),
	picture MEDIUMBLOB,
	maps TEXT,
	category_id INT,
	FOREIGN KEY (category_id) REFERENCES ent_category(id_category) ON UPDATE CASCADE ON DELETE CASCADE);

-- Tabula: Activities
	CREATE TABLE activities(
	id_activities INT AUTO_INCREMENT PRIMARY KEY,
	aname VARCHAR(40) NOT NULL,
	content VARCHAR(200) NOT NULL,
	phone VARCHAR(50),
	email VARCHAR(50),
	link VARCHAR(70),
	location_address VARCHAR(100),
	maps TEXT,
	category_id INT,
	picture MEDIUMBLOB,
	FOREIGN KEY (category_id) REFERENCES act_category(id_category) ON UPDATE CASCADE ON DELETE CASCADE);

	-- Tabula: Opening Hours

	CREATE TABLE opening_times (
	open_id INT NOT NULL,
	activities_id INT NOT NULL,
	DoW varchar(128) NOT NULL,
	status enum('Open','Closed') NOT NULL COMMENT '0 is Cosed',
	start_time varchar(128) NOT NULL,
	end_time varchar(128) NOT NULL,
	FOREIGN KEY (activities_id) REFERENCES activities(id_activities) ON UPDATE CASCADE ON DELETE CASCADE);

		-- Tabula: Gallery
CREATE TABLE gallery(
	id_gal INT AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(40) NOT NULL,
	content VARCHAR(200),
	photo_by VARCHAR(50),
	category_id INT,
	FOREIGN KEY (category_id) REFERENCES gal_category(id_category) ON UPDATE CASCADE ON DELETE CASCADE);

	-- Tabula: Images		 
CREATE TABLE img_gal(
	img_id INT AUTO_INCREMENT PRIMARY KEY,
	gal_id INT,
	picture MEDIUMBLOB,
	FOREIGN KEY (gal_id) REFERENCES gallery(id_gal) ON UPDATE CASCADE ON DELETE CASCADE);

	-- Ievietošana Ievietošana Ievietošana Ievietošana Ievietošana Ievietošana Ievietošana Ievietošana Ievietošana Ievietošana
	INSERT INTO blg_category (cname) VALUES ('Svētki');
	INSERT INTO blg_category (cname) VALUES ('Jaunumi');
	INSERT INTO blg_category (cname) VALUES ('Svarīgi');
	INSERT INTO blg_category (cname) VALUES ('Dzīvesveids');
	INSERT INTO blg_category (cname) VALUES ('Aktivitātes');

	INSERT INTO doc_category (cname) VALUES ('Nolikumi');
	INSERT INTO doc_category (cname) VALUES ('Veidlapas');
	INSERT INTO doc_category (cname) VALUES ('Zvejniekiem');
	INSERT INTO doc_category (cname) VALUES ('Dažādi');
	INSERT INTO doc_category (cname) VALUES ('Dundagas novada pašvaldības saistošie noteikumi');

	INSERT INTO act_category (cname) VALUES ('Test #1');
	INSERT INTO act_category (cname) VALUES ('Test #2');
	INSERT INTO act_category (cname) VALUES ('Test #3');
	INSERT INTO act_category (cname) VALUES ('Test #4');
	INSERT INTO act_category (cname) VALUES ('Test #5');

	INSERT INTO ent_category (cname) VALUES ('Koncerts');
	INSERT INTO ent_category (cname) VALUES ('Tirdziņš');
	INSERT INTO ent_category (cname) VALUES ('Svētki');
	INSERT INTO ent_category (cname) VALUES ('Balle');
	INSERT INTO ent_category (cname) VALUES ('Dažādi');

	INSERT INTO gal_category (cname) VALUES ('2018.gads');
	INSERT INTO gal_category (cname) VALUES ('2019.gads');
	INSERT INTO gal_category (cname) VALUES ('2020.gads');
	INSERT INTO gal_category (cname) VALUES ('2021.gads');
	INSERT INTO gal_category (cname) VALUES ('2022.gads');









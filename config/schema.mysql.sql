/*
tbl_user schema from yii2-user module
+-------------------+--------------+------+-----+---------+----------------+
| Field             | Type         | Null | Key | Default | Extra          |
+-------------------+--------------+------+-----+---------+----------------+
| id                | int(11)      | NO   | PRI | NULL    | auto_increment |
| username          | varchar(255) | NO   | UNI | NULL    |                |
| email             | varchar(255) | NO   | UNI | NULL    |                |
| password_hash     | varchar(60)  | NO   |     | NULL    |                |
| auth_key          | varchar(32)  | NO   |     | NULL    |                |
| confirmed_at      | int(11)      | YES  |     | NULL    |                |
| unconfirmed_email | varchar(255) | YES  |     | NULL    |                |
| blocked_at        | int(11)      | YES  |     | NULL    |                |
| registration_ip   | varchar(45)  | YES  |     | NULL    |                |
| created_at        | int(11)      | NO   |     | NULL    |                |
| updated_at        | int(11)      | NO   |     | NULL    |                |
| flags             | int(11)      | NO   |     | 0       |                |
+-------------------+--------------+------+-----+---------+----------------+

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_email` (`email`),
  UNIQUE KEY `user_unique_username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1

CREATE TABLE tbl_user
(
  id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(128) NOT NULL,
  last_name VARCHAR(128) NOT NULL,
  username VARCHAR(128) UNIQUE NOT NULL,
  password VARCHAR(512) NOT NULL,
  email VARCHAR(128) UNIQUE NOT NULL,
  create_time TIMESTAMP NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

*/

CREATE TABLE tbl_organization
(
  id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  logo BLOB,
  logo_file_type VARCHAR(32) DEFAULT NULL,
  name VARCHAR(128) UNIQUE NOT NULL,
  website VARCHAR(128),
  description TEXT NOT NULL,
  org_type INTEGER NOT NULL,
  org_type_text VARCHAR(32),
  work_domain INTEGER NOT NULL,
  work_domain_text VARCHAR(32),
  found_date DATE,
  create_time TIMESTAMP NOT NULL,
  user_id INTEGER NOT NULL,
  CONSTRAINT FK_user_organization FOREIGN KEY (user_id) REFERENCES tbl_user (id) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE tbl_organizationWork
(
  org_id INTEGER PRIMARY KEY,
  who TEXT,
  what TEXT,
  why TEXT,
  how TEXT,
  vision TEXT,
  mission TEXT,
  short_term_goals TEXT,
  long_term_goals TEXT,
  CONSTRAINT FK_org_work FOREIGN KEY (org_id) REFERENCES tbl_organization (id) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE tbl_organizationAddress
(
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  org_id INTEGER,
  address1 TEXT NOT NULL,
  address2 TEXT,
  landmark VARCHAR(128) NOT NULL,
  city VARCHAR(128) NOT NULL,
  state VARCHAR(128) NOT NULL,
  country VARCHAR(128) NOT NULL,
  pincode INTEGER NOT NULL,
  latitude DOUBLE(32,16),
  longitude DOUBLE(32,16),
  location Point,
  CONSTRAINT FK_org_address FOREIGN KEY (org_id) REFERENCES tbl_organization (id) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE tbl_userAddress
(
  user_id INTEGER PRIMARY KEY,
  address1 TEXT NOT NULL,
  address2 TEXT,
  landmark VARCHAR(128) NOT NULL,
  city VARCHAR(128) NOT NULL,
  state VARCHAR(128) NOT NULL,
  country VARCHAR(128) NOT NULL,
  pincode INTEGER NOT NULL,
  CONSTRAINT FK_user_address FOREIGN KEY (user_id) REFERENCES tbl_user (id) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE tbl_userProfile
(
  user_id INTEGER PRIMARY KEY,
  imgurl TEXT,
  about TEXT,
  hobbies TEXT,
  skills TEXT,
  languages TEXT,
  birth_date DATE,
  CONSTRAINT FK_user_profile FOREIGN KEY (user_id) REFERENCES tbl_user (id) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE tbl_userWorkExperience
(
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  user_id INTEGER,
  organization VARCHAR(128) NOT NULL,
  position VARCHAR(128) NOT NULL,
  description TEXT,
  location VARCHAR(128) NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE,
  CONSTRAINT FK_user_work FOREIGN KEY (user_id) REFERENCES tbl_user (id) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE tbl_userEducation
(
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  user_id INTEGER,
  institute VARCHAR(128) NOT NULL,
  degree VARCHAR(128) NOT NULL,
  area VARCHAR(128) NOT NULL,
  location VARCHAR(128) NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE,
  CONSTRAINT FK_user_education FOREIGN KEY (user_id) REFERENCES tbl_user (id) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE tbl_job
(
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  user_id INTEGER NOT NULL,
  org_id INTEGER,
  title TEXT NOT NULL,
  description TEXT NOT NULL,
  location TEXT NOT NULL,
  job_type INTEGER,
  employment_type INTEGER,
  work_domain INTEGER,
  required_skills TEXT,
  create_date DATE,
  deadline_date DATE,
  start_date DATE NOT NULL,
  end_date DATE,
  CONSTRAINT FK_user_job FOREIGN KEY (user_id) REFERENCES tbl_user (id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT FK_org_job FOREIGN KEY (org_id) REFERENCES tbl_organization (id) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE tbl_jobContactPerson
(
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  job_id INTEGER NOT NULL,
  name VARCHAR(256) NOT NULL,
  email VARCHAR(256) NOT NULL,
  phone VARCHAR(16) NOT NULL,
  CONSTRAINT FK_job_contact_person FOREIGN KEY (job_id) REFERENCES tbl_job (id) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE tbl_jobApplication
(
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  user_id INTEGER NOT NULL,
  job_id INTEGER NOT NULL,
  create_time TIMESTAMP NOT NULL,
  CONSTRAINT FK_user_job_application FOREIGN KEY (user_id) REFERENCES tbl_user (id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT FK_job_application FOREIGN KEY (job_id) REFERENCES tbl_job (id) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE tbl_lookup
(
  id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(128) NOT NULL,
  code INTEGER NOT NULL,
  type VARCHAR(128) NOT NULL,
  position INTEGER NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tbl_lookup (name, type, code, position) VALUES ('NGO', 'OrganizationType', 1, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Govt. Organization', 'OrganizationType', 2, 2);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('NPO', 'OrganizationType', 3, 3);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Trust', 'OrganizationType', 4, 4);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Society', 'OrganizationType', 5, 5);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('CSR', 'OrganizationType', 6, 6);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('CBO', 'OrganizationType', 7, 7);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Other', 'OrganizationType', 8, 8);

INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Health', 'WorkDomain', 1, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Education', 'WorkDomain', 2, 2);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Environment', 'WorkDomain', 3, 3);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Women', 'WorkDomain', 4, 4);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Community development', 'WorkDomain', 5, 5);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Health and medicine', 'WorkDomain', 6, 6);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Mental health', 'WorkDomain', 7, 7);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Drug abuse', 'WorkDomain', 8, 8);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Oldage', 'WorkDomain', 9, 9);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Orphans', 'WorkDomain', 10, 10);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Blinds', 'WorkDomain', 11, 11);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Widows', 'WorkDomain', 12, 12);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Sex workers', 'WorkDomain', 13, 13);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Other', 'WorkDomain', 14, 14);

INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Any', 'EmploymentType', 0, 0);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Full Time', 'EmploymentType', 1, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Part Time', 'EmploymentType', 2, 2);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Weekend', 'EmploymentType', 3, 3);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Temporary', 'EmploymentType', 4, 4);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Contract', 'EmploymentType', 5, 5);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('One time, few hours', 'EmploymentType', 6, 6);

INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Any', 'JobType', 0, 0);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Education', 'JobType', 1, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Volunteer', 'JobType', 2, 2);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Administration', 'JobType', 3, 3);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Direct social service', 'JobType', 4, 4);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Survey', 'JobType', 5, 5);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Advertising', 'JobType', 6, 6);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Accounting and finance', 'JobType', 7, 7);

INSERT INTO tbl_lookup (name, type, code, position) VALUES ('All', 'SearchType', 10, 10);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Opportunities', 'SearchType', 1, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Organizations', 'SearchType', 2, 2);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('People', 'SearchType', 3, 3);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Events', 'SearchType', 4, 4);

CREATE TABLE IF NOT EXISTS tbl_states (
  state_id int(11) NOT NULL AUTO_INCREMENT,
  country_id int(11) NOT NULL,
  state varchar(30) NOT NULL,
  PRIMARY KEY (state_id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `tbl_states` (`state_id`, `country_id`, `state`) VALUES
(1, 99, 'Andra Pradesh'),
(2, 99, 'Arunachal Pradesh'),
(3, 99, 'Andaman and Nicobar Islands'),
(4, 99, 'Assam'),
(5, 99, 'Bihar'),
(6, 99, 'Chandigarh'),
(7, 99, 'Chhattisgarh'),
(8, 99, 'Dadar and Nagar Haveli'),
(9, 99, 'Daman and Diu'),
(10, 99, 'Delhi'),
(11, 99, 'Goa'),
(12, 99, 'Gujarat'),
(13, 99, 'Haryana'),
(14, 99, 'Himachal Pradesh'),
(15, 99, 'Jammu and Kashmir'),
(16, 99, 'Jharkhand'),
(17, 99, 'Karnataka'),
(18, 99, 'Kerala'),
(19, 99, 'Lakshadeep'),
(20, 99, 'Madya Pradesh'),
(21, 99, 'Maharashtra'),
(22, 99, 'Manipur'),
(23, 99, 'Meghalaya'),
(24, 99, 'Mizoram'),
(25, 99, 'Nagaland'),
(26, 99, 'Orissa'),
(27, 99, 'Pondicherry'),
(28, 99, 'Punjab'),
(29, 99, 'Rajasthan'),
(30, 99, 'Sikkim'),
(31, 99, 'Tamil Nadu'),
(32, 99, 'Tripura'),
(33, 99, 'Uttaranchal'),
(34, 99, 'Uttar Pradesh'),
(35, 99, 'West Bengal');

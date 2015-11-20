CREATE TABLE tbl_countries (
  id int(11) NOT NULL auto_increment,
  country_code varchar(2) NOT NULL default '',
  country_name varchar(100) NOT NULL default '',
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_countries`
-- 
INSERT INTO `tbl_countries` VALUES (1, 'US', 'United States');
INSERT INTO `tbl_countries` VALUES (2, 'CA', 'Canada');
INSERT INTO `tbl_countries` VALUES (3, 'AF', 'Afghanistan');
INSERT INTO `tbl_countries` VALUES (4, 'AL', 'Albania');
INSERT INTO `tbl_countries` VALUES (5, 'DZ', 'Algeria');
INSERT INTO `tbl_countries` VALUES (6, 'DS', 'American Samoa');
INSERT INTO `tbl_countries` VALUES (7, 'AD', 'Andorra');
INSERT INTO `tbl_countries` VALUES (8, 'AO', 'Angola');
INSERT INTO `tbl_countries` VALUES (9, 'AI', 'Anguilla');
INSERT INTO `tbl_countries` VALUES (10, 'AQ', 'Antarctica');
INSERT INTO `tbl_countries` VALUES (11, 'AG', 'Antigua and/or Barbuda');
INSERT INTO `tbl_countries` VALUES (12, 'AR', 'Argentina');
INSERT INTO `tbl_countries` VALUES (13, 'AM', 'Armenia');
INSERT INTO `tbl_countries` VALUES (14, 'AW', 'Aruba');
INSERT INTO `tbl_countries` VALUES (15, 'AU', 'Australia');
INSERT INTO `tbl_countries` VALUES (16, 'AT', 'Austria');
INSERT INTO `tbl_countries` VALUES (17, 'AZ', 'Azerbaijan');
INSERT INTO `tbl_countries` VALUES (18, 'BS', 'Bahamas');
INSERT INTO `tbl_countries` VALUES (19, 'BH', 'Bahrain');
INSERT INTO `tbl_countries` VALUES (20, 'BD', 'Bangladesh');
INSERT INTO `tbl_countries` VALUES (21, 'BB', 'Barbados');
INSERT INTO `tbl_countries` VALUES (22, 'BY', 'Belarus');
INSERT INTO `tbl_countries` VALUES (23, 'BE', 'Belgium');
INSERT INTO `tbl_countries` VALUES (24, 'BZ', 'Belize');
INSERT INTO `tbl_countries` VALUES (25, 'BJ', 'Benin');
INSERT INTO `tbl_countries` VALUES (26, 'BM', 'Bermuda');
INSERT INTO `tbl_countries` VALUES (27, 'BT', 'Bhutan');
INSERT INTO `tbl_countries` VALUES (28, 'BO', 'Bolivia');
INSERT INTO `tbl_countries` VALUES (29, 'BA', 'Bosnia and Herzegovina');
INSERT INTO `tbl_countries` VALUES (30, 'BW', 'Botswana');
INSERT INTO `tbl_countries` VALUES (31, 'BV', 'Bouvet Island');
INSERT INTO `tbl_countries` VALUES (32, 'BR', 'Brazil');
INSERT INTO `tbl_countries` VALUES (33, 'IO', 'British lndian Ocean Territory');
INSERT INTO `tbl_countries` VALUES (34, 'BN', 'Brunei Darussalam');
INSERT INTO `tbl_countries` VALUES (35, 'BG', 'Bulgaria');
INSERT INTO `tbl_countries` VALUES (36, 'BF', 'Burkina Faso');
INSERT INTO `tbl_countries` VALUES (37, 'BI', 'Burundi');
INSERT INTO `tbl_countries` VALUES (38, 'KH', 'Cambodia');
INSERT INTO `tbl_countries` VALUES (39, 'CM', 'Cameroon');
INSERT INTO `tbl_countries` VALUES (40, 'CV', 'Cape Verde');
INSERT INTO `tbl_countries` VALUES (41, 'KY', 'Cayman Islands');
INSERT INTO `tbl_countries` VALUES (42, 'CF', 'Central African Republic');
INSERT INTO `tbl_countries` VALUES (43, 'TD', 'Chad');
INSERT INTO `tbl_countries` VALUES (44, 'CL', 'Chile');
INSERT INTO `tbl_countries` VALUES (45, 'CN', 'China');
INSERT INTO `tbl_countries` VALUES (46, 'CX', 'Christmas Island');
INSERT INTO `tbl_countries` VALUES (47, 'CC', 'Cocos (Keeling) Islands');
INSERT INTO `tbl_countries` VALUES (48, 'CO', 'Colombia');
INSERT INTO `tbl_countries` VALUES (49, 'KM', 'Comoros');
INSERT INTO `tbl_countries` VALUES (50, 'CG', 'Congo');
INSERT INTO `tbl_countries` VALUES (51, 'CK', 'Cook Islands');
INSERT INTO `tbl_countries` VALUES (52, 'CR', 'Costa Rica');
INSERT INTO `tbl_countries` VALUES (53, 'HR', 'Croatia (Hrvatska)');
INSERT INTO `tbl_countries` VALUES (54, 'CU', 'Cuba');
INSERT INTO `tbl_countries` VALUES (55, 'CY', 'Cyprus');
INSERT INTO `tbl_countries` VALUES (56, 'CZ', 'Czech Republic');
INSERT INTO `tbl_countries` VALUES (57, 'DK', 'Denmark');
INSERT INTO `tbl_countries` VALUES (58, 'DJ', 'Djibouti');
INSERT INTO `tbl_countries` VALUES (59, 'DM', 'Dominica');
INSERT INTO `tbl_countries` VALUES (60, 'DO', 'Dominican Republic');
INSERT INTO `tbl_countries` VALUES (61, 'TP', 'East Timor');
INSERT INTO `tbl_countries` VALUES (62, 'EC', 'Ecuador');
INSERT INTO `tbl_countries` VALUES (63, 'EG', 'Egypt');
INSERT INTO `tbl_countries` VALUES (64, 'SV', 'El Salvador');
INSERT INTO `tbl_countries` VALUES (65, 'GQ', 'Equatorial Guinea');
INSERT INTO `tbl_countries` VALUES (66, 'ER', 'Eritrea');
INSERT INTO `tbl_countries` VALUES (67, 'EE', 'Estonia');
INSERT INTO `tbl_countries` VALUES (68, 'ET', 'Ethiopia');
INSERT INTO `tbl_countries` VALUES (69, 'FK', 'Falkland Islands (Malvinas)');
INSERT INTO `tbl_countries` VALUES (70, 'FO', 'Faroe Islands');
INSERT INTO `tbl_countries` VALUES (71, 'FJ', 'Fiji');
INSERT INTO `tbl_countries` VALUES (72, 'FI', 'Finland');
INSERT INTO `tbl_countries` VALUES (73, 'FR', 'France');
INSERT INTO `tbl_countries` VALUES (74, 'FX', 'France, Metropolitan');
INSERT INTO `tbl_countries` VALUES (75, 'GF', 'French Guiana');
INSERT INTO `tbl_countries` VALUES (76, 'PF', 'French Polynesia');
INSERT INTO `tbl_countries` VALUES (77, 'TF', 'French Southern Territories');
INSERT INTO `tbl_countries` VALUES (78, 'GA', 'Gabon');
INSERT INTO `tbl_countries` VALUES (79, 'GM', 'Gambia');
INSERT INTO `tbl_countries` VALUES (80, 'GE', 'Georgia');
INSERT INTO `tbl_countries` VALUES (81, 'DE', 'Germany');
INSERT INTO `tbl_countries` VALUES (82, 'GH', 'Ghana');
INSERT INTO `tbl_countries` VALUES (83, 'GI', 'Gibraltar');
INSERT INTO `tbl_countries` VALUES (84, 'GR', 'Greece');
INSERT INTO `tbl_countries` VALUES (85, 'GL', 'Greenland');
INSERT INTO `tbl_countries` VALUES (86, 'GD', 'Grenada');
INSERT INTO `tbl_countries` VALUES (87, 'GP', 'Guadeloupe');
INSERT INTO `tbl_countries` VALUES (88, 'GU', 'Guam');
INSERT INTO `tbl_countries` VALUES (89, 'GT', 'Guatemala');
INSERT INTO `tbl_countries` VALUES (90, 'GN', 'Guinea');
INSERT INTO `tbl_countries` VALUES (91, 'GW', 'Guinea-Bissau');
INSERT INTO `tbl_countries` VALUES (92, 'GY', 'Guyana');
INSERT INTO `tbl_countries` VALUES (93, 'HT', 'Haiti');
INSERT INTO `tbl_countries` VALUES (94, 'HM', 'Heard and Mc Donald Islands');
INSERT INTO `tbl_countries` VALUES (95, 'HN', 'Honduras');
INSERT INTO `tbl_countries` VALUES (96, 'HK', 'Hong Kong');
INSERT INTO `tbl_countries` VALUES (97, 'HU', 'Hungary');
INSERT INTO `tbl_countries` VALUES (98, 'IS', 'Iceland');
INSERT INTO `tbl_countries` VALUES (99, 'IN', 'India');
INSERT INTO `tbl_countries` VALUES (100, 'ID', 'Indonesia');
INSERT INTO `tbl_countries` VALUES (101, 'IR', 'Iran (Islamic Republic of)');
INSERT INTO `tbl_countries` VALUES (102, 'IQ', 'Iraq');
INSERT INTO `tbl_countries` VALUES (103, 'IE', 'Ireland');
INSERT INTO `tbl_countries` VALUES (104, 'IL', 'Israel');
INSERT INTO `tbl_countries` VALUES (105, 'IT', 'Italy');
INSERT INTO `tbl_countries` VALUES (106, 'CI', 'Ivory Coast');
INSERT INTO `tbl_countries` VALUES (107, 'JM', 'Jamaica');
INSERT INTO `tbl_countries` VALUES (108, 'JP', 'Japan');
INSERT INTO `tbl_countries` VALUES (109, 'JO', 'Jordan');
INSERT INTO `tbl_countries` VALUES (110, 'KZ', 'Kazakhstan');
INSERT INTO `tbl_countries` VALUES (111, 'KE', 'Kenya');
INSERT INTO `tbl_countries` VALUES (112, 'KI', 'Kiribati');
INSERT INTO `tbl_countries` VALUES (113, 'KP', 'Korea, Democratic People''s Republic of');
INSERT INTO `tbl_countries` VALUES (114, 'KR', 'Korea, Republic of');
INSERT INTO `tbl_countries` VALUES (115, 'XK', 'Kosovo');

INSERT INTO `tbl_countries` VALUES (116, 'KW', 'Kuwait');
INSERT INTO `tbl_countries` VALUES (117, 'KG', 'Kyrgyzstan');
INSERT INTO `tbl_countries` VALUES (118, 'LA', 'Lao People''s Democratic Republic');
INSERT INTO `tbl_countries` VALUES (119, 'LV', 'Latvia');
INSERT INTO `tbl_countries` VALUES (120, 'LB', 'Lebanon');
INSERT INTO `tbl_countries` VALUES (121, 'LS', 'Lesotho');
INSERT INTO `tbl_countries` VALUES (122, 'LR', 'Liberia');
INSERT INTO `tbl_countries` VALUES (123, 'LY', 'Libyan Arab Jamahiriya');
INSERT INTO `tbl_countries` VALUES (124, 'LI', 'Liechtenstein');
INSERT INTO `tbl_countries` VALUES (125, 'LT', 'Lithuania');
INSERT INTO `tbl_countries` VALUES (126, 'LU', 'Luxembourg');
INSERT INTO `tbl_countries` VALUES (127, 'MO', 'Macau');
INSERT INTO `tbl_countries` VALUES (128, 'MK', 'Macedonia');
INSERT INTO `tbl_countries` VALUES (129, 'MG', 'Madagascar');
INSERT INTO `tbl_countries` VALUES (130, 'MW', 'Malawi');
INSERT INTO `tbl_countries` VALUES (131, 'MY', 'Malaysia');
INSERT INTO `tbl_countries` VALUES (132, 'MV', 'Maldives');
INSERT INTO `tbl_countries` VALUES (133, 'ML', 'Mali');
INSERT INTO `tbl_countries` VALUES (134, 'MT', 'Malta');
INSERT INTO `tbl_countries` VALUES (135, 'MH', 'Marshall Islands');
INSERT INTO `tbl_countries` VALUES (136, 'MQ', 'Martinique');
INSERT INTO `tbl_countries` VALUES (137, 'MR', 'Mauritania');
INSERT INTO `tbl_countries` VALUES (138, 'MU', 'Mauritius');
INSERT INTO `tbl_countries` VALUES (139, 'TY', 'Mayotte');
INSERT INTO `tbl_countries` VALUES (140, 'MX', 'Mexico');
INSERT INTO `tbl_countries` VALUES (141, 'FM', 'Micronesia, Federated States of');
INSERT INTO `tbl_countries` VALUES (142, 'MD', 'Moldova, Republic of');
INSERT INTO `tbl_countries` VALUES (143, 'MC', 'Monaco');
INSERT INTO `tbl_countries` VALUES (144, 'MN', 'Mongolia');
INSERT INTO `tbl_countries` VALUES (145, 'ME', 'Montenegro');
INSERT INTO `tbl_countries` VALUES (146, 'MS', 'Montserrat');
INSERT INTO `tbl_countries` VALUES (147, 'MA', 'Morocco');
INSERT INTO `tbl_countries` VALUES (148, 'MZ', 'Mozambique');
INSERT INTO `tbl_countries` VALUES (149, 'MM', 'Myanmar');
INSERT INTO `tbl_countries` VALUES (150, 'NA', 'Namibia');
INSERT INTO `tbl_countries` VALUES (151, 'NR', 'Nauru');
INSERT INTO `tbl_countries` VALUES (152, 'NP', 'Nepal');
INSERT INTO `tbl_countries` VALUES (153, 'NL', 'Netherlands');
INSERT INTO `tbl_countries` VALUES (154, 'AN', 'Netherlands Antilles');
INSERT INTO `tbl_countries` VALUES (155, 'NC', 'New Caledonia');
INSERT INTO `tbl_countries` VALUES (156, 'NZ', 'New Zealand');
INSERT INTO `tbl_countries` VALUES (157, 'NI', 'Nicaragua');
INSERT INTO `tbl_countries` VALUES (158, 'NE', 'Niger');
INSERT INTO `tbl_countries` VALUES (159, 'NG', 'Nigeria');
INSERT INTO `tbl_countries` VALUES (160, 'NU', 'Niue');
INSERT INTO `tbl_countries` VALUES (161, 'NF', 'Norfork Island');
INSERT INTO `tbl_countries` VALUES (162, 'MP', 'Northern Mariana Islands');
INSERT INTO `tbl_countries` VALUES (163, 'NO', 'Norway');
INSERT INTO `tbl_countries` VALUES (164, 'OM', 'Oman');
INSERT INTO `tbl_countries` VALUES (165, 'PK', 'Pakistan');
INSERT INTO `tbl_countries` VALUES (166, 'PW', 'Palau');
INSERT INTO `tbl_countries` VALUES (167, 'PA', 'Panama');
INSERT INTO `tbl_countries` VALUES (168, 'PG', 'Papua New Guinea');
INSERT INTO `tbl_countries` VALUES (169, 'PY', 'Paraguay');
INSERT INTO `tbl_countries` VALUES (170, 'PE', 'Peru');
INSERT INTO `tbl_countries` VALUES (171, 'PH', 'Philippines');
INSERT INTO `tbl_countries` VALUES (172, 'PN', 'Pitcairn');
INSERT INTO `tbl_countries` VALUES (173, 'PL', 'Poland');
INSERT INTO `tbl_countries` VALUES (174, 'PT', 'Portugal');
INSERT INTO `tbl_countries` VALUES (175, 'PR', 'Puerto Rico');
INSERT INTO `tbl_countries` VALUES (176, 'QA', 'Qatar');
INSERT INTO `tbl_countries` VALUES (177, 'RE', 'Reunion');
INSERT INTO `tbl_countries` VALUES (178, 'RO', 'Romania');
INSERT INTO `tbl_countries` VALUES (179, 'RU', 'Russian Federation');
INSERT INTO `tbl_countries` VALUES (180, 'RW', 'Rwanda');
INSERT INTO `tbl_countries` VALUES (181, 'KN', 'Saint Kitts and Nevis');
INSERT INTO `tbl_countries` VALUES (182, 'LC', 'Saint Lucia');
INSERT INTO `tbl_countries` VALUES (183, 'VC', 'Saint Vincent and the Grenadines');
INSERT INTO `tbl_countries` VALUES (184, 'WS', 'Samoa');
INSERT INTO `tbl_countries` VALUES (185, 'SM', 'San Marino');
INSERT INTO `tbl_countries` VALUES (186, 'ST', 'Sao Tome and Principe');
INSERT INTO `tbl_countries` VALUES (187, 'SA', 'Saudi Arabia');
INSERT INTO `tbl_countries` VALUES (188, 'SN', 'Senegal');
INSERT INTO `tbl_countries` VALUES (189, 'RS', 'Serbia');
INSERT INTO `tbl_countries` VALUES (190, 'SC', 'Seychelles');
INSERT INTO `tbl_countries` VALUES (191, 'SL', 'Sierra Leone');
INSERT INTO `tbl_countries` VALUES (192, 'SG', 'Singapore');
INSERT INTO `tbl_countries` VALUES (193, 'SK', 'Slovakia');
INSERT INTO `tbl_countries` VALUES (194, 'SI', 'Slovenia');
INSERT INTO `tbl_countries` VALUES (195, 'SB', 'Solomon Islands');
INSERT INTO `tbl_countries` VALUES (196, 'SO', 'Somalia');
INSERT INTO `tbl_countries` VALUES (197, 'ZA', 'South Africa');
INSERT INTO `tbl_countries` VALUES (198, 'GS', 'South Georgia South Sandwich Islands');
INSERT INTO `tbl_countries` VALUES (199, 'ES', 'Spain');
INSERT INTO `tbl_countries` VALUES (200, 'LK', 'Sri Lanka');
INSERT INTO `tbl_countries` VALUES (201, 'SH', 'St. Helena');
INSERT INTO `tbl_countries` VALUES (202, 'PM', 'St. Pierre and Miquelon');
INSERT INTO `tbl_countries` VALUES (203, 'SD', 'Sudan');
INSERT INTO `tbl_countries` VALUES (204, 'SR', 'Suriname');
INSERT INTO `tbl_countries` VALUES (205, 'SJ', 'Svalbarn and Jan Mayen Islands');
INSERT INTO `tbl_countries` VALUES (206, 'SZ', 'Swaziland');
INSERT INTO `tbl_countries` VALUES (207, 'SE', 'Sweden');
INSERT INTO `tbl_countries` VALUES (208, 'CH', 'Switzerland');
INSERT INTO `tbl_countries` VALUES (209, 'SY', 'Syrian Arab Republic');
INSERT INTO `tbl_countries` VALUES (210, 'TW', 'Taiwan');
INSERT INTO `tbl_countries` VALUES (211, 'TJ', 'Tajikistan');
INSERT INTO `tbl_countries` VALUES (212, 'TZ', 'Tanzania, United Republic of');
INSERT INTO `tbl_countries` VALUES (213, 'TH', 'Thailand');
INSERT INTO `tbl_countries` VALUES (214, 'TG', 'Togo');
INSERT INTO `tbl_countries` VALUES (215, 'TK', 'Tokelau');
INSERT INTO `tbl_countries` VALUES (216, 'TO', 'Tonga');
INSERT INTO `tbl_countries` VALUES (217, 'TT', 'Trinidad and Tobago');
INSERT INTO `tbl_countries` VALUES (218, 'TN', 'Tunisia');
INSERT INTO `tbl_countries` VALUES (219, 'TR', 'Turkey');
INSERT INTO `tbl_countries` VALUES (220, 'TM', 'Turkmenistan');
INSERT INTO `tbl_countries` VALUES (221, 'TC', 'Turks and Caicos Islands');
INSERT INTO `tbl_countries` VALUES (222, 'TV', 'Tuvalu');
INSERT INTO `tbl_countries` VALUES (223, 'UG', 'Uganda');
INSERT INTO `tbl_countries` VALUES (224, 'UA', 'Ukraine');
INSERT INTO `tbl_countries` VALUES (225, 'AE', 'United Arab Emirates');
INSERT INTO `tbl_countries` VALUES (226, 'GB', 'United Kingdom');
INSERT INTO `tbl_countries` VALUES (227, 'UM', 'United States minor outlying islands');
INSERT INTO `tbl_countries` VALUES (228, 'UY', 'Uruguay');
INSERT INTO `tbl_countries` VALUES (229, 'UZ', 'Uzbekistan');
INSERT INTO `tbl_countries` VALUES (230, 'VU', 'Vanuatu');
INSERT INTO `tbl_countries` VALUES (231, 'VA', 'Vatican City State');
INSERT INTO `tbl_countries` VALUES (232, 'VE', 'Venezuela');
INSERT INTO `tbl_countries` VALUES (233, 'VN', 'Vietnam');
INSERT INTO `tbl_countries` VALUES (234, 'VG', 'Virgin Islands (British)');
INSERT INTO `tbl_countries` VALUES (235, 'VI', 'Virgin Islands (U.S.)');
INSERT INTO `tbl_countries` VALUES (236, 'WF', 'Wallis and Futuna Islands');
INSERT INTO `tbl_countries` VALUES (237, 'EH', 'Western Sahara');
INSERT INTO `tbl_countries` VALUES (238, 'YE', 'Yemen');
INSERT INTO `tbl_countries` VALUES (239, 'YU', 'Yugoslavia');
INSERT INTO `tbl_countries` VALUES (240, 'ZR', 'Zaire');
INSERT INTO `tbl_countries` VALUES (241, 'ZM', 'Zambia');
INSERT INTO `tbl_countries` VALUES (242, 'ZW', 'Zimbabwe');
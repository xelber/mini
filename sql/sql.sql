CREATE DATABASE classification;

USE classification;

DROP TABLE IF EXISTS standard_user_fields;
CREATE TABLE IF NOT EXISTS standard_user_fields(
    field_id INT NOT NULL AUTO_INCREMENT,
    status TINYINT NOT NULL,
    description VARCHAR(20) NOT NULL,
    field_type VARCHAR(20) NOT NULL,
    mandatory TINYINT NOT NULL,
    PRIMARY KEY (field_id),
    INDEX i_status(status)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS user_details;
CREATE TABLE IF NOT EXISTS user_details (
    user_id INT NOT NULL,
    field_id INT NOT NULL,
    value VARCHAR(200),
	
    INDEX i_field_id(field_id),
    PRIMARY KEY (user_id,field_id),
    FOREIGN KEY (field_id)
        REFERENCES standard_user_fields(field_id)
        ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

INSERT INTO standard_user_fields(field_id, status,description,field_type,mandatory) VALUES
(1, 1, 'Name','STRING', 1),
(2, 1, 'Address','STRING', 1),
(3, 1, 'Date of Birth','DATE', 1),
(4, 1, 'Cell Number','STRING', 0),
(5, 0, 'Subject','STRING', 0),
(6, 0, 'Check','STRING', 0),
(7, 1, 'Marks','NUMERIC', 0)
;

INSERT INTO user_details(user_id, field_id,value) VALUES
(1, 1, 'Nick'),
(1, 2, '365 Liverpool Street, Darlinghurst'),
(1, 3, '09/12/1985'),
(1, 4, '12455623'),
(2, 1, 'Guy'),
(2, 2, '81, St Aubyns, Hove'),
(2, 3, '09/12/1981'),
(3, 1, 'Mike'),
(3, 2, '76, Brunswick'),
(3, 3, '06/13/1975'),
(3, 4, '456324')
;
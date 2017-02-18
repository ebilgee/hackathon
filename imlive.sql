
CREATE TABLE user_pictures (
                user_picture_id BIGINT AUTO_INCREMENT NOT NULL,
                user_picture_time DATETIME NOT NULL,
                user_id BIGINT NOT NULL,
                location_id BIGINT NOT NULL,
                PRIMARY KEY (user_picture_id)
);


CREATE TABLE payment_status (
                payment_status_id INT AUTO_INCREMENT NOT NULL,
                payment_status VARCHAR(200) NOT NULL,
                PRIMARY KEY (payment_status_id)
);


CREATE TABLE location_status (
                location_status_id INT NOT NULL,
                location_status VARCHAR(100) NOT NULL,
                PRIMARY KEY (location_status_id)
);


CREATE TABLE locations (
                location_id BIGINT AUTO_INCREMENT NOT NULL,
                location_status_id INT NOT NULL,
                location_name VARCHAR(40) NOT NULL,
                location_latitude VARCHAR(20) NOT NULL,
                location_longtitude VARCHAR(20) NOT NULL,
                location_description VARCHAR(255) NOT NULL,
                location_image VARCHAR(255) NOT NULL,
                is_featured BOOLEAN NOT NULL,
                location_added TIMESTAMP NOT NULL,
                location_live_address VARCHAR(100) NOT NULL,
                PRIMARY KEY (location_id)
);


CREATE TABLE users (
                user_id BIGINT AUTO_INCREMENT NOT NULL,
                user_name VARCHAR(60) NOT NULL,
                user_primary_email VARCHAR(40) NOT NULL,
                user_birthday DATE,
                user_profile_picture VARCHAR(100),
                user_bio VARCHAR(255),
                user_country_id VARCHAR(3),
                PRIMARY KEY (user_id)
);


CREATE TABLE payments (
                payment_id BIGINT AUTO_INCREMENT NOT NULL,
                payment_status_id INT NOT NULL,
                user_id BIGINT NOT NULL,
                payment_time DATETIME NOT NULL,
                payment_amount DOUBLE NOT NULL,
                payment_note VARCHAR(200),
                PRIMARY KEY (payment_id)
);


CREATE TABLE Recordings (
                recording_id BIGINT AUTO_INCREMENT NOT NULL,
                location_id BIGINT NOT NULL,
                user_id BIGINT NOT NULL,
                recording_location VARCHAR(100) NOT NULL,
                recording_duration DOUBLE,
                recording_name VARCHAR(100),
                PRIMARY KEY (recording_id)
);


CREATE TABLE user_locations (
                user_location_id BIGINT AUTO_INCREMENT NOT NULL,
                location_id BIGINT NOT NULL,
                user_id BIGINT NOT NULL,
                location_visited DATETIME NOT NULL,
                PRIMARY KEY (user_location_id)
);


CREATE TABLE logins (
                login_id BIGINT AUTO_INCREMENT NOT NULL,
                user_id BIGINT NOT NULL,
                login_twitter VARCHAR(255),
                login_facebook VARCHAR(100),
                login_linkedin VARCHAR(100),
                login_password VARCHAR(100),
                login_email VARCHAR(100) NOT NULL,
                PRIMARY KEY (login_id)
);


ALTER TABLE payments ADD CONSTRAINT payment_status_payments_fk
FOREIGN KEY (payment_status_id)
REFERENCES payment_status (payment_status_id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE locations ADD CONSTRAINT location_status_locations_fk
FOREIGN KEY (location_status_id)
REFERENCES location_status (location_status_id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE user_locations ADD CONSTRAINT locations_user_locations_fk
FOREIGN KEY (location_id)
REFERENCES locations (location_id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Recordings ADD CONSTRAINT locations_recordings_fk
FOREIGN KEY (location_id)
REFERENCES locations (location_id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE logins ADD CONSTRAINT users_logins_fk
FOREIGN KEY (user_id)
REFERENCES users (user_id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE user_locations ADD CONSTRAINT users_user_locations_fk
FOREIGN KEY (user_id)
REFERENCES users (user_id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Recordings ADD CONSTRAINT users_recordings_fk
FOREIGN KEY (user_id)
REFERENCES users (user_id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE payments ADD CONSTRAINT users_payments_fk
FOREIGN KEY (user_id)
REFERENCES users (user_id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;
create database tSupport;
use tSupport;



/*======================= CREATING TABLES ===================================================*/



CREATE TABLE loan (
    loan_id int auto_increment not null,
    loan_purpose VARCHAR(32),
    loan_location VARCHAR(32),
    loan_tsr_setup VARCHAR(32),
    loan_tsr_pickup VARCHAR(32),
    loan_borrower VARCHAR(32),
    loan_status VARCHAR(32),
    date_created timestamp,
    PRIMARY KEY(loan_id)
  );
  
CREATE TABLE room (
    room_id int auto_increment not null,
    room_name VARCHAR(32),
    room_status VARCHAR(32),
    room_description VARCHAR(64),
    date_created timestamp,
    PRIMARY KEY(room_id)
  );

  
CREATE TABLE setEquip (
    id int auto_increment not null,
    loan_id int,
    eqp_name VARCHAR(32),
    eqp_status VARCHAR(32),
    area_last_used VARCHAR(32),
    eqp_quantity VARCHAR(32),
    eqp_serialno VARCHAR(32),
    eqp_description VARCHAR(400),
    date_last_used timestamp, 
    PRIMARY KEY(id)
  );
  
 CREATE TABLE user (
    id int auto_increment not null,
    username VARCHAR(32),
    tsr_name VARCHAR(32),
    level VARCHAR(32),
    password VARCHAR(400),
    PRIMARY KEY(id)
  );

  CREATE TABLE inventory (
    id int auto_increment not null,
    item_name VARCHAR(32),
    item_type VARCHAR(32),
    item_status VARCHAR(32),
    item_location VARCHAR(32),
    item_modelno VARCHAR(32),
    item_serialno VARCHAR(32),
    item_description VARCHAR(400),
    last_updated_by VARCHAR(32),
    PRIMARY KEY(id)
  );
  
INSERT INTO user (username,tsr_name,level,password) values('admin@admin.com','Steven Facey','0','admin1234567');
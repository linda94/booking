DROP SCHEMA IF EXISTS mydb;
CREATE SCHEMA mydb;
USE mydb;

CREATE TABLE User (
    UserID INT NOT NULL,
    FirstName VARCHAR(60) NOT NULL,
    LastName VARCHAR(45) NOT NULL,
    Company VARCHAR(50) NOT NULL,
    Phone VARCHAR(45) NOT NULL,
    Email VARCHAR(45) NOT NULL,
    Passwordd VARCHAR(45) NOT NULL,
    Description VARCHAR(500) NOT NULL,
    AccessLevel INT NOT NULL,
    PRIMARY KEY (UserID)
)  ENGINE=INNODB;


CREATE TABLE Location (
    LocID INT NOT NULL,
    LocName VARCHAR(45) NULL,
    PRIMARY KEY (LocID)
)  ENGINE=INNODB;


CREATE TABLE Room (
    RoomID INT NOT NULL,
    RoomName VARCHAR(45) NULL,
    Capacity INT NULL,
    Floor INT NULL,
    Location_LocID INT NOT NULL,
    Privacy VARCHAR(45) NULL,
    PRIMARY KEY (RoomID),
    CONSTRAINT fk_Rooms_Location FOREIGN KEY (Location_LocID)
        REFERENCES Location (LocID)
)  ENGINE=INNODB;


CREATE TABLE Reservation (
    ResID INT NOT NULL,
    ResDate DATE NULL,
    ResTime TIME NULL,
    DepDate DATE NULL,
    DepTime TIME NULL,
    User_UserID INT NOT NULL,
    Room_RoomID INT NOT NULL,
    Description VARCHAR(200) NULL,
    PRIMARY KEY (ResID),
    CONSTRAINT fk_Reservations_User FOREIGN KEY (User_UserID)
        REFERENCES User (UserID),
    CONSTRAINT fk_Reservation_Room FOREIGN KEY (Room_RoomID)
        REFERENCES Room (RoomID)
)  ENGINE=INNODB;


CREATE TABLE User_has_Room (
    User_UserID INT NOT NULL,
    Room_RoomID INT NOT NULL,
    PRIMARY KEY (User_UserID , Room_RoomID),
    CONSTRAINT fk_User_has_Room_Users FOREIGN KEY (User_UserID)
        REFERENCES User (UserID),
    CONSTRAINT fk_User_has_Room_Room FOREIGN KEY (Room_RoomID)
        REFERENCES Room (RoomID)
)  ENGINE=INNODB;



CREATE TABLE User_has_Location (
    User_UserID INT NOT NULL,
    Location_LocID INT NOT NULL,
    PRIMARY KEY (User_UserID , Location_LocID),
    CONSTRAINT fk_User_has_Location_users FOREIGN KEY (User_UserID)
        REFERENCES User (UserID),
    CONSTRAINT fk_User_has_Location_Location FOREIGN KEY (Location_LocID)
        REFERENCES Location (LocID)
)  ENGINE=INNODB;


CREATE TABLE Labels (
    LabelID INT NOT NULL,
    LabelName VARCHAR(45) NULL,
    PRIMARY KEY (LabelID)
)  ENGINE=INNODB;


CREATE TABLE Label_has_Room (
    Label_LabelID INT NOT NULL,
    Room_RoomID INT NOT NULL,
    PRIMARY KEY (Label_labelID , Room_RoomID),
    CONSTRAINT fk_Label_has_room_Labels FOREIGN KEY (Label_labelID)
        REFERENCES Labels (labelID),
    CONSTRAINT fk_Label_has_Room_Room FOREIGN KEY (Room_RoomID)
        REFERENCES Room (RoomID)
)  ENGINE=INNODB; 




/*
	Insert User
*/
INSERT INTO User (UserID, FirstName , LastName , Company , Phone, Email, Passwordd, Description, AccessLevel)
VALUES(0, 'Ole', 'Aarsnes', 'UIA', '90238866', 'olea14student@uia.no', 'sandfolk',  'Bacprosjekt', 2);

INSERT INTO User (UserID, FirstName , LastName , Company , Phone, Email, Passwordd, Description, AccessLevel)
VALUES(1, 'Stanley', 'Ntiamoah', 'UIA', '93445532', 'syntia14student@uia.no', 'Lekenhet',  'Bacprosjekt', 1);

/*
   Insert Location
*/
INSERT INTO Location (LocID, LocName)
VALUES(5,'Markens gate 8');

INSERT INTO Location (LocID, LocName)
VALUES(2,'Sørlandsturnet 35');

/*
   Insert Room 
*/
INSERT INTO Room (RoomID, RoomName, Capacity, Floor, Location, Privacy)
VALUES(1, 'Big Screen Room', 20, 1, 'Markens gate 8', 'Ingen');

INSERT INTO Room (RoomID, RoomName, Capacity, Floor, Location, Privacy)
VALUES(2, 'Small Room', 6, 3, 'Markens gate 8', 'Ingen');
/*
   Insert Reservation  
*/
INSERT INTO Reservation (ResID , ResDate, ResTime, DepDate, DepTime , User_UserID, Room_RoomID, Description)
VALUES(0, '2017-03-24', '14.00', '2017-03-25', '16.00', 0, 2, 'asdadaalsalklsadada');

INSERT INTO Reservation (ResID , ResDate, ResTime, DepDate, DepTime , User_UserID, Room_RoomID, Description)
VALUES(1, '2017-02-24', '14.00', '2017-03-25', '16.00', 1, 1, 'Allah is Great the terrorist');

/*
   Insert User_has_Room  
*/
INSERT INTO User_has_Room (User_UserID , Room_RoomID)
VALUES(0, 2);

INSERT INTO User_has_Room (User_UserID , Room_RoomID)
VALUES(1, 1);
/*
   Insert User_has_Location  
*/
INSERT INTO User_has_Location (User_UserID , Location_LocID)
VALUES(0, 5);

INSERT INTO User_has_Location (User_UserID , Location_LocID)
VALUES(1, 5);
/*
   Insert Labels 
*/
INSERT INTO Labels (LabelID, LabelName)
VALUES(2,'Rom m/ stor skjerm');

INSERT INTO Labels (LabelID, LabelName)
VALUES(3,'Rom uten skjerm');

/*
  Insert Label_has_Room 
*/
INSERT INTO Label_has_Room (Label_LabelID, Room_RoomID)
VALUES(2, 1);

INSERT INTO Label_has_Room (Label_LabelID, Room_RoomID)
VALUES(3, 0);


Create Database EventitcketingSystem;
USE EventitcketingSystem;
CREATE TABLE User_Registration(
    UserID VARCHAR(17) PRIMARY KEY NOT NULL,
    firstName VARCHAR(15) NOT NULL,
    lastName VARCHAR(15) NOT NULL,
    Address VARCHAR(50) NOT NULL,
    City VARCHAR(15) NOT NULL,
    State VARCHAR(2) NOT NULL,
    ZipCode INT NOT NULL,
    Phone_number VARCHAR(15) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Password VARCHAR(255) NOT NULL -- Password column added
);

INSERT INTO User_Registration 
VALUES
("USR12345678900001", "Greg", "Mortis", "123 Oakwood Drive", "Springfield", "IL", 32904, "923-013-8743", "Mgreg@outlook.com", "Hashbr0wns"),
("USR12345678900002", "Tiffany", "Chu", "456 Maple Avenue", "Boulder", "CO", 12394, "654-238-9182", "Chutiff@gmail.com", "Purrf3c7"),
("USR12345678900003", "Ultz", "Dimitry", "789 Pine Street", "Austin", "TX", 84393, "033-129-3289", "Dimitry789@gmail.com", "D0r0thy"),
("USR12345678900004", "Terry", "McDonald", "101 Elm Court", "Portland", "OR", 23012, "984-843-2389", "Mcterry@yahoo.com", "T3RRterry");

CREATE TABLE ticketingEvent(
    eventID VARCHAR(17) PRIMARY KEY NOT NULL,
    eventName VARCHAR(30) NOT NULL,
    eventType VARCHAR(10) NOT NULL,
    Address VARCHAR(50) NOT NULL,
    City VARCHAR(50) NOT NULL,
    State VARCHAR(2) NOT NULL,
    ZipCode INT NOT NULL,
    Phone_Number VARCHAR(11),
    Email VARCHAR(50)
);

INSERT INTO ticketingEvent 
VALUES
('EVT12345678900001', 'Spring Gala', 'Formal', '123 Oakwood Drive', 'Springfield', 'IL', 62704, '2175551234', 'springgala@example.com'),
('EVT12345678900002', 'PurrExpo', 'Expo', '456 Innovation Lane', 'San Jose', 'CA', 95113, '4085555678', 'purrexpo@example.com'),
('EVT12345678900003', 'RetroFest', 'Music', '789 Pine Street', 'Austin', 'TX', 78701, '5125557890', 'retrofest@example.com'),
('EVT12345678900004', 'GoodEats', 'Fair', '101 Market Blvd', 'Seattle', 'WA', 98101, NULL, NULL);

CREATE TABLE Transactions(
    TransactionId VARCHAR(17) PRIMARY KEY NOT NULL,
    TicketsSold INT NOT NULL,
    totalPayment DECIMAL(7,2) NOT NULL,
    paymentType VARCHAR(20) NOT NULL,
    bookingDate DATE NOT NULL,
    bookingTime TIME NOT NULL
);

INSERT INTO Transactions 
VALUES
("TXN12345678900001", 3, 300.00, "Credit Card", "2018-06-12", "13:20:39"),
("TXN12345678900002", 1, 100.00, "Cash", "2018-05-23", "17:40:20"),
("TXN12345678900003", 2, 200.00, "Cash", "2018-06-15", "02:49:10"),
("TXN12345678900004", 2, 200.00, "Cash", "2018-06-15", "11:20:01");

CREATE TABLE Reservations(
    ResID VARCHAR(17) PRIMARY KEY NOT NULL,
    TimeofRes TIME NOT NULL,
    DateofRes DATE NOT NULL,
    UserID VARCHAR(17),
    eventID VARCHAR(17),
    TransactionID VARCHAR(17),
    FOREIGN KEY (UserID) REFERENCES User_Registration(UserID),
    FOREIGN KEY (eventID) REFERENCES ticketingEvent(eventID),
    FOREIGN KEY (TransactionID) REFERENCES Transactions(TransactionId)
);

INSERT INTO Reservations 
VALUES
("RES12345678900001", "13:20:39", "2018-06-12", "USR12345678900001", "EVT12345678900001", "TXN12345678900001"),
("RES12345678900002", "17:40:20", "2018-05-23", "USR12345678900002", "EVT12345678900002", "TXN12345678900002"),
("RES12345678900003", "02:49:10", "2018-06-15", "USR12345678900003", "EVT12345678900003", "TXN12345678900003"),
("RES12345678900004", "11:20:01", "2018-06-15", "USR12345678900004", "EVT12345678900004", "TXN12345678900004");

ALTER TABLE User_Registration
ADD ResID VARCHAR(17),
ADD FOREIGN KEY (ResID) REFERENCES Reservations(ResID);
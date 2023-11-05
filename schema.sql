DROP DATABASE `final_exam_db`;
CREATE DATABASE IF NOT EXISTS `final_exam_db`;
USE `final_exam_db`;

CREATE TABLE IF NOT EXISTS `account` (
                                         `accountID` INT PRIMARY KEY AUTO_INCREMENT,
                                         `username` VARCHAR(256) UNIQUE,
                                         `password` VARCHAR(256)
);

CREATE TABLE IF NOT EXISTS `photo` (
                                       `photoID` INT PRIMARY KEY AUTO_INCREMENT,
                                       `data` VARCHAR(1024)
);

CREATE TABLE IF NOT EXISTS `account_photo` (
                                               `accountID` INT,
                                               `photoID` INT,
                                               FOREIGN KEY (`photoID`) REFERENCES `photo` (`photoID`),
                                               FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`)
);

-- Ideally, this should be an S3 URL or any CDN URL instead. More secure this way.
INSERT INTO `account` (`accountID`, `username`, `password`) VALUES (1, "tom", "Cat");
INSERT INTO `photo` (`photoID`, `data`) VALUES (1, "/user-data/photos/tom.png");
INSERT INTO `account_photo` (`accountID`, `photoID`) VALUES (1, 1);

INSERT INTO `account` (`accountID`, `username`, `password`) VALUES (2, "jerry", "Fastmouse");
INSERT INTO `photo` (`photoID`, `data`) VALUES (2, "/user-data/photos/jerry.png");
INSERT INTO `account_photo` (`accountID`, `photoID`) VALUES (2, 2);

INSERT INTO `account` (`accountID`, `username`, `password`) VALUES (3, "spike", "Angrydog");
INSERT INTO `photo` (`photoID`, `data`) VALUES (3, "/user-data/photos/spike.png");
INSERT INTO `account_photo` (`accountID`, `photoID`) VALUES (3, 3);

SELECT `photo`.`photoID` AS `photoID`, `data` FROM `photo` INNER JOIN `account_photo` ON `account_photo`.`photoID` = `photo`.`photoID` WHERE `account_photo`.`accountID` = 1;
-- Run below queries to setup mysql database
CREATE DATABASE votingdb;
USE votingdb;


DROP TABLE IF EXISTS elections;
CREATE TABLE `elections` (
    `eid` int NOT NULL AUTO_INCREMENT,
    `title` varchar(30) DEFAULT NULL,
    `starttime` datetime DEFAULT NULL,
    `endtime` datetime DEFAULT NULL,
    `descriptionelection` varchar(1000) DEFAULT NULL,
    PRIMARY KEY (`eid`)
) ENGINE = InnoDB AUTO_INCREMENT = 5 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS users;
CREATE TABLE `users` (
    `enrollid` varchar(15) NOT NULL,
    `name` varchar(20) NOT NULL,
    `birthdate` date NOT NULL,
    `mobile` varchar(11) DEFAULT NULL,
    `email` varchar(30) DEFAULT NULL,
    `course` varchar(10) NOT NULL,
    `batchyear` int NOT NULL,
    `gender` varchar(1) NOT NULL,
    `cgpa` decimal(4, 2) DEFAULT NULL,
    `password` varchar(45) NOT NULL,
    PRIMARY KEY (`enrollid`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS candidates;
CREATE TABLE `candidates` (
    `cid` varchar(15) NOT NULL,
    `eid` int NOT NULL,
    `isselected` bit(1) NOT NULL,
    PRIMARY KEY (`cid`, `eid`),
    KEY `fkIdx_110` (`cid`),
    KEY `fkIdx_114` (`eid`),
    CONSTRAINT `FK_109` FOREIGN KEY (`cid`) REFERENCES `users` (`enrollid`),
    CONSTRAINT `FK_113` FOREIGN KEY (`eid`) REFERENCES `elections` (`eid`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS votes;
CREATE TABLE `votes` (
    `cid` varchar(15) NOT NULL,
    `eid` int NOT NULL,
    `enrollid` varchar(15) NOT NULL,
    PRIMARY KEY (`eid`, `enrollid`),
    KEY `fkIdx_117` (`eid`),
    KEY `fkIdx_123` (`enrollid`),
    CONSTRAINT `FK_116` FOREIGN KEY (`eid`) REFERENCES `elections` (`eid`),
    CONSTRAINT `FK_122` FOREIGN KEY (`enrollid`) REFERENCES `users` (`enrollid`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS admincontrol;
CREATE TABLE `admincontrol` (
    `password` varchar(45) NOT NULL,
    `display_result` bit(1) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;
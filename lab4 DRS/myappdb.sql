CREATE DATABASE IF NOT EXISTS myappdb;

USE myappdb;

CREATE TABLE IF NOT EXISTS documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    document_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    date_created DATE NOT NULL
);
CREATE TABLE RoutingRules (
    RuleID INT AUTO_INCREMENT PRIMARY KEY,
    RuleName VARCHAR(255) NOT NULL,
    Criteria VARCHAR(255) NOT NULL,
    Action VARCHAR(255) NOT NULL
);
CREATE TABLE Workflow (
    WorkflowID INT AUTO_INCREMENT PRIMARY KEY,
    WorkflowName VARCHAR(255) NOT NULL,
    CurrentStage VARCHAR(255) NOT NULL,
    NextStage VARCHAR(255) NOT NULL
);
CREATE TABLE Department (
    DepartmentID INT NOT NULL,
    DepartmentName VARCHAR(255) NOT NULL
);

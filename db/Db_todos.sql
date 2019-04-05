
CREATE DATABASE todos ;
USE todos;

CREATE TABLE todo (
	todo_id INT UNSIGNED AUTO_INCREMENT,
	todo_task VARCHAR(50) NOT NULL,
	todo_url VARCHAR(255) NOT NULL,
	todo_category VARCHAR (50) NOT NULL,
  todo_priority VARCHAR(50) NOT NULL,
	todo_status VARCHAR(50) NOT NULL,
	PRIMARY KEY(todo_id)
) DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
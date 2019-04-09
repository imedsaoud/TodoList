
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


INSERT INTO `todo` (`todo_task`, `todo_url`, `todo_category`, `todo_priority`,`todo_status`) VALUES
('Logique formulaire', 'https://github.com/imedsaoud/FightBlog', 'PSR', 'High','Todo');


INSERT INTO `todo` (`todo_task`, `todo_url`, `todo_category`, `todo_priority`,`todo_status`) VALUES
('Amelioration chemin', 'https://github.com/imedsaoud/Routeur', 'Maths', 'Low','Need Review');

CREATE DATABASE todos ;
USE todos;

CREATE TABLE todo (
	id INT UNSIGNED AUTO_INCREMENT,
	task VARCHAR(50) NOT NULL,
	url VARCHAR(255) NOT NULL,
	category VARCHAR (50) NOT NULL,
  priority VARCHAR(50) NOT NULL,
	status VARCHAR(50) NOT NULL,
	PRIMARY KEY(id)
) DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `todo` (`task`, `url`, `category`, `priority`,`status`) VALUES
('Logique formulaire', 'https://github.com/imedsaoud/FightBlog', 'PSR', 'High','Todo');


INSERT INTO `todo` (`task`, `url`, `category`, `priority`,`status`) VALUES
('Amelioration chemin', 'https://github.com/imedsaoud/Routeur', 'Maths', 'Low','Need Review');

INSERT INTO `todo` (`task`, `url`, `category`, `priority`,`status`) VALUES
('Pattern update', 'https://github.com/imedsaoud/Routeur', 'Design Patterns', 'Medium','Done');
# IF NOT EXISTS... IMPORTANT
CREATE DATABASE IF NOT EXISTS todos ;
USE todos;

# IF NOT EXISTS... Again...
CREATE TABLE IF NOT EXISTS `todo` (
	id INT UNSIGNED AUTO_INCREMENT,
	task VARCHAR(50) NOT NULL,
	url VARCHAR(255) NOT NULL,
	category VARCHAR (50) NOT NULL,
  priority VARCHAR(50) NOT NULL,
	status VARCHAR(50) NOT NULL,
	PRIMARY KEY(id)
) DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `todo` (
	`task`,
	`url`,
	`category`,
	`priority`,
	`status`
) VALUES (
	'Logique formulaire',
	'https://github.com/imedsaoud/FightBlog',
	'PSR',
	'High',
	'Todo'
), (
	'Amelioration chemin',
	'https://github.com/imedsaoud/Routeur',
	'Maths',
	'Low',
	'Need Review'
), (
	'Pattern update',
	'https://github.com/imedsaoud/Routeur',
	'Design Patterns',
	'Medium',
	'Done'
);

## THIS IS HOW YOU WRITE A FUCKING SQL REQUEST SO YOU ARE ABLE TO KNOW WHERE THE MISTAKE IS IF THERE IS ONE
## Also, only one empty line at the ned of a file

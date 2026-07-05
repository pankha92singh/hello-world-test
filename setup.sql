CREATE TABLE people (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    fruit VARCHAR(100) NOT NULL,
    image_path VARCHAR(255) NOT NULL
);

INSERT INTO people (name, age, fruit, image_path) VALUES
('Ram', 22, 'Apple', 'uploads/apple.svg'),
('Shyam', 24, 'Banana', 'uploads/banana.svg');

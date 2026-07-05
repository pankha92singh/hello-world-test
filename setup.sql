CREATE TABLE people (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    fruit VARCHAR(100) NOT NULL,
    image_file VARCHAR(255) NOT NULL
);

INSERT INTO people (name, age, fruit, image_file) VALUES
('Ram', 22, 'Apple', 'apple.svg'),
('Shyam', 24, 'Banana', 'banana.svg');

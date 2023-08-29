CREATE TABLE users (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  username varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL
)

INSERT INTO users(username,email,password) VALUES
('Admin', 'admin@gmail.com', 'admin12345')

CREATE TABLE message (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  message text NOT NULL,
  added_on datetime NOT NULL,
  type varchar(10) NOT NULL
)

INSERT INTO message (id, message, added_on, type) VALUES
(1, 'Hi', '2020-04-22 12:41:04', 'user'),
(2, 'Hello, how are you.', '2020-04-22 12:41:05', 'bot'),
(3, 'what is your name', '2020-04-22 12:41:22', 'user'),
(4, 'My name is Vishal Bot', '2020-04-22 12:41:22', 'bot'),
(5, 'Where are your from', '2020-04-22 12:41:30', 'user'),
(6, 'I am from India', '2020-04-22 12:41:30', 'bot'),
(7, 'Go to hell', '2020-04-22 12:41:41', 'user'),
(8, 'Sorry not be able to understand you', '2020-04-22 12:41:41', 'bot'),
(9, 'bye', '2020-04-22 12:41:46', 'user'),
(10, 'Sad to see you are going. Have a nice day', '2020-04-22 12:41:46', 'bot');



CREATE TABLE chatbot_hints (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  question varchar(100) NOT NULL,
  reply varchar(100) NOT NULL
)

INSERT INTO chatbot_hints (id, question, reply) VALUES
(1, 'Hi', 'Hello, how are you?'),
(2, 'How are you?', 'Good to see you again!'),
(3, 'What is your name?', 'My name is iSOS'),
(4, 'What should I call you?', 'You can call me iSOS'),
(5, 'Where are your from?', 'I am from Kenya'),
(6, 'Bye', 'Sad to see you are going. Have a nice day');
(7, 'Hello', 'Hi, how are you?'),
(8, 'Hola', 'Hi, how are you?'),
(9, 'See you later', 'Sad to see you are going. Have a nice day');
(10, 'Have a Good Day', 'Sad to see you are going. Have a nice day');



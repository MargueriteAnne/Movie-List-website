-- Create users table
CREATE TABLE users (
    id INT IDENTITY(1,1) PRIMARY KEY,
    first_name NVARCHAR(50) NOT NULL,
    last_name NVARCHAR(50) NOT NULL,
    user_name NVARCHAR(50) NOT NULL UNIQUE,
    password VARBINARY(MAX) NOT NULL
);

-- Create movies table
CREATE TABLE movies (
    id INT IDENTITY(1,1) PRIMARY KEY,
    user_name NVARCHAR(50) NOT NULL,
    movie_name NVARCHAR(100) NOT NULL,
    category NVARCHAR(50) NOT NULL,
    FOREIGN KEY (user_name) REFERENCES users(user_name)
);

-- Create images table
CREATE TABLE images (
    id INT IDENTITY(1,1) PRIMARY KEY,
    user_name NVARCHAR(50) NOT NULL,
    file_name NVARCHAR(255) NOT NULL,
    FOREIGN KEY (user_name) REFERENCES users(user_name)
);

-- Create messages table
CREATE TABLE messages (
    id INT IDENTITY(1,1) PRIMARY KEY,
    name NVARCHAR(50) NOT NULL,
    email NVARCHAR(100) NOT NULL,
    message NVARCHAR(MAX) NOT NULL,
    user_name NVARCHAR(50) NOT NULL,
    timestamp DATETIME DEFAULT GETDATE(),
    FOREIGN KEY (user_name) REFERENCES users(user_name)
);

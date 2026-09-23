-- Create database
CREATE DATABASE IF NOT EXISTS 5thSemWebTechLab;

USE 5thSemWebTechLab;

-- Recreate table
DROP TABLE IF EXISTS students_res;

-- Student result table
CREATE TABLE students_res (
    roll_no VARCHAR(20) PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    mathematics INT NOT NULL,
    physics INT NOT NULL,
    programming INT NOT NULL,
    electronics INT NOT NULL
);

-- Insert sample students

-- INSERT INTO students_res
-- (
--     roll_no,
--     name,
--     mathematics,
--     physics,
--     programming,
--     electronics
-- )
-- VALUES
-- (
--     'CST001',
--     'Arpan',
--     85,
--     78,
--     92,
--     81
-- ),
-- (
--     'CST002',
--     'Rahul',
--     72,
--     68,
--     80,
--     75
-- ),
-- (
--     'CST003',
--     'Ankit',
--     91,
--     88,
--     95,
--     89
-- );

-- -- Check the inserted data

-- SELECT * FROM students_res;
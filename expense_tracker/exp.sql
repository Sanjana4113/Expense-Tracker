-- Create the expenses table
CREATE TABLE expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    description VARCHAR(255) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL
);

-- Create the total expenses table
CREATE TABLE total_expenses (
    total DECIMAL(10, 2) NOT NULL
);

-- Insert initial total expense value
INSERT INTO total_expenses (total) VALUES (0.00);

-- Create a trigger to update total expenses when a new expense is added
DELIMITER //

CREATE TRIGGER update_total_expenses
AFTER INSERT ON expenses
FOR EACH ROW
BEGIN
    DECLARE new_amount DECIMAL(10, 2);
    DECLARE current_total DECIMAL(10, 2);

    -- Get the amount of the new expense
    SET new_amount = NEW.amount;

    -- Get the current total expenses
    SELECT total INTO current_total FROM total_expenses;

    -- Update the total expenses
    SET current_total = current_total + new_amount;

    -- Update the total expenses table
    UPDATE total_expenses SET total = current_total;
END;
//

DELIMITER ;

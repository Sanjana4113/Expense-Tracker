CREATE TABLE expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    description VARCHAR(255) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL
);

CREATE TABLE total_expenses (
    total DECIMAL(10, 2) NOT NULL
);

INSERT INTO total_expenses (total) VALUES (0.00);

DELIMITER //

CREATE TRIGGER update_total_expenses
AFTER INSERT ON expenses
FOR EACH ROW
BEGIN
    DECLARE new_amount DECIMAL(10, 2);
    DECLARE current_total DECIMAL(10, 2);

    SET new_amount = NEW.amount;

    SELECT total INTO current_total FROM total_expenses;

    SET current_total = current_total + new_amount;

    UPDATE total_expenses SET total = current_total;
END;
//

DELIMITER ;

CREATE TABLE expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    description VARCHAR(255) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    trn_date TIMESTAMP
);

CREATE TABLE total_expenses (
    total DECIMAL(10, 2) NOT NULL
);

INSERT INTO total_expenses (total) VALUES (0.00);

# Trigger for new expense
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

# Trigger for deleted expense
DELIMITER //

CREATE TRIGGER delete_expense_update_total_expenses
AFTER DELETE ON expenses
FOR EACH ROW
BEGIN
    DECLARE deleted_amount DECIMAL(10, 2);
    DECLARE current_total DECIMAL(10, 2);

    SET deleted_amount = OLD.amount;

    SELECT total INTO current_total FROM total_expenses;

    SET current_total = current_total - deleted_amount;
    UPDATE total_expenses SET total = current_total;
END;
//
DELIMITER ;

# Trigger for updated expense
DELIMITER //

CREATE TRIGGER update_expense_update_total_expenses
AFTER UPDATE ON expenses
FOR EACH ROW
BEGIN
    DECLARE old_amount DECIMAL(10, 2);
    DECLARE new_amount DECIMAL(10, 2);
    DECLARE current_total DECIMAL(10, 2);

    SET old_amount = OLD.amount;
    SET new_amount = NEW.amount;

    SELECT total INTO current_total FROM total_expenses;

    SET current_total = current_total - old_amount + new_amount;
    UPDATE total_expenses SET total = current_total;
END;
//
DELIMITER ;

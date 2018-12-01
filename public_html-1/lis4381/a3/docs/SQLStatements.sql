SQL Statements


describe petstore;
describe customer;
descrbe pet;

select * from petstore;
select * from customer;
select * from pet;


1. List only the pet store IDs, full address, and phone number for all of the pet stores.

SELECT pst_id, pst_street, pst_city, pst_state, pst_zip, pst_phone
FROM petstore;


2. Display the pet store name, along with the number of pets each pet store has.
select pst_name, count(pet_id) as 'number of pets'
from petstore
natural join pet
group by pst_id;


3. List each pet store ID, along with all of the customer first, last names and balances associated with each pet store.
select pst_id, cus_fname, cus_lname, cus_balance
from petstore
natural join pet
natural join customer;

4. Update the customer last name to 'Tidwall' for Customer #4.
Select * from customer;
UPDATE customer
SET cus_lname = 'Tidwell'
WHERE cus_id = '4';


5. Remove Pet #2.
select * from pet;
DELETE FROM pet
WHERE pet_id = '2';
select * from pet;

6. Add two more customers.
select * from customers;
insert into customer(cus_fname, cus_lname, cus_street, cus_city, cus_state, cus_zip, cus_phone, cus_email, cus_balance, cus_total_sales, cus_notes)
	values ('Andrew', 'Rawling', '12325 Main St', 'Tallahassee', 'FL', )



Executing SQL script in server
ERROR: Error 1452: Cannot add or update a child row: a foreign key constraint fails (`krm14h`.`pet`, CONSTRAINT `fk_pet_customer1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE NO ACTION ON UPDATE NO ACTION)
SQL Code:
        INSERT INTO `krm14h`.`pet` (`pet_id`, `pst_id`, `cus_id`, `pet_type`, `pet_sex`, `pet_cost`, `pet_price`, `pet_age`, `pet_color`, `pet_sale_date`, `pet_vaccine`, `pet_neuter`, `pet_notes`) VALUES (6, 9, 12, 'Black Lab', 'm', 30.00, 75.00, '1', 'black', '2015-01-07', 'y', 'y', NULL)

SQL script execution finished: statements: 54 succeeded, 1 failed

Fetching back view definitions in final form.
Nothing to fetch
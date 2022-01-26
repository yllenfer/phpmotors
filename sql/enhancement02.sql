-- query #1
INSERT INTO client (clientFirstname, clientLastname, clientEmail, clientPassword, comment)
VALUES ("Tony", "Stark", "tony@starkent.com", "Iam1ronM@n" , "I am the real Ironman");

--query #2
UPDATE client
SET clientLevel = 3
WHERE clientFirstname = "Tony";


--query #3
UPDATE inventory 
SET invDescription = REPLACE(invDescription, "small interiors", "spacious interior");
WHERE invDescription = ""

--query #4
SELECT carclassification.classificationName, inventory.invMake
FROM carclassification
INNER JOIN inventory
WHERE carclassification.classificationName = "SUV";


--query #5
DELETE FROM inventory
WHERE invMake = "Jeep" AND invModel = "Wrangler";


--query #6
UPDATE inventory
SET invThumbnail =  CONCAT("\images\" +  "\phpmotors");








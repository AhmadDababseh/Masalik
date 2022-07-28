# Masalik
Masalik Project - Developed by Team Purple for Amazon Teckathon 2022

Masalik
The project starts at the log in page, where you can redirect to the sign up page if you do not have an aaount.
Tables in the database:
	users(pcode, username, password, phone, email, DOB) 
	general(root, name, governorte, district, subditrict)
	definite(root, neighborhood, street, building name, building number, floor, apartment) // this root is a foreign key that references general root
	restrictions(pcode, root, access, excection) // this pcode is a foreign key that references users pcode 
						     // exception is restricted to 1 for the project implementation purposes 
The whole project is to be a standalone mobile map service, therefore many updated are to be implemented
Masalik User Manual: https://docs.google.com/document/d/1jLpwfgftdqGsXsYGe6cMS2LhWLn5BwAZKgUvOXbcLow/edit?usp=sharing
Check out the updates plan: https://docs.google.com/presentation/d/11tGmn8h7nvecBsDJEgO0Ei51nkVIky92pswlmx80-CQ/edit?usp=sharing

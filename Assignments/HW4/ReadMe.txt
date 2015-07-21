How to use:

Please put htaccess and books.php into your wamp root directory, import books.sql into your phpadmin

The mysql username is root and no password, database name is books. Please revise the books.php according your own computer.

Then you should open the rewrite module in your apache.

Click the wamp Apache->Apache modules->tick the rewrite_module

Before the redirection, the links should be localhost/books.php or localhost/books.php?book_id=1   (id=1, 2, 3, 4)

After the rredirection, you only need enter localhost/books or localhost/books/id   (id can be 1 2 3 4)


If you have any problem, please contact me.





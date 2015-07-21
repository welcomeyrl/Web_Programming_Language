#!D:\Program Files\Python\python.exe

print "Content-type:text/html"
print
print "<html>"
print "<head>"
print "<style type = 'text/css'>"


print "table { \
    width: 70%; \
  	border-collapse: collapse; \
}"

print "table, td, th {\
    border: 1px solid black;\
    }"

print "th {text-align: left;}"

print "</style>"
print "</head>"



import cgi, cgitb
import MySQLdb

db = MySQLdb.connect(host = "localhost", user = "root", db = "csv_db", charset = "utf8" )
cursor = db.cursor()

form = cgi.FieldStorage()


if form.getvalue('dropdown'):
	subject = form.getvalue('dropdown')
else:
	subject = "Not entered"


sql1 = "SELECT * FROM babynames WHERE year = '%s' AND gender = 'female' " %subject      
sql2 = "SELECT * FROM babynames WHERE year = '%s' AND gender = 'male'" %subject 

cursor.execute(sql1)

result1 = cursor.fetchall()

print "<body>"

print "<table><tr><th>name</th><th>year</th><th>ranking</th><th>gender</th></tr>"
print "<tbody>"
for row in result1:
	name = row[1]
	year = row[2]
	ranking = row[3]
	gender = row[4]
	print "<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>" %(name,year,ranking,gender)
print "</tbody>"
print "</table>"

print "<br/>"

cursor.execute(sql2)
result2 = cursor.fetchall()


print "<table><tr><th>name</th><th>year</th><th>ranking</th><th>gender</th></tr>"
print "<tbody>"
for row in result2:
	name = row[1]
	year = row[2]
	ranking = row[3]
	gender = row[4]
	print "<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>" %(name,year,ranking,gender)
print "</tbody>"
print "</table>"

cursor.close()

db.close()

print "</body>"
print "</html>"
import datetime
import MySQLdb

db = MySQLdb.connect('localhost','pi','qwer4asd3z1','Mini_project')

cursor = db.cursor()

while True:
    currdate = datetime.datetime.now()
    today = currdate.strftime("%Y/%m/%d   %H:%M")
    bar_code = raw_input("enter barcode : ")
    sql = ("""INSERT into br_code(datestamp,barcode) VALUES (%s,%s)"""),(today,bar_code)
    try:
        print "Writing into database..."
        cursor.execute(*sql)
        db.commit()
        print ("Write complete")
    except:
        db.rollback()
        print ("Failed writing to database")
cursor.close()
db.close()



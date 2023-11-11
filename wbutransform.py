import mysql.connector
#configurize the connection to the local database
config = {
  'user': 'root',
  'password': 'root',
  'host': 'localhost',
  'unix_socket': '/Applications/MAMP/tmp/mysql/mysql.sock',
  'database': 'Stundenplan',
  'raise_on_warnings': True
}

cnx = mysql.connector.connect(**config)

#create a cursor that interacts with the databse
cursor = cnx.cursor(dictionary=True)

#execute a select query from the WBÜ_Input Table
cursor.execute('SELECT * FROM `WBÜ_Input`')

#fetch all the results from the query above
results = cursor.fetchall()

#define a variable that counts the number of students
numberofstudents = 0

#display the data with a for loop
for row in results:
  id = row['num']
  name = row['username']
  wahl1 = row['wahl1']
  wahl2 = row['wahl2']
  wahl3 = row['wahl3']
  wahl4 = row['wahl4']
  wahl5 = row['wahl5']
  print ('%s | %s | %s | %s | %s | %s | %s ' % (id, name, wahl1, wahl2, wahl3, wahl4, wahl5))
  numberofstudents +=1

# Insert data into the new table
for row in results:
    num = row['num']
    username = row['username']

    # Initialize variables with default values
    spanisch = 10
    communication = 10
    verhandlungsführung = 10
    selfempowerment = 10
    presentation_skills = 10

    for i, value in enumerate(row.values(), start=-1):
        if isinstance(value, str):
            if 'spanisch' in value:
                spanisch = i
            elif 'communication' in value:
                communication = i
            elif 'verhandlungsführung' in value:
                verhandlungsführung = i
            elif 'Selfempowerment' in value:
                Selfempowerment = i
            elif 'presentation_skills' in value:
                presentation_skills = i

    print(
        f"num: {num}, username: {username}, spanisch: {spanisch}, communication: {communication}, verhandlungsführung: {verhandlungsführung}, Selfempowerment: {selfempowerment} ,presentation_skills: {presentation_skills} ")

    cursor.execute('''
        INSERT INTO WBÜ_zwischentabelle (
            num, username, spanisch, communication, verhandlungsführung, Selfempowerment, presentation_skills
        ) VALUES (%s, %s, %s, %s, %s, %s, %s)
        ON DUPLICATE KEY UPDATE
            username=VALUES(username), spanisch=VALUES(spanisch),
            communication=VALUES(communication), verhandlungsführung=VALUES(verhandlungsführung),
            selfempowerment=VALUES(selfempowerment) , presentation_skills=VALUES(presentation_skills)
    ''', (num, username, spanisch, communication, verhandlungsführung, selfempowerment, presentation_skills))

# Commit the changes and close the connection
cnx.commit()
cnx.close()

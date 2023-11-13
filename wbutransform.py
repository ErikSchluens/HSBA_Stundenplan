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

#delete old data from transfer table
cursor.execute('Delete FROM `WBÜ_zwischentabelle`')
cnx.commit()

#execute a select query from the WBÜ_Input Table
cursor.execute('SELECT * FROM `WBÜ_Input`')

#fetch all the results from the query above
results = cursor.fetchall()



# Insert data into the new table
for row in results:
    num = row['num']
    username = row['username']

    # Initialize variables with default values of 10 to make non chosen courses very unatractive in the optimization
    spanisch = 10
    kommunikation = 10
    verhandlungsführung = 10
    selfempowerment = 10
    presentation_skills = 10

    for i, value in enumerate(row.values(), start=-1):
        if isinstance(value, str):
            if 'spanisch' in value:
                spanisch = i
            elif 'kommunikation' in value:
                kommunikation = i
            elif 'verhandlungsführung' in value:
                verhandlungsführung = i
            elif 'selfempowerment' in value:
                selfempowerment = i
            elif 'presentation_skills' in value:
                presentation_skills = i


    #execute a query which inserts the values into the database
    cursor.execute('''
        INSERT INTO WBÜ_zwischentabelle (
            num, username, spanisch, kommunikation, verhandlungsführung, selfempowerment, presentation_skills
        ) VALUES (%s, %s, %s, %s, %s, %s, %s)
    ''', (num, username, spanisch, kommunikation, verhandlungsführung, selfempowerment, presentation_skills))

# Commit the changes and close the connection
cnx.commit()
cnx.close()

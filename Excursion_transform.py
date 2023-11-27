import mysql.connector

# configurize the connection to the local database
config = {
    'user': 'root',
    'password': 'root',
    'host': 'localhost',
    'unix_socket': '/Applications/MAMP/tmp/mysql/mysql.sock',
    'database': 'TimeTableKnowledge_v.0.2',
    'raise_on_warnings': True
}

cnx = mysql.connector.connect(**config)

# create a cursor that interacts with the databse
cursor = cnx.cursor(dictionary=True)

# execute a select query from the WBÜ_Input Table
cursor.execute('SELECT * FROM `Excursion_input`')

# fetch all the results from the query above
results = cursor.fetchall()

# delete old data from transfer table
cursor.execute('Delete FROM `Excursion_zwischentabelle`')
cnx.commit()

# display the data with a for loop
for row in results:
    id = row['ExcursionInput_id']
    name = row['user_id']
    wahl1 = row['1Wahl']
    wahl2 = row['2Wahl']
    wahl3 = row['3Wahl']
    wahl4 = row['4Wahl']
    wahl5 = row['5Wahl']
    print('%s | %s | %s | %s | %s | %s | %s ' % (id, name, wahl1, wahl2, wahl3, wahl4, wahl5))

# Insert data into the new table
for row in results:
    ExcursionInput_id = row['ExcursionInput_id']
    user_id = row['user_id']

    # Initialize variables with default values
    Hamburg = 10
    Lissabon = 10
    Athen = 10
    Bilbao = 10
    Bordeaux = 10
    Limassol = 10

    # look in which column the value is and assign values accordingly.
    for i, value in enumerate(row.values(),
                              start=-1):  # start is -1 because we have 2 other columns that should be ignored
        if isinstance(value, str):
            if 'Hamburg' in value:
                Hamburg = i
            elif 'Lissabon' in value:
                Lissabon = i
            elif 'Athen' in value:
                Athen = i
            elif 'Bilbao' in value:
                Bilbao = i
            elif 'Bordeaux' in value:
                Bordeaux = i
            elif 'Limassol' in value:
                Limassol = i

    print(
        f"ExcursionInput_id: {ExcursionInput_id}, user_id: {user_id}, Hamburg: {Hamburg}, Lissabon: {Lissabon}, "
        f"Athen: {Athen}, Bilbao: {Bilbao}, Limassol: {Limassol} "
        f",Bordeaux: {Bordeaux} ")

    cursor.execute('''
        INSERT INTO Excursion_zwischentabelle (
            ExcursionInput_id, user_id, Hamburg, Lissabon, Athen, Bilbao, Bordeaux, Limassol
        ) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)
    ''', (ExcursionInput_id, user_id, Hamburg, Lissabon, Athen, Bilbao, Bordeaux, Limassol))

# Commit the changes and close the connection
cnx.commit()
cnx.close()

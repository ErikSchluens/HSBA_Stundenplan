from pulp import *
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
cursor.execute('SELECT * FROM `Excursion_Zwischentabelle`')

#fetch all the results from the query above
data_from_db = cursor.fetchall()

#delete old data from output table
cursor.execute('Delete FROM `Excursion_Output`')
cnx.commit()

#execute a select query from the WBÜ_Input Table
cursor.execute('SELECT * FROM `Constraints` WHERE Name="numstudents_excursion"')
#fetch all the results
constraints = cursor.fetchall()
#store the value in a variable
numberofstudents = int(constraints[0]['Value'])


for row in data_from_db:
    print(row)


#transform data into a list
results = [[row['num'], row['username'], row['Hamburg'], row['Lissabon'], row['Athen'],
            row['Bilbao'], row['Bordeaux'] , row['Limassol']] for row in data_from_db]

results_dict = {index: row[0] for index, row in enumerate(results)}

# Create a PuLP minimization problem
prob = LpProblem("excursion_optimisation", LpMinimize)

# Create decision variables Xij
rows = len(results)
cols = len(results[0]) - 2  # Exclude the first two columns
X = [[LpVariable(f"X_{i}_{j+1}", lowBound=0, cat="Binary") for j in range(cols)] for i in results_dict.values()]

# Create the objective function
objective_function = lpSum(results[i][j + 2] * X[i][j] for i in range(rows) for j in range(cols))
prob += objective_function

# Now add all the constraints
#Maximum of students in each excursion changes depending on entry in constraints table in DB
for y in range(cols):
    y = LpConstraint(
        e=lpSum(X[i][y] for i in range(rows)),
        sense=LpConstraintLE,
        name=f'20studentsper{y}',
        rhs=numberofstudents)



#one excursion per Student
for i in range(rows):
    i = LpConstraint(
        e=lpSum(X[i][y] for y in range(cols)),
        sense=LpConstraintEQ,
        name=f'Singelexcursion{i}',
        rhs=1)
    prob += i



# Solve the problem
prob.solve()


# Print the results
print("Status:", prob.status)
print("Optimal values:")
for var in prob.variables():
    print(f"{var.name} = {var.varValue}")
    insertion = "INSERT INTO `Excursion_Output` (variable, wert) VALUES (%s, %s)"
    data = (f'{var.name}', f'{var.varValue}', )
    cursor.execute(insertion, data)

print("Optimal Objective Function Value:", prob.objective.value())

# Execute the query
cnx.commit()

#close the Databse connection
cnx.close()

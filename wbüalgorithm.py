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
cursor.execute('SELECT * FROM `WBÜ_Zwischentabelle`')

#fetch all the results from the query above
data_from_db = cursor.fetchall()

#delete old data from output table
cursor.execute('Delete FROM `WBÜ_Output`')
cnx.commit()


for row in data_from_db:
    print(row)

#transform data into a list
results = [[row['num'], row['username'], row['Spanisch'], row['kommunikation'], row['Verhandlungsführung'],
            row['Selfempowerment'], row['presentation_skills']] for row in data_from_db]

#create a dictonary with the ids
results_dict = {index: row[0] for index, row in enumerate(results)}

# Create a PuLP minimization problem
prob = LpProblem("wbu_problem", LpMinimize)

# Create decision variables Xij
rows = len(results)
cols = len(results[0]) - 2  # Exclude the first two columns
X = [[LpVariable(f"X{i}{j+1}", lowBound=0, cat="Binary") for j in range(cols)] for i in results_dict.values()]
                        #results[i][0]}

# Create the objective function
objective_function = lpSum(results[i][j + 2] * X[i][j] for i in range(rows) for j in range(cols))
prob += objective_function

# Now add all the constraints
#Only 2 students in each course
for i in range(rows):
    prob += lpSum(X[i][j] for j in range(cols)) == 2, f"Row_{i+1}_constraint"

#every student needs to have 2 courses
for j in range(cols):
    prob += lpSum(X[i][j] for i in range(rows)) <= 2, f"Coulumn_{j+1}_constraint"

# Solve the problem
prob.solve()

# Print the results
print("Status:", prob.status)
print("Optimal values:")
for var in prob.variables():
    print(f"{var.name} = {var.varValue}")
    insertion = "INSERT INTO `WBÜ_Output` (variable, wert) VALUES (%s, %s)"
    data = (f'{var.name}', f'{var.varValue}', )
    cursor.execute(insertion, data)

print("Optimal Objective Function Value:", prob.objective.value())




# Execute the query
#cursor.execute(insert_query, data_to_insert)

cnx.commit()

#close the Databse connection
cnx.close()

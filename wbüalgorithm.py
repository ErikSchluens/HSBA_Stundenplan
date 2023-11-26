from pulp import *
import mysql.connector

#configurize the connection to the local database
config = {
  'user': 'root',
  'password': 'root',
  'host': 'localhost',
  'unix_socket': '/Applications/MAMP/tmp/mysql/mysql.sock',
  'database': 'timetableknowledge',
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

#execute a select query from the WBÜ_Input Table
cursor.execute('SELECT * FROM `Constraints` WHERE Name="wbünumber"')
#fetch all the results
constraints = cursor.fetchall()
#store the value in a variable
numberofstudents = int(constraints[0]['Value'])

for row in data_from_db:
    print(row)

#transform data into a list - muss das sein? Kann ich nicht auch direkt das dictionary nehmen?
results = [[row['num'], row['username'], row['Spanisch'], row['kommunikation'], row['Verhandlungsführung'],
            row['Selfempowerment'], row['presentation_skills']] for row in data_from_db]

results_dict = {index: row[0] for index, row in enumerate(results)}

# Create a PuLP minimization problem
prob = LpProblem("OptimizationProblem", LpMinimize)

# Create decision variables Xij
rows = len(results)
cols = len(results[0]) - 2  # Exclude the first two columns
X = [[LpVariable(f"X_{i}_{j + 1}", lowBound=0, cat="Binary") for j in range(cols)] for i in results_dict.values()]
                        #results[i][0]}

# Create the objective function
objective_function = lpSum(results[i][j + 2] * X[i][j] for i in range(rows) for j in range(cols))
prob += objective_function

# Now add all the constraints
#Maximum of students in each course changes depending on entry in constraints table in DB
for number_students_course in range(cols):
    number_students_course = LpConstraint(
        e=lpSum(X[i][number_students_course] for i in range(rows)),
        sense=LpConstraintLE,
        name=f'studentsper{number_students_course}',
        rhs=numberofstudents)
    prob += number_students_course



#two courses per Student
for courses_student in range(rows):
    courses_student = LpConstraint(
        e=lpSum(X[courses_student][y] for y in range(cols)),
        sense=LpConstraintEQ,
        name=f'twocourses{courses_student}',
        rhs=2)
    prob += courses_student


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
cnx.commit()

#close the Databse connection
cnx.close()

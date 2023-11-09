from pulp import *
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
cursor.execute('SELECT * FROM `WBÜ_Input`')

#fetch all the results from the query above
results = cursor.fetchall()

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

#close the connection 
cnx.close()


#initialize the problem
lp = LpProblem("Excursion", LpMinimize)

#define variables
# Define the range for variable pairs
#These ranges must come from the php code together with the values of the variables
range_x = range(1, 300)  # number of students in a year
range_y = range(1, 9)  # Excursions one to nine

# Initialize an empty list to store variable pairs
var_keys = []

# Loop through the ranges to generate variable pairs
for x in range_x:
    for y in range_y:
        var_keys.append((x, y))
x = LpVariable.dicts("Student", var_keys, lowBound=0, upBound=1, cat="Integer")

# Create a dictionary to hold the PuLP variables
variables = {}
for x, y in var_keys:
    variables[(x, y)] = LpVariable(f'x_{x}_{y}', cat=LpBinary)

# Sum all the PuLP variables using lpSum
#Before calculating the sum we must assign the values to each variavle
sum_of_variables = lpSum(variables[(x, y)] for x, y in var_keys)

#add the objective function
lp += sum_of_variables

#add the constraints
#a student can only choose one excursion and must be in one excursion
for i in range_x:
    i = LpConstraint(
        e=lpSum(variables[(i, y)] for y in range_y),
        sense=LpConstraintEQ,
        name=i,
        rhs=1)
    lp += i


#solve the problem
lp.solve(PULP_CBC_CMD(msg=0))

# Get the values of the variables
for x, y in var_keys:
    print(f'x_{x}_{y} = {variables[(x, y)].varValue}')

# Get the optimal objective value
optimal_value = value(lp.objective)
print(f'Optimal objective value = {optimal_value}')


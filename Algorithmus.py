from pulp import *

#initialize the problem
lp = LpProblem("Stundenplan", LpMinimize)

#define variables
# Define the range for variable pairs
range_x = range(1, 30)  # Timeslots 1 bis 29
range_y = range(1, 7)  # Kurse 1 bis 6

# Initialize an empty list to store variable pairs
var_keys = []

# Loop through the ranges to generate variable pairs
for x in range_x:
    for y in range_y:
        var_keys.append((x, y))
x = LpVariable.dicts("Kurszeitpunkt", var_keys, lowBound=0, upBound=1, cat="Integer")

# Create a dictionary to hold the PuLP variables
variables = {}
for x, y in var_keys:
    variables[(x, y)] = LpVariable(f'x_{x}_{y}', cat=LpBinary)

# Sum all the PuLP variables using lpSum
sum_of_variables = lpSum(variables[(x, y)] for x, y in var_keys)

#add the objective function
lp += sum_of_variables

#add the constraints
#blocker timeslot needs to be free
sumconstraint = LpConstraint(
    e=lpSum(variables[(4,y)] for y in range_y),
    sense=LpConstraintEQ,
    name="SumConstraint",
    rhs=0
)
lp +=sumconstraint

#course 1 (Wissenschaft und Trends) needs to have 3 weeekly slots
Wissenschaftundtrends = LpConstraint(
    e=lpSum(variables[(i,1)] for i in range_x),
    sense=LpConstraintEQ,
    name="Wissenschaftundtrends",
    rhs=3
)
lp +=Wissenschaftundtrends

#course 2 (GL der WI) needs to be in slot 5 and 6
glplenunm = LpConstraint(
    e= variables[(5,2)] + variables [(6,2)],
    sense=LpConstraintEQ,
    name="glplenum",
    rhs=2
)
lp +=glplenunm

#course 3 (Rechnungswesen) needs to have 3 weeekly slots
rechnungswesen = LpConstraint(
    e=lpSum(variables[(i,3)] for i in range_x),
    sense=LpConstraintEQ,
    name="Rechnungswesen",
    rhs=3
)
lp +=rechnungswesen

#course 4 (GL der WI Tutorium) needs to have 1 weekly slot
gltutorium = LpConstraint(
    e=lpSum(variables[(i,4)] for i in range_x),
    sense=LpConstraintEQ,
    name="gltutorium",
    rhs=1
)
lp +=gltutorium

#course 5 (Mathemathik) needs to have 3 weeekly slots
Mathemathik = LpConstraint(
    e=lpSum(variables[(i,5)] for i in range_x),
    sense=LpConstraintEQ,
    name="Mathemathik",
    rhs=3
)
lp +=Mathemathik

#course 6 (Perso und Führung) needs to have 2 weeekly slots
perso_führung = LpConstraint(
    e=lpSum(variables[(i,6)] for i in range_x),
    sense=LpConstraintEQ,
    name="perso_führung",
    rhs=2
)
lp +=perso_führung


#solve the problem
lp.solve()

# Get the values of the variables
for x, y in var_keys:
    print(f'x_{x}_{y} = {variables[(x, y)].varValue}')

# Get the optimal objective value
optimal_value = value(lp.objective)
print(f'Optimal objective value = {optimal_value}')


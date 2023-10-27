from pulp import *

#initialize the problem
lp = LpProblem("Stundenplan", LpMinimize)

#define variables
# Define the range for variable pairs
range_x = range(1, 30)  # Timeslots 1 to 29
range_y = range(1, 7)  # Kurse 1 to 6

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
    e=variables[(4, 1)] + variables[(4, 2)] + variables[(4, 3)] + variables[(4, 4)] + variables[(4, 5)] + variables[(4, 6)],
    sense=LpConstraintEQ,
    name="SumConstraint",
    rhs=0
)
lp +=sumconstraint

#course 1 (Wissenschaft und Trends) needs to have 3 weeekly slots
Wissenschaftundtrends = LpConstraint(
    e=variables[(1, 1)] + variables[(2, 1)] + variables[(3, 1)] + variables[(4, 1)] + variables[(5, 1)] + variables[(6, 1)],
    sense=LpConstraintEQ,
    name="",
    rhs=3
)
lp +=Wissenschaftundtrends


#solve the problem
lp.solve()

# Get the values of the variables
for x, y in var_keys:
    print(f'x_{x}_{y} = {variables[(x, y)].varValue}')

# Get the optimal objective value
optimal_value = value(lp.objective)
print(f'Optimal objective value = {optimal_value}')


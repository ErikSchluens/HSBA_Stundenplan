#Bekanntes Problem aus OR
#6x+4y
# x +y <=80
# x + 3y <= 180
# 2x+y <=120
# x und y >= 0

#importieren von der funktion aus der Bibliothek scipy
from scipy.optimize import linprog

#zielfunktion
c = [-6, -4]

#Varieblen
A = [[1,1],[1,3],[2,1]]
b = [80, 180, 120]
# x und y sollen positiv sein
bounds = [(0,None),(0,None)]
#übergabe der Variablen in die Funktion
res = linprog(c, A_ub=A, b_ub=b, bounds=bounds, method='highs')
#Ausgabe des ergebnisses
print(res)

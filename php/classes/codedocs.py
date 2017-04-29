# codedocs
# (c) 2017. ChitChat. All Rights Reserved.
# this software when executed, extracts and summarizes PHP
# class functions, parameters, etc. for documentative
# purposes.

while(True):
    f = open(str(input("Enter php filename: ")),"r")
    fLines = f.readlines()
    for line in fLines:
        if('function' in line):

            '''
            # list function name
            line = line.replace("\t","")
            line = line.replace("\n","")
            print("Function:",line[line.index(' ')+1:line.index('(')])

            # list function parameters
            for param in line[line.index('(')+1:line.index(')')].split(','):
                print("\t -->",param.replace("$",""))
                '''
            print(line.replace("\n",""))

# https://www.plus2net.com/python/tkinter-mysql-paging.php
from tkinter import *
import tkinter as tk
from sqlalchemy import create_engine
my_conn = create_engine("mysql+mysqldb://root:@localhost/pro")
###### end of connection ####
r_set = my_conn.execute("SELECT count(*) as no from user")
data_row = r_set.fetchone()
no_rec = data_row[0]  # Total number of rows in table
limit = 8  # No of records to be shown per page.
##### tkinter window ######
my_w = tk.Tk()
my_w.geometry("350x200")


def my_display(offset):

    q = "SELECT * from user LIMIT " + str(offset) + ","+str(limit)
    r_set = my_conn.execute(q)
    i = 0  # row value inside the loop
    for user in r_set:
        for j in range(len(user)):
            e = Entry(my_w, width=10, fg='blue')
            e.grid(row=i, column=j)
            e.insert(END, user[j])
        i = i+1
    while (i=0):
        b2["state"] = "active"  # enable Prev button
    else:
        b2["state"] = "disabled"  # disable Prev button


my_display(0)
my_w.mainloop()

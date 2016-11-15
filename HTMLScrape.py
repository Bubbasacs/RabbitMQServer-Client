#!/usr/bin/env python
from lxml import html
import requests
import io 
page = requests.get('http://www5.njit.edu/academics/degreeprograms/')
tree =html.fromstring(page.content)
#This will create a list of buyers:
Majors = tree.xpath('//a/text()')
MajorString = " ".join(Majors)
with io.FileIO("List of NJIT Majors.txt", "w") as file:
	file.write(MajorString)

#!/usr/bin/env python
from lxml import html
import requests
import io 
page = requests.get('https://www.newark.rutgers.edu/academics/areas-of-study-departments')
tree =html.fromstring(page.content)
#This will create a list of buyers:
Majors = tree.xpath('//td/text()')
MajorString = " ".join(Majors)
with io.FileIO("List of Rutgers-Newark Majors.txt", "w") as file:
	file.write(MajorString)

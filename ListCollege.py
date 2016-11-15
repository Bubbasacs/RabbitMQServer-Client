#!/usr/bin/env python
from lxml import html
import requests
import io 
page = requests.get('http://www.collegesimply.com/colleges/new-jersey/')
tree =html.fromstring(page.content)
#This will create a list of buyers:
Colleges = tree.xpath('//a[@href]/text()')
with io.FileIO("List of Colleges.txt", "w") as file:
	file.write(Colleges)

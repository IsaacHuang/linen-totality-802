#!/usr/bin/env python
#
# Copyright 2007 Google Inc.
#
# Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
#
#     http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS,
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
# See the License for the specific language governing permissions and
# limitations under the License.
#
import webapp2

class MainHandler(webapp2.RequestHandler):
	def get(self):
		self.response.write("""
		<!DOCTYPE html>
		<html lang="en">
		<head>
  			<title>Bootstrap Example</title>
  			<meta charset="utf-8">
  			<meta name="viewport" content="width=device-width, initial-scale=1">
  			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		</head>
		<body>

			<div class="container">
  				<div class="jumbotron">
    				<h1>My First Bootstrap Page</h1>
    				<p>Resize this responsive page to see the effect!</p> 
  				</div>
  				<div class="row">
    				<div class="col-sm-4">
      					<h3>Column 1</h3>
      					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      					<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    				</div>
    				<div class="col-sm-4">
      					<h3>Column 2</h3>
      					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      					<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    				</div>
    				<div class="col-sm-4">
      					<h3>Column 3</h3>        
      					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      					<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    				</div>
  				</div>
			</div>

		</body>
		</html>
		""")

class index(webapp2.RequestHandler):
  def get(self):
    self.response.write("""
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </head>
    <body>

      <div class="container">
          <div class="jumbotron">
            <h1>My First Bootstrap Page</h1>
            <p>Resize this responsive page to see the effect!</p> 
          </div>
          <div class="row">
            <div class="col-sm-4">
                <h3>Column 1</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
            <div class="col-sm-4">
                <h3>Column 2</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
            <div class="col-sm-4">
                <h3>Column 3</h3>        
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
          </div>
      </div>

    </body>
    </html>
    """)

app = webapp2.WSGIApplication([
    ('/', MainHandler)
], debug=True)

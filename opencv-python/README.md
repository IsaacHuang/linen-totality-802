
# Managed VMs OpenCV Sudoku Solver

## About

This sample application demonstrates the use of [OpenCV][1] run on App
Engine Managed VMs, to implement a Sudoku solver. The app allows you to capture an image of a
sudoku puzzle using your laptop's or phone's camera— or using a pre-existing image— and send it
to the app to be solved.  The app then solves the puzzle, using OpenCV to do OCR, and displays the
solution superimposed on the original image.
OpenCV does not run on traditional App Engine instances due to their sandboxing restrictions.

Note: Currently, Managed VMs are part of the [Cloud Platform Early Access Program](https://developers.google.com/cloud/early-access), and so you will need to be part of this program, and have your app whitelisted for Managed VMs, to run this demo.

This app uses two [Modules](https://developers.google.com/appengine/docs/python/modules/),
defined in `app.yaml` (the default module) and `backend.yaml` (the 'solver' module).
The default module uses "traditional" App Engine instances, and the `solver`
module specifies Managed VMs.

The app uses Task Queues to buffer solve requests.
The frontend instances in the default module receive user requests to solve a puzzle.
These requests are converted to tasks and added to a push queue,
with the task handlers run on the Managed VM instances.

This repo also contains a "minimal" version of a sudoku solver, which runs on
traditional (non-Managed VM) App Engine instances and does not use OCR.  Instead, it
takes as input a string of numbers that represents the puzzle's starting grid.
This app is in the `minimal_api` directory.

### OCR and Training Data

This app creates an OCR model based on training data. (The data is in the files
`samples_pixels2.data` and `feature_vector_pixels2.data`).
The model needs to both identify where the numbers are in a grid, and correctly identify each
number.
The model is currently not general enough to
work with the font & grid in every puzzle book.  In a follow-on version of this app, we'll include
a training script that you can use to improve the model.

We've included a couple of example puzzle image files that you can use to test the app.
They're in the `test_puzzles` directory.

Code was used and modified from the following sources:

- [OpenCV Python Tutorials blog][2]
- [Peter Norvig's blog][3]
- [OpenCV's square detector sample][4]


## Configuration and Deployment

First, edit the bucket name in `config.py` to the name of a Google Cloud Storage bucket for which
your app has been given write permissions via its service account.  See
[Using Service Accounts for Authentication](https://developers.google.com/storage/docs/authentication#service_accounts) for more information.

Change the app name in both the `app.yaml` and `backend.yaml` files to the name of your app.
Do the same in `dispatch.yaml`.

To deploy, do, the following.  First, update (deploy) the modules as follows:

    <path_to_sdk>/appcfg.py update -s preview.appengine.google.com app.yaml backend.yaml

(You can also deploy them individually if you like).

Then, update the app's module dispatch definitions as follows.  You only need to do this step once,
unless you change the app's module routing information.

    <path_to_sdk>/appcfg.py update_dispatch -s preview.appengine.google.com  <proj_dir>

[1]: http://opencv.org/
[2]: http://opencvpython.blogspot.com/
[3]: http://norvig.com/sudoku.html
[4]: https://github.com/Itseez/opencv/blob/master/samples/python2/squares.py

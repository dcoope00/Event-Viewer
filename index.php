<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Events</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    .custom-navbar {
      background-color: #0065cd;
      padding-left: 100px;
    }

    .dropdown-menu a.dropdown-item:hover {
      background-color: transparent;
    }

    .dropdown-divider {
      border-color: gray;
    }

    .carousel-inner .carousel-item {
      width: 100%;
      margin-left: auto;
      margin-right: auto;
    }

    .carousel-inner .carousel-item img {
      width: 100%;

      max-height: 50vh;
    }

    .carousel-inner .carousel-item .carousel-caption {

      background-color: rgba(0, 0, 0, 0.5);

      width: 40%;
      margin-left: auto;
      margin-right: auto;

    }

    .table-container {
      width: 85%;
      display: none;
    }

    .icon-link {
      display: flex;
      align-items: center;
      text-decoration: none;
    }
  </style>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="description" content="" />
  <link rel="icon" href="favicon.png">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark custom-navbar ">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-box-fill "
      viewBox="0 0 16 16">
      <path fill-rule="evenodd"
        d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001 6.971 2.789Zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z" />
    </svg>
    <a class="navbar-brand ml-2 " href="#">UAFS Events</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/~web203/ps2/index.php">Home </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle pl-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Options
          </a>
          <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
            <a class="dropdown-item text-white bg-none" href="#" onclick="displayEventsInTable()">View All Events</a>
            <a class="dropdown-item text-white" href="#" data-toggle="modal" data-target="#addEventModal">Add Event</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-white" href="#">Update Event by Event ID</a>
          </div>
        </li>

      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search Events" aria-label="Search">
        <button class="btn btn-outline-light my-2 my-sm-0 mr-5" type="submit">Search</button>
      </form>
    </div>
  </nav>


  <!--Add Event Modal -->
  <div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addEventForm" enctype="multipart/form-data">
            <div class="form-group">
              <label for="title">Event Title</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
            </div>
            <div class="form-group">
              <label for="description">Event Description</label>
              <input type="text" class="form-control" id="description" name="description"
                placeholder="Enter Description">
            </div>
            <div class="form-group">
              <label for="dateTime">Start Date/Time</label> </br>
              <input type="datetime-local" name="dateTime">
            </div>
            <div class="mb-3">
              <label for="formFile" class="form-label">Upload file</label>
              <input class="form-control" type="file" id="formFile" name="formFile">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" onclick="addEvent()" class="btn btn-primary">Add Event</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Carousel -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">

    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>

  </div>

  <!-- Table -->
  <div class="container-fluid table-container">
    <table class="table mt-5" style="100%;">
      <thead>
        <tr>
          <th scope="col">Event ID</th>
          <th scope="col">Event Title</th>
          <th scope="col">Event Description</th>
          <th scope="col">Date</th>
          <th scope="col">Start Time</th>
          <th scope="col">Actions</th>

        </tr>
      </thead>
      <tbody id="tbody">

      </tbody>
    </table>
  </div>

  <!-- Delete Event Modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete Event</h5>
          <button type="button" class="close" data-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete this event?</p>
        </div>
        <div class="modal-footer">
          <button type="button" id="deleteEventButton" class="btn btn-danger">Delete</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Edit Event Modal -->
  <div class="modal" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script>

    function confirmDelete(eventID) {
      document.getElementById('deleteEventButton').setAttribute('data-event-id', eventID);

      $('#deleteModal').modal('show');
    }


    async function deleteEvent(eventID) {
      var response = await fetch("deleteEvent.php", {
        method: "POST",
        body: new URLSearchParams({ 'eventID': eventID })
      });


      displayEventsInTable();
      makeImage();
    }


    function formatDate(dateString) {
      return new Date(dateString)
        .toLocaleDateString('en-us',
          { weekday: "long", year: "numeric", month: "short", day: "numeric" })
    }


    async function addEvent() {
      var form = document.getElementById("addEventForm");
      var formData1 = new FormData(form);

      var response = await fetch("./addEvent.php", {
        method: "POST",
        body: formData1,
      });
      var activeItem = document.querySelector(".carousel-item.active");
      if (activeItem) {
        activeItem.classList.remove("active");
      }

      displayEventsInTable();
      const tableContainer = document.querySelector('.table-container');
      tableContainer.style.display = 'block';
      makeImage();
    }

    async function makeImage() {
      var response = await fetch("./getAllEvents.php");
      var events = await response.json();
      var carouselInner = document.querySelector(".carousel-inner");
      while (carouselInner.firstChild) {
        carouselInner.removeChild(carouselInner.firstChild);
      }
      events.forEach((event, index) => {


        var item = document.createElement("div");
        item.className = "carousel-item";

        if (index === 0) {
          item.classList.add("active");
        }

        var image = document.createElement("img");
        image.className = "d-block w-100";

        image.src = event.EVENT_IMAGE;

        var caption = document.createElement("div");
        caption.className = "carousel-caption";
        var heading = document.createElement("h5");
        heading.textContent = event.TITLE;
        var eventDesc = document.createElement("p");
        eventDesc.textContent = event.DESCRIPTION;

        caption.appendChild(heading);
        caption.appendChild(eventDesc);
        item.appendChild(image);
        item.appendChild(caption);
        carouselInner.appendChild(item);
      });
    }

    async function displayEventsInTable() {
      var response = await fetch("./getAllEvents.php");

      var events = await response.json();
      var tbody = document.getElementById("tbody");

      tbody.innerHTML = "";
      events.forEach((event, index) => {
        var row = document.createElement("tr");
        row.innerHTML = `
        <td>${event.ID}</td>
        <td>${event.TITLE}</td>
        <td>${event.DESCRIPTION}</td>
        <td>${formatDate(event.START_DATE)}</td>
        <td>${event.START_TIME}</td>
        <td> <a href="#" data-toggle="modal" data-target="#editModal"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square mr-2" viewBox="0 0 16 16">
    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
  </svg></a>
  <a href="#" data-toggle="modal" data-target="#deleteModal" class="delete-event" onclick="confirmDelete(${event.ID})"><svg xmlns="http://www.w3.org/2000/svg"  width="20" height="20" fill="currentColor" class="bi bi-trash3-fill mb-0" viewBox="0 0 16 16">
    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
  </svg></a>
</td>
      `;
        tbody.appendChild(row);

      });
    }

    const viewAllEventsLink = document.querySelector('a[onclick="displayEventsInTable()"]');
    if (viewAllEventsLink) {
      viewAllEventsLink.addEventListener('click', function () {
        const tableContainer = document.querySelector('.table-container');
        tableContainer.style.display = 'block';
      });
    }
    document.addEventListener("DOMContentLoaded", function () {
      makeImage();
    });


    document.getElementById('deleteEventButton').addEventListener('click', function () {
      // Get the event ID to be deleted
      const eventID = this.getAttribute('data-event-id');

      // Call the deleteEvent function with the event ID
      deleteEvent(eventID);

      // Hide the delete modal
      $('#deleteModal').modal('hide');
    });
  </script>



  <?php


  ?>



  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>

</html>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <style>
        /* Custom CSS for your carousel */
        .carousel-thumbnails {
            text-align: center;
            margin-top: 20px;
        }

        .carousel-thumbnails img {
            max-width: 100px;
            margin: 5px;
            cursor: pointer;
        }

        .carousel-thumbnails img.active {
            border: 2px solid #007bff; /* Highlight the active thumbnail */
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                <li data-bs-target="#myCarousel" data-bs-slide-to="3"></li>
                <li data-bs-target="#myCarousel" data-bs-slide-to="4"></li>
                <!-- Add more as needed -->
            </ol>

            <!-- Slides -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://img.freepik.com/free-vector/kid-seeing-doctor-hospital_1308-26834.jpg" alt="Image 1" class="d-block w-100"  height="500" width="400">
                </div>
                <div class="carousel-item">
                    <img src="https://img.freepik.com/premium-vector/smiling-doctor-two-disabled-patients-waiting-room-cartoon-vector-illustration_1284-76424.jpg" alt="Image 2" class="d-block w-100"  height="500" width="400">
                </div>
                <div class="carousel-item">
                    <img src="https://img.freepik.com/premium-vector/doctor-waiting-room_102902-179.jpg" alt="Image 3" class="d-block w-100"  height="500" width="400">
                </div>
                <div class="carousel-item">
                    <img src="https://media.istockphoto.com/id/1287797256/vector/people-in-clinic-waiting-room.jpg?s=612x612&w=0&k=20&c=o5Ks5eqq9BwrCZy4dFTMC4pOpZ01XE2TN7e0-GNKtDo=" alt="Image 4" class="d-block w-100"  height="500" width="400">
                </div>
                <div class="carousel-item">
                    <img src="https://media.istockphoto.com/id/1177027395/vector/doctor-and-patient.jpg?s=612x612&w=0&k=20&c=634nkeorUkKYyGHFKdPFVd6w6ZTZIBmQoxqSQzssY5o=" alt="Image 5" class="d-block w-100"  height="500" width="400">
                </div>
                <!-- Add more images as needed -->
            </div>

            <!-- Controls -->
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>

    </div>
    </div>

    <br/>
<div class="container text-center">
<a href="bookingform.php" class="btn btn-primary">Booking</a>

</div>

</body>
</html>

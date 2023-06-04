<?php
session_start();

include 'server/connection.php';
$id = $_SESSION['id'];
$q = "SELECT * FROM akun WHERE id = $id";
$result = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($result);
$_SESSION['photo'] = $row['photo'];

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['email']);
        header('location:login.php');
        exit;
    }
}

$index = 'text-dark';
$about = 'text-secondary';
$book = 'text-secondary';
$name = explode(" ", $_SESSION['name']);
$title = "| " . $name[0];
include('layouts/header.php');
?>
<section class="hero ms-5">
    <div class="hero-label justify-content-center ms-5">
        <h4 class="h4 mb-4">SPRING - DISCOUNT</h4>
        <h1 class="mt-2">Enjoy the convenience of book search</h1>
        <p class="lead h3 ">Knowledge is contained within the pages, building new worlds in the imagination.</p>
        <button class="mt-5 ">Shop Now</button>

        <div class="social-icon mt-5">
            <h5 class="mb-2 lead">Books Corner Social</h5>
            <a href=""><i class="fa-brands fa-square-github ms-2 c-60"></i></a>
            <a href=""><i class="fa-brands fa-square-instagram ms-2 c-60 "></i></a>
            <a href=""><i class="fa-brands fa-square-facebook ms-2 c-60"></i></a>
        </div>
    </div>

</section>
<div class="bg-dark">
    <img class="images-fluid " src="images/Hero2.jpg">
</div>


<!-- content PAGE -->
<div class="container mt-1 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="justify-content-center">
                <video class="ms-1 mt-5 pt-4 img-fluid " controls autoplay="true" width="700px" loop="true">
                    <source src="media/video.mp4" type="video/mp4">
                </video>
            </div>
        </div>

        <div class="col-md-5 mt-5">
            <div class="jumbotron bg-30">
                <div class="card bg-dark text-white">
                    <img src="images/12 Life-Changing Habits You Can Honestly Start Today.jpeg" style="opacity: 0.5;" width="400px" height="450px" class="card-img object-fit-cover" alt="...">
                    <div class="card-img-overlay mt-5 ">
                        <div class="align-items-center mt-5 pt-5">
                            <h5 class="card-title text-center">Books & Train</h5>
                            <p class="card-text text-center">its realy relax when you read on a train</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="container mt-2 mb-3">
    <div class="row p-2">
        <div class="col-md-3">
            <div class="ads">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/download (4).jpeg.jpg" class="d-block w-100 " class="img-fluid" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/Free Phone Screen Savers! - Sara Rosett.jpeg.jpg" class="d-block w-100" class="img-fluid" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/Books Wallpaper _ Book Wall 📚.jpeg.jpg" class="d-block w-100" class="img-fluid" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </div>
        <div class="col-md-9">
            <div class="jumbotron jumbo-right bg-30 p-3">
                <div>
                    <h6>SPRING-DISCOUNT List</h6>
                    <hr>
                </div>
                <ul class="list-unstyled">
                    <li class="media">
                        <div class="media-body">
                            <a class="text-dark" style="text-decoration: none;" href="detil-buku.php?id=596">
                                <h5 class="mt-0 mb-1">Hero: The Life and Legend of Lawrence of Arabia</h5>
                            </a>
                            <p>From Michael Korda, author of the New York Times bestselling Eisenhower biography Ike and the captivating Battle of Britain book With Wings Like Eagles, comes the critically-acclaimed definitive biography of T. E. Lawrence—the legendary British soldier, strategist, scholar, and adventurer whose exploits as “Lawrence of Arabia” created a legacy of mythic proportions in his own lifetime. Many know T.E. Lawrence from David Lean’s Oscar-winning 1962 biopic—based, itself, upon Lawrence’s autobiographical Seven Pillars of Wisdom—but in the tradition of modern biographers like John Meacham, David McCullough, and Barbara Leaming, Michael Korda’s penetrating new examination reveals new depth and character in the twentieth century’s quintessential English hero.</p>
                        </div>
                    </li>
                    <li class="media my-4">
                        <div class="media-body">
                            <a class="text-dark" style="text-decoration: none;" href="detil-buku.php?id=958">
                                <h5 class="mt-0 mb-1">Quarter Life Crisis</h5>
                            </a>
                            <p>Anxious and confused about the future? Can't decide on a career? Choosing the right partner? Idealism or reality? What do you want to do after graduation?</p>
                            <p>Language
                                : Indonesian,

                                Release Date
                                : November 18, 2019,

                                Author
                                : Gerhana Nurhayati Putri,
                            </p>
                        </div>
                    </li>
                    <li class="media">
                        <div class="media-body">
                            <a class="text-dark" style="text-decoration: none;" href="detil-buku.php?id=825">
                                <h5 class="mt-0 mb-1">Harry Potter and the Philosopher's Stone</h5>
                            </a>
                            <p>Harry Potter lives with his abusive aunt and uncle, Vernon and Petunia Dursley, and their bullying son, Dudley. On Harry's eleventh birthday, a half-giant named Rubeus Hagrid personally delivers an acceptance letter to Hogwarts School of Witchcraft and Wizardry, revealing that Harry's parents, James and Lily Potter, were wizards. When Harry was one year old, an evil and powerful dark wizard, Lord Voldemort, murdered his parents. Harry survived Voldemort's killing curse that rebounded and seemingly destroyed the Dark Lord, leaving a lightning bolt-shaped scar on his forehead. Unknown to Harry, this act made him famous in the wizarding world.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container mb-4 mt-3">
    <div class="row text-center">
        <div class="col-md-12">
            <div class="jumbotron bg-30 p-3">
                <div class="">
                    <h2>Enjoy Every Page</h2>
                    <hr>
                </div>
                <div class="">
                    <p>Enjoy every page that the author has created for you, because every page is made with energy, heart and mind.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>




<?php
include('layouts/footer.php');
?>
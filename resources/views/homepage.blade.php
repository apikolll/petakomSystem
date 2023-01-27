@extends('layouts.app')

@section('content')

<style>
    .caro {
        height: 250px;
    }

    .reveal {
        position: relative;
        transform: translateY(150px);
        opacity: 0;
        transition: 1s all ease;
    }

    .reveal.active {
        transform: translateY(0);
        opacity: 1;
    }

    a:link { text-decoration: none; }
    a:hover { text-decoration: underline; }

</style>



<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="margin-top:100px;">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('image/city.jpeg') }}" class="d-block w-100 caro" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('image/test.jpeg') }}" class="d-block w-100 caro" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('image/nature.jpeg') }}" class="d-block w-100 caro" alt="...">
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

<section class="p-3 mt-3">
    <div class="container">
        <h3>Highlight</h3>
        <p class="lead">Discover how Petakom influenced society and transformed for the better.</p>
        <div class="d-flex flex-sm-row flex-column p-3 justify-content-evenly">
            <div class="card mb-3" style="width: 18rem;">
                <img src="{{ asset('image/city.jpeg') }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    {{-- <h5 class="card-title">Card title</h5> --}}
                    <p class="card-text ">Part time job application with Mahiran Digital Sdn Bhd.</p>
                    <a href="#" class="btn btn-primary">Details</a>
                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                </div>
            </div>
            <div class="card mb-3" style="width: 18rem;">
                <img src="{{ asset('image/city.jpeg') }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    {{-- <h5 class="card-title">Card title</h5> --}}
                    <p class="card-text text-center">Student development program.</p>
                    <a href="#" class="btn btn-primary">Details</a>
                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('image/city.jpeg') }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    {{-- <h5 class="card-title">Card title</h5> --}}
                    <p class="card-text text-center">FK Mobility Program.</p>
                    <a href="#" class="btn btn-primary">Details</a>
                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                </div>
            </div>
        </div>
    </div>
</section>


<section class="container-fluid bg-dark text-dark text-light">
    <div class="p-5 reveal">
        <h3 class="text-center">FACULTY OF COMPUTING JACKET</h3>
        <div class="row g-0 bg-dark align-items-center">
            <div class="col-md-6 mb-md-0 p-md-4">
                <img src="{{ asset('image/nature.jpeg') }}" class="w-100 rounded-4" alt="...">
            </div>
            <div class="col-md-6 p-4 ps-md-0 text-center">
                {{-- <h5 class="mt-0">Faculty Jacket</h5>
                <p class="lead">Wear this and be smart</p> --}}
                <a href="#" class="stretched-link btn btn-primary px-5 py-4" type="button">Buy Now!</a>
            </div>
        </div>
    </div>
</section>

<section class="p-5 reveal">
    <div class="container">
        <h3 class="text-center">Latest Bulletin News</h3>
        <div class="w-75 mt-5" style="margin:auto;">
        @forelse($bulletin as $item)
            <div style="text-align:center;" class="row">
                <a style="font-size:18px;color:black;text-transform:uppercase;" href="/bulletin/{{$item->id}}/show">{{ $item->news_title }}</a>
                <span style="color:blue;">{{ date('d F, Y' ,strtotime($item->created_at)) }}</span>
            </div><br>
                @empty
                <td><h1 style="text-align:center;">No Records Yet</h1></td>
        @endforelse
        </div>
        <div style="margin-left:45%;margin-top:50px;">
            {{ $bulletin->links() }}
        </div>
    </div>
</section>

<footer class="bg-dark bg-opacity-75 text-light text-center">
    <div class="p-3">
        <div class="d-md-flex justify-content-evenly align-items-center reveal">
            <div class="d-block">
                <img src="{{ asset('image/ump.png') }}" alt="ump" style="width: 15rem;">
                <div class="position-relative w-100">
                    <h5 class="text-center">UMP Pekan <br> Universiti Malaysia Pahang <br> 26600 Pekan <br> Pahang,
                        Malaysia</h5>
                </div>

                {{-- <div class="mt-4 d-flex gap-5 justify-content-center align-items-center">
                    <i class="h3 bi bi-twitter"></i>
                    <i class="h3 bi bi-instagram"></i>
                    <i class="h3 bi bi-facebook"></i>
                </div> --}}
            </div>
            <div class="d-block mt-5">
                <h3>Contact us</h3>
                <p><i class="bi bi-envelope"></i> petakom@gmail.com</p>
                <p><i class="bi bi-telephone"></i> +609 271948</p>
            </div>
            <div class="d-md-block mt-5">
                <h3>Follow us</h3>
                <p><i class="h3 bi bi-twitter align-middle mx-2"></i> petakom_ump</p>
                <p><i class="h3 bi bi-instagram align-middle mx-2"></i> petakom_ump</p>
                <p><i class="h3 bi bi-facebook align-middle mx-2"></i> Persatuan Teknologi Komputer - Petakom UMP</p>
            </div>
        </div>
        <div class="text-muted text-center mt-3">
            <small>Developed by GROUP 1 <div class="vr"></div> All Rights Reserved</small>
        </div>
    </div>
</footer>
@endsection


<script>
    function reveal() {

        var reveals = document.querySelectorAll(".reveal");

        for (var i = 0; i < reveals.length; i++) {
            var windowHeight = window.innerHeight;
            var elementTop = reveals[i].getBoundingClientRect().top;
            var elementVisible = 150;

             if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add("active");
            } else {
                reveals[i].classList.remove("active");
            }
        }
    }

window.addEventListener("scroll", reveal);
</script>
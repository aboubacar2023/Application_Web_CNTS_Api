<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Centre National de Transfusion Sanguine</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="/design/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/design/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">CNTS BAMAKO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Se deconnecter</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h3 class="section-heading text-uppercase">Bienvenue cher(e) administrateur(trice)</h3>
                    <h3 class="section-subheading text-muted">Voici la liste qui vous permettra de planifier les dons</h3>
                </div>
                <div class="row">
                    @foreach($dates as $date)
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item -->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal{{ $date->id }}">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading"><li class="list-inline">Date : {{ $date->daterdv->format('d-m-Y') }}</li></div>
                                    <div class="portfolio-caption-subheading text-muted">Nombre total de donneurs : {{ $nombreDonneursParDate->where('id', $date->id)->first()->donneurs_count }}</div>
                                </div>
                            </a>
                        </div>
                    </div>
                
                    <!-- Portfolio modal -->
                    <div class="portfolio-modal modal fade" id="portfolioModal{{ $date->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="close-modal" data-bs-dismiss="modal"><img src="/design/assets/img/close-icon.svg" alt="Close modal" /></div>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <div class="modal-body">
                                                <!-- Project details-->
                                                <h3 class="text-uppercase">La liste des donneurs</h3>
                                                        <ul class="list-inline">
                                                            @foreach($date->donneur as $donneur)
                                                                <li><strong> Nom : </strong>{{ $donneur->nom }}<strong> __ Prénom : </strong> {{ $donneur->prenom }}<strong> __ Groupe Sanguin : </strong> {{$donneur->groupe_sanguin}} <strong> __ Rhésus : </strong>{{$donneur->rhesus}}</li>
                                                            @endforeach
                                                        </ul>
                                                       
                                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                                    
                                                    Fermer
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
        </section>
        
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; CNTS 2023</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" style="text-decoration: none; color:black">Téléphone: 96 69 63 24</a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Portfolio Modals-->
        <!-- Portfolio item 1 modal popup-->
        
        <!-- Portfolio item 2 modal popup-->
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="/design/js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>

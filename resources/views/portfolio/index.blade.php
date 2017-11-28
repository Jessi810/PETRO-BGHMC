<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Resumex - Professional HTML CSS Resume Website Template</title>

    <!-- favicon -->
    <link href="favicon.png" rel=icon>

    <!-- web-fonts -->
    <link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">

    <!-- font-awesome -->
    <link href="{{ asset('Resumex/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="{{ asset('Resumex/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Style CSS -->
    <link href="{{ asset('Resumex/css/style.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar">
<div id="main-wrapper">
<!-- Page Preloader -->
<div id="preloader">
    <div id="status">
        <div class="status-mes"></div>
    </div>
</div>

<div class="columns-block container">
<div class="left-col-block blocks">
    <header class="header theiaStickySidebar">
        <div class="profile-img">
            <img src="{{ asset('ResumeX/img/img-profile.jpg') }}" class="img-responsive" alt=""/>
        </div>
        <div class="content">
            <h1>{{ $trainer->name }}</h1>
            <span class="lead">{{ $trainer->current_position }}</span>

            <div class="about-text">
                <p>
                    {{ $trainer->about }}
                </p>
                <p><img src="{{ asset('ResumeX/img/Signature.png') }}" alt="" class="img-responsive"/></p>
            </div>


            <ul class="social-icon">
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-slack" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
            </ul>
        </div>

    </header>
    <!-- .header-->
</div>
<!-- .left-col-block -->


<div class="right-col-block blocks">
<div class="theiaStickySidebar">
<section class="expertise-wrapper section-wrapper gray-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Expertise</h2>
                </div>
            </div>
        </div>
        <!-- .row -->

        <div class="row">
            
            @foreach ($expertises as $expertise)
                <div class="col-md-6">
                    <div class="expertise-item">
                        <h3>{{ $expertise->title }}</h3>

                        <p>
                            {{ $expertise->description }}
                        </p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
<!-- .expertise-wrapper -->

<section class="section-wrapper skills-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Skills</h2>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="progress-wrapper">

                    @foreach ($skills as $skill)
                        <div class="progress-item">
                            <span class="progress-title">{{ $skill->title }}</span>

                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->proficiency }}" aria-valuemin="0"
                                    aria-valuemax="100" style="width: {{ $skill->proficiency }}%"><span class="progress-percent"> {{ $skill->proficiency }}%</span>
                                </div>
                            </div>
                            <!-- .progress -->
                        </div>
                        <!-- .skill-progress -->
                    @endforeach

                </div>
                <!-- /.progress-wrapper -->
            </div>
        </div>
        <!--.row -->
    </div>
    <!-- .container-fluid -->
</section>
<!-- .skills-wrapper -->

<section class="section-wrapper section-experience gray-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title"><h2>Work Experience</h2></div>
            </div>
        </div>
        <!--.row-->
        <div class="row">
            <div class="col-md-12">

                @foreach ($works as $work)
                    <div class="hide">
                        {{ $from = new Carbon\Carbon($work->datefrom) }}
                        {{ $to = new Carbon\Carbon($work->dateto) }}
                    </div>
                    <div class="content-item">
                        <small>{{ $from->year }} - {{  $to->year }}</small>
                        <h3>{{ $work->position }}</h3>
                        <h4>{{ $work->company_name }}</h4>

                        {{--  <p>United Kingdom, London</p>  --}}
                    </div>
                @endforeach
                
            </div>
        </div>
        <!--.row-->
    </div>
    <!-- .container-fluid -->

</section>
<!-- .section-experience -->

<section class="section-wrapper section-education">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title"><h2>Education</h2></div>
            </div>
        </div>
        <!--.row-->
        <div class="row">
            <div class="col-md-12">

                @foreach ($educations as $education)
                    <div class="content-item">
                        <small>{{ $education->year_graduated }}</small>
                        <h3>{{ $education->major }}</h3>
                        <h4>{{ $education->school }}</h4>

                        {{--  <p>United Kingdom, London</p>  --}}
                    </div>
                @endforeach

            </div>
        </div>
        <!--.row-->
    </div>
    <!-- .container-fluid -->

</section>
<!-- .section-education -->

<section class="expertise-wrapper section-wrapper gray-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Certifications</h2>
                </div>
            </div>
        </div>
        <!-- .row -->

        <div class="row">
            
            @foreach ($certifications as $cert)
                <div class="col-md-6">
                    <div class="expertise-item">
                        <h3>{{ $cert->title }}</h3>

                        <p>
                            {{ $cert->description }}
                        </p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
<!-- .certification-wrapper -->

<section class="section-wrapper section-interest gray-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Interest</h2>
                </div>
            </div>
        </div>
        <!-- .row -->

        <div class="row">
            <div class="col-md-12">
                <div class="content-item">
                    <h3>Books</h3>

                    <p>Proactively extend market-driven e-tailers rather than enterprise-wide supply chains.
                        Collaboratively embrace 24/7 processes rather than adaptive users. Seamlessly monetize
                        alternative e-business.</p>
                </div>
                <div class="content-item">
                    <h3>Sports</h3>

                    <p>Assertively grow optimal methodologies after viral technologies. Appropriately develop
                        frictionless technology for adaptive functionalities. Competently iterate functionalized
                        networks for best-of-breed services.</p>

                </div>
                <div class="content-item">
                    <h3>Art</h3>

                    <p>Dramatically utilize superior infomediaries whereas functional core competencies.
                        Enthusiastically repurpose synergistic vortals for customer directed portals. Interactively
                        pursue sustainable leadership via.</p>
                </div>
            </div>
        </div>
        <!-- .row -->

    </div>
</section>
<!-- .section-publications -->

{{--  <section class="section-wrapper portfolio-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Portfolio</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a class="portfolio-item" href="#">
                    <div class="portfolio-thumb">
                        <img src="{{ asset('ResumeX/img/portfolio-1.jpg') }}" alt="">
                    </div>

                    <div class="portfolio-info">
                        <h3>Creative concepts</h3>
                        <small>domain.com</small>
                    </div>
                    <!-- portfolio-info -->
                </a>
                <!-- .portfolio-item -->
            </div>
            <div class="col-md-6">
                <a class="portfolio-item" href="#">
                    <div class="portfolio-thumb">
                        <img src="{{ asset('ResumeX/img/portfolio-2.jpg') }}" alt="">
                    </div>

                    <div class="portfolio-info">
                        <h3>Customer focused</h3>
                        <small>domain.com</small>
                    </div>
                    <!-- portfolio-info -->
                </a>
                <!-- .portfolio-item -->
            </div>
            <div class="col-md-6">
                <a class="portfolio-item" href="#">
                    <div class="portfolio-thumb">
                        <img src="{{ asset('ResumeX/img/portfolio-3.jpg') }}" alt="">
                    </div>

                    <div class="portfolio-info">
                        <h3>Management methodology</h3>
                        <small>domain.com</small>
                    </div>
                    <!-- portfolio-info -->
                </a>
                <!-- .portfolio-item -->
            </div>
            <div class="col-md-6">
                <a class="portfolio-item" href="#">
                    <div class="portfolio-thumb">
                        <img src="{{ asset('ResumeX/img/portfolio-4.jpg') }}" alt="">
                    </div>

                    <div class="portfolio-info">
                        <h3>Market research</h3>
                        <small>domain.com</small>
                    </div>
                    <!-- portfolio-info -->
                </a>
                <!-- .portfolio-item -->
            </div>

        </div>
        <!-- /.row -->
    </div>
</section>  --}}
<!-- .portfolio -->

{{--  <section class="section-contact section-wrapper gray-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Contact</h2>
                </div>
            </div>
        </div>
        <!--.row-->
        <div class="row">
            <div class="col-md-12">
                <address>
                    <strong>Address</strong><br>
                    {{ $trainer->address }}

                </address>
                <address>
                    <strong>Phone Number</strong><br>
                    {{ $trainer->phone }}
                </address>

                <address>
                    <strong>Mobile Number</strong><br>
                    {{ $trainer->mobile }}
                </address>


                <address>
                    <strong>Email</strong><br>
                    <a href="mailto:{{ $trainer->email }}">{{ $trainer->email }}</a>
                </address>
            </div>
        </div>
        <!--.row-->
        <div class="row">
            <div class="col-md-12">
                <div class="feedback-form">
                    <h2>Get in touch</h2>

                    <form id="contactForm" action="sendemail.php" method="POST">
                        <div class="form-group">
                            <label for="InputName">Name</label>
                            <input type="text" name="name" required="" class="form-control" id="InputName"
                                   placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <label for="InputEmail">Email address</label>
                            <input type="email" name="email" required="" class="form-control" id="InputEmail"
                                   placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="InputSubject">Subject</label>
                            <input type="text" name="subject" class="form-control" id="InputSubject"
                                   placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Message</label>
                            <textarea class="form-control" rows="4" required="" name="message" id="message-text"
                                      placeholder="Write message"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <!-- .feedback-form -->


            </div>
        </div>
    </div>
    <!--.container-fluid-->
</section>  --}}
<!--.section-contact-->

<footer class="footer">
    <div class="copyright-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="copytext">&copy; Resumex. All rights reserved | Design By: <a
                            href="https://themehippo.com">themehippo</a></div>
                </div>
            </div>
            <!--.row-->
        </div>
        <!-- .container-fluid -->
    </div>
    <!-- .copyright-section -->
</footer>
<!-- .footer -->
</div>
<!-- Sticky -->
</div>
<!-- .right-col-block -->
</div>
<!-- .columns-block -->
</div>
<!-- #main-wrapper -->

<!-- jquery -->
<script src="{{ asset('Resumex/js/jquery-2.1.4.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('Resumex/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('Resumex/js/theia-sticky-sidebar.js') }}"></script>
<script src="{{ asset('Resumex/js/scripts.js') }}"></script>
</body>
</html>
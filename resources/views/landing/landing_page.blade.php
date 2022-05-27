@extends('layout.app')

@section('content')

@include('landing.navbars.topnav')

<style>
    header.masthead {
        background: url("{{ asset('assets') }}/images/bg-masthead.jpg") no-repeat center center;
    }
</style>

<!-- Masthead-->
<header class="masthead">
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="text-center text-white">
                    <!-- Page heading-->
                    <h1 class="mb-5">Track your parcel at here!</h1>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col">
                                <input class="form-control form-control-lg" type="text" name="" id="" placeholder="#00000000">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Icons Grid-->
<section class="features-icons bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex"><i class="bi bi-send-fill m-auto text-primary"></i></div>
                    <h3>Lorem, ipsum.</h3>
                    <p class="lead mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, dolorum.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex"><i class="bi bi-calendar-check-fill m-auto text-primary"></i></div>
                    <h3>Lorem, ipsum.</h3>
                    <p class="lead mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi, dolor.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                    <div class="features-icons-icon d-flex"><i class="bi bi-bag-heart-fill m-auto text-primary"></i></div>
                    <h3>Lorem, ipsum dolor.</h3>
                    <p class="lead mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, qui!</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Image Showcases-->
<section class="showcase">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('{{ asset(\'assets\') }}/images/bg-showcase-1.jpg')"></div>
            <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                <h2>Lorem ipsum dolor sit amet.</h2>
                <p class="lead mb-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae a assumenda veniam earum porro natus debitis ducimus consequuntur id. Voluptatibus provident quasi atque nesciunt. Facilis magni itaque voluptatem ducimus molestiae, voluptate reiciendis temporibus voluptatibus odio pariatur dignissimos? Eaque est quidem perferendis, qui harum amet iste repellendus placeat assumenda nisi dignissimos, officia sit! Unde, commodi veritatis neque excepturi rerum maxime ipsum magni voluptatum mollitia animi molestiae perspiciatis praesentium iusto itaque in adipisci dolorum quo nemo amet iure quod similique earum sapiente? Ullam ratione, esse corrupti dicta dolores perferendis exercitationem ad ducimus, ipsam fuga inventore. Odit, nam accusamus. Dolore, deserunt animi. Illo.</p>
            </div>
        </div>
        <div class="row g-0">
            <div class="col-lg-6 text-white showcase-img" style="background-image: url('{{ asset(\'assets\') }}/images/bg-showcase-2.jpg')"></div>
            <div class="col-lg-6 my-auto showcase-text">
                <h2>Lorem ipsum dolor sit amet.</h2>
                <p class="lead mb-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta ipsa beatae consequuntur minus impedit, deserunt distinctio molestiae repellendus eligendi ab, ratione voluptate cum excepturi obcaecati iure in fugit officia porro sapiente quibusdam asperiores corrupti recusandae! Tenetur praesentium minima incidunt unde soluta cupiditate cumque, quis blanditiis laboriosam voluptate aperiam numquam beatae id non quidem. Tenetur cum ipsam beatae nesciunt nostrum vitae quae pariatur quod placeat temporibus rerum fugit, earum commodi asperiores quasi aspernatur quos dicta laborum magnam aliquid laboriosam nulla. Sequi possimus praesentium quae repudiandae dolorem deleniti est. Reprehenderit illo neque necessitatibus, mollitia doloremque, minus natus in ducimus nemo animi labore.</p>
            </div>
        </div>
        <div class="row g-0">
            <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('{{ asset(\'assets\') }}/images/bg-showcase-3.jpg')"></div>
            <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                <h2>Lorem ipsum dolor sit amet.</h2>
                <p class="lead mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem doloremque perferendis omnis rem ipsa veniam. Eveniet hic ex repellat ipsa ut, obcaecati dolores iste doloremque rem perspiciatis cupiditate iure, aut facilis nihil unde dolorem dignissimos quasi dolore tempore reiciendis dicta? Facilis qui assumenda neque dignissimos tempore tempora quaerat blanditiis deleniti deserunt veritatis tenetur magnam consectetur fuga reiciendis saepe dolorem similique ipsum, repellat ratione temporibus cum illum harum vero! Soluta blanditiis reiciendis rerum? Distinctio quod ipsam atque maiores ad! Doloremque deserunt aliquam eveniet molestias beatae magnam nemo. Voluptatem, tenetur ullam quidem delectus, dolor sunt facere cumque hic quia expedita quisquam debitis?</p>
            </div>
        </div>
    </div>
</section>
<!-- Testimonials-->
<section class="testimonials text-center bg-light">
    <div class="container">
        <h2 class="mb-5">What people are saying...</h2>
        <div class="row">
            <div class="col-lg-4">
                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                    <img class="img-fluid rounded-circle mb-3" src="{{ asset('assets') }}/images/testimonials-1.jpg" alt="..." />
                    <h5>Margaret E.</h5>
                    <p class="font-weight-light mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Hic, cum.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                    <img class="img-fluid rounded-circle mb-3" src="{{ asset('assets') }}/images/testimonials-2.jpg" alt="..." />
                    <h5>Fred S.</h5>
                    <p class="font-weight-light mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, amet!</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                    <img class="img-fluid rounded-circle mb-3" src="{{ asset('assets') }}/images/testimonials-3.jpg" alt="..." />
                    <h5>Sarah W.</h5>
                    <p class="font-weight-light mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, beatae.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('landing.navbars.footer')

@endsection
@extends('layouts.app')

@section('content')
<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src="{{ asset('images/breadcrumbs/2.jpg') }}" alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h1 class="page-title">Contact</h1>
            <ul>
                <li>
                    <a class="active" href="/">Home</a>
                </li>
                <li>Contact</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Contact Section Start -->
    <div class="contact-page-section pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="row rs-contact-box mb-90 md-mb-50">
                <div class="col-lg-4 col-md-12-4 lg-pl-0 sm-mb-30 md-mb-30">
                    <div class="address-item">
                        <div class="icon-part">
                            <img src="{{ asset('images/contact/icon/1.png') }}" alt="">
                        </div>
                        <div class="address-text">
                            <span class="label">Address</span>
                            <span class="des">No.43, 1st Floor, Maruthi Nilaya, <br/> 6th Main, 12th Cross, NS Palya, <br/> BTM 2nd Stage, Bangalore – 560076  </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 lg-pl-0 sm-mb-30 md-mb-30">
                    <div class="address-item">
                        <div class="icon-part">
                            <img src="{{ asset('images/contact/icon/2.png') }}" alt="">
                        </div>
                        <div class="address-text">
                            <span class="label">Email Address</span>
                            <span class="des"><a href="mailto:hello@myjavalearningcenter.com"> hello@myjavalearningcenter.com </a></span>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-4 col-md-12 lg-pl-0 sm-mb-30">
                    <div class="address-item">
                        <div class="icon-part">
                            <img src="{{ asset('images/contact/icon/3.png') }}" alt="">
                        </div>
                        <div class="address-text">
                            <span class="label">Phone Number</span>
                            <span class="des"><a href="+91-7090366699">+91-70903 66699</a></span> <br/>
                            <span class="des"><a href="+91-7090366699">+91-70904 66699</a></span>
                        </div>
                    </div>
                </div>
            </div>
                    
            <div class="row">
                <div class="col-lg-5 md-mb-30">
                    <div class="contact-map2">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.9399794230917!2d77.6060657!3d12.9115792!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae150e1f590e15%3A0x55798e38a6b9b728!2sMy%20Java%20Learning%20Center!5e0!3m2!1sen!2snp!4v1693729963224!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-7 pl-30 lg-pl-15">
                    <div class="rs-quick-contact new-style">
                        <div class="inner-part mb-50">
                            <h2 class="title mb-15"> Query Form</h2>
                            <p>Send Your Query here and we will be happy to Serve you !!!</p>
                        </div>
                        <div id="form-messages"></div>
                        <form id="contact-form" method="post" action="/book-demo">
                            <div class="row">
                                <div class="col-lg-6 mb-35 col-md-12">
                                    <input class="from-control" type="text" id="name" name="name" placeholder="Name" required="">
                                </div> 
                                <div class="col-lg-6 mb-35 col-md-12">
                                    <input class="from-control" type="text" id="email" name="email" placeholder="Email" required="">
                                </div>   
                                <div class="col-lg-6 mb-35 col-md-12">
                                    <input class="from-control" type="text" id="phone" name="phone" placeholder="Phone" required="">
                                </div>   
                                <div class="col-lg-6 mb-35 col-md-12">
                                    <select class="from-control form-select" id="course" name="course" data-placeholder="Query" required="">
                                        <option></option>
                                        <option>I am old student</option>
                                        <option>Placement related query  </option>
                                        <option>Course related query</option>
                                        <option>I want to hire JLC students</option>
                                        <option>I have general query</option>
                                    </select>
                                </div>
                                     
                                <div class="col-lg-12 mb-50">
                                    <textarea class="from-control" id="message" name="message" placeholder=" Message" required=""></textarea>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <input class="btn-send" type="submit" value="Submit Now">
                            </div>       
                        </form>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <!-- Contact Section End -->
</div> 
@endsection
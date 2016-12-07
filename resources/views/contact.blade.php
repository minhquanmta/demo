@extends('layout')


@section('products')
    <div class="wrap">
        <div class="col-md-6">
            <div class="contact">
                <div class="contact_info">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5265.980222784715!2d105.78180886399508!3d21.048272347352412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab2d88bb4195%3A0x3006e474cce20274!2zSOG7jWMgdmnhu4duIEvhu7kgdGh14bqtdCBRdcOibiBz4bux!5e0!3m2!1svi!2s!4v1479975712671" width="900" height="500" frameborder="0" style="border:0" allowfullscreen></iframe></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <div class="contact-form">
                <h2 class="title text-center">Get In Touch</h2>
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                    <div class="form-group col-md-6">
                        <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                    </div>
                    <div class="form-group col-md-12">
                        <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                    </div>
                    <div class="form-group col-md-12">
                        <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="contact-info">
                <h2 class="title text-center">Contact Info</h2>
                <address>
                    <p>E-Shopper Inc.</p>
                    <p>Học viện kỹ thuật quân sự</p>
                    <p>Mobile: +2346 17 38 93</p>
                    <p>Fax: 1-714-252-0026</p>
                    <p>Email: info@e-shopper.com</p>
                </address>
            </div>
        </div>
    </div>
    @endsection
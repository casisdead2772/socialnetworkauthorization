<div class="col-md-5 p-lg-2 mx-auto my-2">
    <div class="mx-auto">
        <h2 class="font-weight-normal">You can create an authorization through social networks</h2>
            <div class="text-center margin-bottom-20" id="ulogin"
            data-ulogin="display=panel;theme=flat;fields=first_name,last_name,email,nickname,photo,country;
                             providers=facebook,vkontakte,odnoklassniki,mailru;hidden=other;
                             redirect_uri={{ urlencode('http://' . $_SERVER['HTTP_HOST']) }}/ulogin;mobilebuttons=0;">
    </div>
        <div id="ulogin" data-ulogin="display=small;theme=classic;fields=first_name,last_name;providers=vkontakte,odnoklassniki,mailru,facebook;hidden=other;redirect_uri=http%3A%2F%2F;mobilebuttons=0;"></div>
    </div>
</div>

@section('js')
    <script src="//ulogin.ru/js/ulogin.js"></script>
@endsection

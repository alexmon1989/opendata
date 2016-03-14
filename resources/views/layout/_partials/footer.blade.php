<div class="footer-v1">
    <div class="footer">
        <div class="container">
            <div class="row">
                <!-- About -->
                <div class="col-md-4 md-margin-bottom-40">
                    <a href="index.html"><img id="logo-footer" class="footer-logo" src="{{ url('assets/img/logo2-default.png') }}" alt=""></a>
                    <p>Сервіс створений для пошуку серед наборів відкритих даних Укрпатенту.</p>
                    <p>Розробка проведена згідно положення КМУ України від 21 жовтня 2015 р. № 835 "Про затвердження Положення про набори даних, які підлягають оприлюдненню у формі відкритих даних".</p>
                </div><!--/col-md-3-->
                <!-- End About -->

                <!-- Link List -->
                <div class="col-md-4 md-margin-bottom-40">
                    <div class="headline"><h2>Посилання</h2></div>
                    <ul class="list-unstyled link-list">
                        <li><a href="{{ route('home') }}">Головна</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="{{ route('search_default') }}">Пошук</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="{{ route('about') }}">Про сервіс</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="{{ route('contacts') }}">Контакти</a><i class="fa fa-angle-right"></i></li>
                    </ul>
                </div><!--/col-md-3-->
                <!-- End Link List -->

                <!-- Address -->
                <div class="col-md-4 map-img md-margin-bottom-40">
                    <div class="headline"><h2>Зв'яжіться з нами</h2></div>
                    <address class="md-margin-bottom-40">
                        ДП "Український інститут промислової власності" (Укрпатент) <br />
                        Київ, вул. Глазунова, 1 <br />
                        Тел.: 800 123 3456 <br />
                        Email: <a href="mailto:info@anybiz.com" class="">info@anybiz.com</a>
                    </address>
                </div><!--/col-md-3-->
                <!-- End Address -->
            </div>
        </div>
    </div><!--/footer-->

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>{{ date('Y') }} &copy; Всі права захищено.</p>
                </div>
            </div>
        </div>
    </div><!--/copyright-->
</div>
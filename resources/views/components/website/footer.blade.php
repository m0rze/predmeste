<footer class="footer-section spad">
    <div class="container">
        <div class="row">
            <div class="footer-widget">
                <h2 class="fw-title">Полезные ссылки</h2>

            <ul>
                <li class="col-lg-3 col-md-6 col-sm-6">
                    <a href="{{ route("page.show.widgets") }}">Обращения</a>
                </li>
                @if(!empty($mainData->staticPages))
                    @foreach($mainData->staticPages as $oneStaticPage)
                        @if($oneStaticPage->staticPlace->id === 3)
                            <li class="col-lg-3 col-md-6 col-sm-6">
                                <a href="{{ route("page.show.static", $oneStaticPage->slug) }}">{{ $oneStaticPage->title }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
            </div>

        </div>
    </div>
    <div class="footer-buttom">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 order-2 order-lg-1 p-0">
                    <div class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Все права защищены &copy;<script>document.write(new Date().getFullYear());</script>
                        <i class="fa fa-heart-o" aria-hidden="true"></i> <a
                            href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
                </div>

            </div>
        </div>
    </div>
</footer>

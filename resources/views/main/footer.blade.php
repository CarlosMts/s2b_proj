@if (Route::currentRouteName() != 'search')

<div ng-controller="FooterController">
    <footer>
        <div class="row">
            <div class="col-xs-6 col-sm-3">
                <h5>space2business</h5>
                <ul>
                  <li><a ng-click="aboutUs()"> {{ trans('footer.about') }} </a></li>
                  <li><a ng-click="terms()"> {{ trans('footer.termos') }} </a></li>
                  <li><a ng-click="help()"> {{ trans('footer.faq') }} </a></li>
                  <li><a ng-click="contacts()"> {{ trans('footer.contacts') }} </a></li>
                </ul>
                       
            </div>
            <div class="col-xs-6 col-sm-3">
                <h5> {{ trans('footer.spaces') }} </h5>
                <ul>
                  <li><a ng-click="search()"> {{ trans('footer.find') }} </a></li>
                  <li><a ng-click="share()"> {{ trans('footer.share') }} </a></li>
                  <li><a ng-click="popularWorkspaces()"> {{ trans('footer.wanted') }} </a></li>
                </ul>
                      
            </div>
            <div class="col-xs-6 col-sm-3">
                <h5> {{ trans('footer.payments') }} </h5>
                    <ul>
                      <li><img src="/images/logos/payments/s2b_pagamentos_no_mb.png" /></li>
                    </ul>
            </div>
            <div class="col-xs-6 col-sm-3">
                <h5> {{ trans('footer.language') }} </h5>
                    <div class="footer-language-set">
                        
                          <button onclick="changeLang()" class="dropbtn"> {{ LaravelLocalization::getCurrentLocaleName() }} </button>
                          <div id="myDropdown" class="dropdown-content">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        
                            <a rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                                {{ $properties['native'] }}
                            </a>
                        
                        @endforeach
                          </div>
                        
                    </div>
            </div>
            
        </div>

        <div class="row" style="padding-top:60px ">
            <div class="col-xs-6 col-sm-3" style="color:white;">
                Terms © space2business 2017
            </div>

            <div class="col-xs-6 col-sm-6">
                <div class="footer_inner-div">
                    <ul>
                      <li><a href="https://www.w3schools.com"><img src="/images/logos/norte2020/norte2020_white_x28.png"/></a></li>
                      <li><a href="https://www.w3schools.com"><img src="/images/logos/norte2020/portugal2020_white_x28.png"/></a></li>
                      <li><a href="https://www.w3schools.com"><img src="/images/logos/norte2020/ue_white_x28.png"/></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-xs-6 col-sm-3">
                <a class="footer_links" target="_blank">
                    <span class="fa fa-facebook"></span>
                </a>
                <a class="footer_links" target="_blank">
                    <span class="fa fa-twitter"></span>
                </a>
                <a class="footer_links" target="_blank">
                    <span class="fa fa-linkedin"></span>
                </a>
                <a class="footer_links" target="_blank" >
                    <span class="fa fa-pinterest"></span>
                </a>
                <a class="footer_links" target="_blank">
                    <span class="fa fa-instagram"></span>
                </a>
            </div>
        </div>
    </footer>
</div>

@endif
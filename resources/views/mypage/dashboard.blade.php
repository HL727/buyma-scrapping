@extends("layouts.mypage")
@section('content')
<section class="content">
  <div class="">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>ダッシュボード</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/"><i class="zmdi zmdi-home"></i> Aero</a></li>
                    <li class="breadcrumb-item active">ダッシュボード</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">                
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon">
                    <div class="body">
                        <h6>goat</h6>
                        <h2 id="goat">20 <small class="info">中 5,000</small></h2>
                        <small id="goat_pro_txt"></small>
                        <div class="progress">
                            <div id="goat_pro" class="progress-bar l-amber" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon">
                    <div class="body">
                        <h6>louisvuitton</h6>
                        <h2 id="loui">12 <small class="info">中 5,000</small></h2>
                        <small id="loui_pro_txt">0%</small>
                        <div class="progress">
                            <div id="loui_pro" class="progress-bar l-blue" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100" style="width: 38%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon">
                    <div class="body">
                        <h6>burberry</h6>
                        <h2 id="burb">39 <small class="info">中 5,000</small></h2>
                        <small id="burb_pro_txt">0%</small>
                        <div class="progress">
                            <div id="burb_pro" class="progress-bar l-blue" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100" style="width: 38%;"></div>
                        </div>
                    </div>
                </div>
            </div>            
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon">
                    <div class="body">
                        <h6>dior</h6>
                        <h2 id="burb">39 <small class="info">中 5,000</small></h2>
                        <small id="burb_pro_txt">0%</small>
                        <div class="progress">
                            <div id="burb_pro" class="progress-bar l-blue" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100" style="width: 38%;"></div>
                        </div>
                    </div>
                </div>
            </div>          
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-4">
                <div class="card pricing pricing-item">
                    <div class="pricing-deco l-slategray">
                        <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" y="0px">
                            <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                            <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                            <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                            <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                        </svg>
                        <div class="pricing-price"><span class="pricing-currency">月額</span>1,000 円<span class="pricing-period"></span>
                        </div>
                        <h3 class="pricing-title">スタンダード</h3>
                    </div>
                    <div class="body">
                        <ul class="feature-list list-unstyled">
                            <li>5GB Disk Space</li>
                            <li>10 Domain Names</li>
                            <li>5 E-Mail Address</li>                            
                            <li>Fully Support</li>
                            <li><button class="btn btn-default">まずはお試し!</button></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card pricing pricing-item">
                    <div class="pricing-deco l-blue">
                        <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" y="0px">
                            <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                            <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                            <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                            <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                        </svg>
                        <div class="pricing-price"><span class="pricing-currency">月額</span>1,500 円<span class="pricing-period"></span>
                        </div>
                        <h3 class="pricing-title">プレミアム</h3>
                    </div>
                    <div class="body">
                        <ul class="feature-list list-unstyled">
                            <li>10GB Disk Space</li>
                            <li>20 Domain Names</li>
                            <li>10 E-Mail Address</li>
                            <li>Fully Support</li>
                            <li><button class="btn btn-primary">まずはお試し!</button></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card pricing pricing-item">
                    <div class="pricing-deco l-slategray_1">
                        <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" y="0px">
                            <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                            <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                            <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                            <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                        </svg>
                        <div class="pricing-price"><span class="pricing-currency">月額</span>2,000 円<span class="pricing-period"></span>
                        </div>
                        <h3 class="pricing-title">ビジネス</h3>
                    </div>
                    <div class="body">
                        <ul class="feature-list list-unstyled">
                            <li>50GB Disk Space</li>
                            <li>50 Domain Names</li>
                            <li>20 E-Mail Address</li>
                            <li>Fully Support</li>
                            <li><button class="btn btn-success">まずはお試し!</button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>
@endsection

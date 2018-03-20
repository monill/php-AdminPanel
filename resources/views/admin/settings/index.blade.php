@extends('admin.layout.main')

@section('css')
    <style>
        #map {height: 400px; width: 100%;}
    </style>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Configurações</h3>
                <hr />
                @include('admin.layout.errors')
                @include('flash::message')
                <br>
                {!! Form::open(['url' => 'dashboard/settings']) !!}
                <section>
                    <div class="sttabs tabs-style-bar">
                        <nav>
                            <ul>
                                <li class="tab-current"><a href="#section-bar-1" class="sticon ti-settings"><span>Geral</span></a></li>
                                <li> <a href="#section-bar-2" class="sticon ti-world"><span>Social</span></a></li>
                                <li> <a href="#section-bar-3" class="sticon ti-stats-up"><span>Analytics</span></a></li>
                                <li> <a href="#section-bar-4" class="sticon ti-map-alt"><span>Google Maps</span></a></li>
                            </ul>
                        </nav>

                        <div class="content-wrap">
                            <section id="section-bar-1" class="content-current">

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-md-12">Site Título</label>
                                        <div class="col-md-12">
                                            <input type="text" name="site_title" class="form-control" value="{{ isset($setting->site_title) ? $setting->site_title : '' }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="col-md-12">Telefone 1</label>
                                        <div class="col-md-12">
                                            <input type="text" name="phone1" class="form-control" value="{{ isset($setting->phone1) ? $setting->phone1 : '' }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="col-md-12">Telefone 2</label>
                                        <div class="col-md-12">
                                            <input type="text" name="phone2" class="form-control" value="{{ isset($setting->phone2) ? $setting->phone2 : '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-md-12">Endereço</label>
                                        <div class="col-md-12">
                                            <input type="text" name="address" class="form-control" value="{{ isset($setting->address) ? $setting->address : '' }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="col-md-12">E-mail 1</label>
                                        <div class="col-md-12">
                                            <input type="text" name="email1" class="form-control" value="{{ isset($setting->email1) ? $setting->email1 : '' }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="col-md-12">E-mail 2</label>
                                        <div class="col-md-12">
                                            <input type="text" name="email2" class="form-control" value="{{ isset($setting->email2) ? $setting->email2 : '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-md-12">Cidade</label>
                                        <div class="col-md-12">
                                            <input type="text" name="city" class="form-control" value="{{ isset($setting->city) ? $setting->city : '' }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="col-md-12">Estado</label>
                                        <div class="col-md-12">
                                            <input type="text" name="estate" class="form-control" value="{{ isset($setting->estate) ? $setting->estate : '' }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="col-md-12">CEP</label>
                                        <div class="col-md-12">
                                            <input type="text" name="zip" class="form-control" value="{{ isset($setting->zip) ? $setting->zip : '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-xs-6 col-md-4">
                                        <label class="col-md-12">Meta Título</label>
                                        <div class="col-md-12 col-md-4">
                                            <textarea rows="3" name="meta_title" class="form-control form-control-line">{{ isset($setting->meta_title) ? $setting->meta_title : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-6 col-md-4">
                                        <label class="col-md-12">Meta Keywords</label>
                                        <div class="col-md-12 col-md-4">
                                            <textarea rows="3" name="meta_keywords" class="form-control form-control-line">{{ isset($setting->meta_keywords) ? $setting->meta_keywords : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-6 col-md-4">
                                        <label class="col-md-12">Meta Descrição</label>
                                        <div class="col-md-12 col-md-4">
                                            <textarea rows="3" name="meta_description" class="form-control form-control-line">{{ isset($setting->meta_description) ? $setting->meta_description : '' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </section>
                            <section id="section-bar-2">

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="col-md-12">Facebook</label>
                                        <div class="col-md-12">
                                            <input type="text" name="social_facebook" class="form-control" value="{{ isset($setting->social_facebook) ? $setting->social_facebook : '' }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="col-md-12">Twitter</label>
                                        <div class="col-md-12">
                                            <input type="text" name="social_twitter" class="form-control" value="{{ isset($setting->social_twitter) ? $setting->social_twitter : '' }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="col-md-12">Pinterest</label>
                                        <div class="col-md-12">
                                            <input type="text" name="social_pinterest" class="form-control" value="{{ isset($setting->social_pinterest) ? $setting->social_pinterest : '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="col-md-12">Linkedin</label>
                                        <div class="col-md-12">
                                            <input type="text" name="social_linkedin" class="form-control" value="{{ isset($setting->social_linkedin) ? $setting->social_linkedin : '' }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="col-md-12">Google Plus</label>
                                        <div class="col-md-12">
                                            <input type="text" name="social_googleplus" class="form-control" value="{{ isset($setting->social_googleplus) ? $setting->social_googleplus : '' }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="col-md-12">Youtube</label>
                                        <div class="col-md-12">
                                            <input type="text" name="social_youtube" class="form-control" value="{{ isset($setting->social_youtube) ? $setting->social_youtube : '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="col-md-12">Skype</label>
                                        <div class="col-md-12">
                                            <input type="text" name="social_skype" class="form-control" value="{{ isset($setting->social_skype) ? $setting->social_skype : '' }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="col-md-12">Instagram</label>
                                        <div class="col-md-12">
                                            <input type="text" name="social_instagram" class="form-control" value="{{ isset($setting->social_instagram) ? $setting->social_instagram : '' }}">
                                        </div>
                                    </div>
                                </div>

                            </section>

                            <section id="section-bar-3">
                                <div class="form-group col-xs-6">
                                    <label class="col-md-8">Google Analytics</label>
                                    <div class="col-md-8">
                                        <textarea rows="5" name="ganalytics" class="form-control form-control-line">{{ isset($setting->ganalytics) ? $setting->ganalytics : '' }}</textarea>
                                    </div>
                                </div>
                            </section>

                            <section id="section-bar-4">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label class="col-md-7">Longitude</label>
                                        <div class="col-md-7">
                                            <input type="text" name="geolng" id="geolng" class="form-control" value="{{ isset($setting->geolng) ? $setting->geolng : '' }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="col-md-7">Latitude</label>
                                        <div class="col-md-7">
                                            <input type="text" name="geolat" id="geolat" class="form-control" value="{{ isset($setting->geolat) ? $setting->geolat : '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div id="map"></div>
                                </div>
                            </section>
                            <br />

                        </div>
                        <!-- /content -->
                    </div>
                    <!-- /tabs -->
                </section>
                {!! Form::submit('Atualizar', ['class' => 'btn btn-success btn-rounded']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('admin/js/cbpFWTabs.js') }}"></script>

    <script type="text/javascript">
        (function() {
            [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
                new CBPFWTabs(el);
            });
        })();
    </script>

    <script>
        function initMap() {
            var uluru = {
                lat: {{ isset($setting->geolat) ? $setting->geolat : '-23.082125' }},
                lng: {{ isset($setting->geolng) ? $setting->geolng : '-46.950334' }}
            };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map,
                draggable: true
            });
            google.maps.event.addListener(marker, 'dragend', function ( event ) {
                document.getElementById("geolat").value = this.getPosition().lat();
                document.getElementById("geolng").value = this.getPosition().lng();
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBI6yreMxqsm-wuLrBIdNvawJcbkyAOnj8&callback=initMap"></script>

@endsection
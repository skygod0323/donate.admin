@extends('adminlte::page')

@section('title', 'Donations')

@section('content_header')
    <div>
        <h1 style="display: inline-block; margin-top: 10px">Donor Wall</h1>
    </div>
@stop

@section('css')
    <style>
        .box-body {
            padding: 20px;
        }

        .img-wrapper {
            background-color: gray;
            border-radius: 10px;
            margin-top: 10px;
        }

        .img-wrapper .img {
            width: 100%;
        }

        .top {
            margin-top: 40px;
        }

        .top::after {
            clear: both;
            content: '';
            display: block;
        }

        .top h2 {
            float: left;
            margin: 0;
        }

        .btn-wrapper {
            float: right;
        }
    </style>
@stop

@section('content')
    <div class="box">
        <div class="box-body">
            
            <div class="row">
                <div class="col-md-6">
                    <div class="top">
                        <h2>1st Image</h2>
                        <div class="btn-wrapper">
                            <button class="btn btn-primary btn-change" style="width: 70px; margin-right: 10px" data-id="1">Change</button>
                            <button class="btn btn-success btn-save" style="width: 70px;" data-id="1" disabled>Save</button>
                            <i class="fa fa-spinner fa-spin" style="font-size: 20px; margin: 10px; vertical-align: sub; display: none" data-id='1'></i>
                        </div>
                    </div>
                    
                    <div class="img-wrapper">
                        <input type="file" id="1" style="display: none" class="img-input">
                        @if (isset($donor_wall['img1']))
                            <img src="{{$donor_wall['img1']}}" class="img img-1">
                        @else
                            <img src="/img/image_preview.png" class="img img-1">
                        @endif
                    </div>
                    
                </div>

            
                <div class="col-md-6">
                    <div class="top">
                        <h2>2nd Image</h2>
                        <div class="btn-wrapper">
                            <button class="btn btn-primary btn-change" style="width: 70px; margin-right: 10px" data-id="2">Change</button>
                            <button class="btn btn-success btn-save" style="width: 70px;" data-id="2" disabled>Save</button>
                            <i class="fa fa-spinner fa-spin" style="font-size: 20px; margin: 10px; vertical-align: sub; display: none" data-id='2'></i>
                        </div>
                    </div>
                    <div class="img-wrapper">
                        <input type="file" id="2" style="display: none" class="img-input">
                        @if (isset($donor_wall['img2']))
                            <img src="{{$donor_wall['img2']}}" class="img img-2">
                        @else
                            <img src="/img/image_preview.png" class="img img-2">
                        @endif
                    </div>
                    
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="top">
                        <h2>3rd Image</h2>
                        <div class="btn-wrapper">
                            <button class="btn btn-primary btn-change" style="width: 70px; margin-right: 10px" data-id="3">Change</button>
                            <button class="btn btn-success btn-save" style="width: 70px;" data-id="3" disabled>Save</button>
                            <i class="fa fa-spinner fa-spin" style="font-size: 20px; margin: 10px; vertical-align: sub; display: none" data-id='3'></i>
                        </div>
                    </div>
                    <div class="img-wrapper">
                        <input type="file" id="3" style="display: none" class="img-input">
                        @if (isset($donor_wall['img3']))
                            <img src="{{$donor_wall['img3']}}" class="img img-3">
                        @else
                            <img src="/img/image_preview.png" class="img img-3">
                        @endif
                    </div>
                    
                </div>

                <div class="col-md-6">
                    <div class="top">
                        <h2>4th Image</h2>
                        <div class="btn-wrapper">
                            <button class="btn btn-primary btn-change" style="width: 70px; margin-right: 10px" data-id="4">Change</button>
                            <button class="btn btn-success btn-save" style="width: 70px;" data-id="4" disabled>Save</button>
                            <i class="fa fa-spinner fa-spin" style="font-size: 20px; margin: 10px; vertical-align: sub; display: none" data-id='4'></i>
                        </div>
                    </div>
                    <div class="img-wrapper">
                        <input type="file" id="4" style="display: none" class="img-input">
                        @if (isset($donor_wall['img4']))
                            <img src="{{$donor_wall['img4']}}" class="img img-4">
                        @else
                            <img src="/img/image_preview.png" class="img img-4">
                        @endif
                    </div>
                    
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="top">
                        <h2>5th Image</h2>
                        <div class="btn-wrapper">
                            <button class="btn btn-primary btn-change" style="width: 70px; margin-right: 10px" data-id="5">Change</button>
                            <button class="btn btn-success btn-save" style="width: 70px;" data-id="5" disabled>Save</button>
                            <i class="fa fa-spinner fa-spin" style="font-size: 20px; margin: 10px; vertical-align: sub; display: none" data-id='5'></i>
                        </div>
                    </div>
                    <div class="img-wrapper">
                        <input type="file" id="5" style="display: none" class="img-input">
                        @if (isset($donor_wall['img5']))
                            <img src="{{$donor_wall['img5']}}" class="img img-5">
                        @else
                            <img src="/img/image_preview.png" class="img img-5">
                        @endif
                    </div>
                    
                </div>

                <div class="col-md-6">
                    <div class="top">
                        <h2>6th Image</h2>
                        <div class="btn-wrapper">
                            <button class="btn btn-primary btn-change" style="width: 70px; margin-right: 10px" data-id="6">Change</button>
                            <button class="btn btn-success btn-save" style="width: 70px;" data-id="6" disabled>Save</button>
                            <i class="fa fa-spinner fa-spin" style="font-size: 20px; margin: 10px; vertical-align: sub; display: none" data-id='6'></i>
                        </div>
                    </div>
                    <div class="img-wrapper">
                        <input type="file" id="6" style="display: none" class="img-input">
                        @if (isset($donor_wall['img6']))
                            <img src="{{$donor_wall['img6']}}" class="img img-6">
                        @else
                            <img src="/img/image_preview.png" class="img img-6">
                        @endif
                    </div>
                    
                </div>
            </div>

        </div>
    </div>

@stop

@section('js')
    <script>
        $(function() {
            var donor_wall = @json($donor_wall);
            console.log(donor_wall);

            $('.btn-change').click((e) => {
                var ele = e.target;
                
                const input_id = $(ele).data('id');
                $('#' + input_id).click();
            })

            $('.btn-save').click((e) => {
                var ele = e.target;
                
                const id = $(ele).data('id');
                var input = document.getElementById(id);
                const file = input.files[0];

                /// show spinner
                $('.fa-spin[data-id=' + id + ']').css('display', 'inline-block');
                $('.btn-save[data-id=' + id + ']').prop('disabled', true);
                $('.btn-change[data-id=' + id + ']').prop('disabled', true);

                let fd = new FormData();
                fd.append('file', file);
                fd.append('name', 'img' + id);
                fd.append('_token', '{{csrf_token()}}');
                
                $.ajax({
                    method: 'post',
                    url: '/donor_wall/upload',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: (res) => {
                        console.log(res);
                        if (res.success) {
                            $('.fa-spin[data-id=' + id + ']').css('display', 'none');
                            $('.btn-change[data-id=' + id + ']').prop('disabled', false);
                            alert('saved successfully');
                        }
                    },
                    error: (err) => {
                        console.log(err);
                    }
                })
            })

            $('.img-input').change((e) => {
                console.log(e.target.files[0]);
                const id = $(e.target).attr('id');
                console.log(id);

                e.preventDefault();
                    const reader = new FileReader();
                    const f = e.target.files[0];
                    if (reader !== undefined && f !== undefined) {
                        reader.onloadend = () => {
                            $('.img-' + id).attr('src', reader.result);
                            $('.btn-save[data-id=' + id + ']').prop('disabled', false);
                        }
                        reader.readAsDataURL(f);
                    }
                })
        })
    </script>
@stop
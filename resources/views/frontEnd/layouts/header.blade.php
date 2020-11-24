<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{csrf_token()}}"/>
        <meta http-equiv='cache-control' content='no-cache'>
        <meta http-equiv='expires' content='0'>
        <meta http-equiv='pragma' content='no-cache'>
        <!--<title>{{!empty($title)?'| '.$title : 'Welcome to FareTrim'}}</title>-->
        <title>Welcome to FareTrim</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/assets/css/bootstrap.min.css')}}" >
        <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/assets/css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/assets/css/responsive.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/assets/css/swiper.min.css')}}">
        <style type="text/css">
            #loading{
                position: fixed;
                width: 100%;
                height: 100vh;
                background: #ffff
                    url('frontEnd/assets/img/25.gif')
                    no-repeat center center; 
                z-index: 99999;
            }
            #ajaxLoader{
                position: fixed;
                width: 100%;
                height: 100vh;
                background: #ffff
                    url('frontEnd/assets/img/25.gif')
                    no-repeat center center; 
                z-index: 99999;
            }
        </style>
        @stack('css')
    </head>

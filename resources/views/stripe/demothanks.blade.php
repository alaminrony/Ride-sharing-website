<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}"/>
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <!--<title>{{!empty($title)?'| '.$title : 'Welcome to FareTrim'}}</title>-->
    <title>Thanks to Stripe</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        *{
            box-sizing:border-box;
            /* outline:1px solid ;*/
        }
        body{
            background: #ffffff;
            background: linear-gradient(to bottom, #ffffff 0%,#e1e8ed 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#e1e8ed',GradientType=0 );
            height: 100%;
            margin: 0;
            background-repeat: no-repeat;
            background-attachment: fixed;

        }

        .wrapper-1{
            width:100%;
            height:100vh;
            display: flex;
            flex-direction: column;
        }
        .wrapper-2{
            padding :30px;
            text-align:center;
        }
        h1{
            font-family: 'Kaushan Script', cursive;
            font-size:4em;
            letter-spacing:3px;
            color:#5892FF ;
            margin:0;
            margin-bottom:20px;
        }
        .wrapper-2 p{
            margin:0;
            font-size:1.3em;
            color:#aaa;
            font-family: 'Source Sans Pro', sans-serif;
            letter-spacing:1px;
        }
        .go-home{
            color:#fff;
            background:#5892FF;
            border:none;
            padding:10px 50px;
            margin:30px 0;
            border-radius:30px;
            text-transform:capitalize;
            box-shadow: 0 10px 16px 1px rgba(174, 199, 251, 1);
            text-decoration: none;
        }

        .footer-like{
            margin-top: auto; 
            background:#D7E6FE;
            padding:6px;
            text-align:center;
        }
        .footer-like p{
            margin:0;
            padding:4px;
            color:#5892FF;
            font-family: 'Source Sans Pro', sans-serif;
            letter-spacing:1px;
        }
        .footer-like p a{
            text-decoration:none;
            color:#5892FF;
            font-weight:600;
        }

        @media (min-width:360px){
            h1{
                font-size:4.5em;
            }
            .go-home{
                margin-bottom:20px;
            }
        }

        @media (min-width:600px){
            .content{
                max-width:1000px;
                margin:0 auto;
            }
            .wrapper-1{
                height: initial;
                max-width:620px;
                margin:0 auto;
                margin-top:50px;
                box-shadow: 4px 8px 40px 8px rgba(88, 146, 255, 0.2);
            }

        }
    </style>
</head>
<body>
    <div class=content>
        <div class="wrapper-1">
            <div class="wrapper-2">
                @if(Session::has('success'))
                <h1>Thank you !</h1>
                
                @elseif(Session::has('error'))
                <h1>Oops!</h1>
                @endif
                
                @if(Session::has('success'))
                <p>{!! session('success') !!}</p>
                @endif
                
                
                @if(Session::has('error'))
                <p>{!! session('error') !!}</p>
                @endif

                <button href="https://faretrim.com.au" class="go-home">
                    go back
                </button>
            </div>
            <div class="footer-like">
                <p>
                    <a href="https://faretrim.com.au">www.faretrim.com.au</a>
                </p>
            </div>
        </div>
    </div>



    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Source+Sans+Pro" rel="stylesheet">
</body>

</body>
</html>

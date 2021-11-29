<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>faretrim | stripe card add</title>
    </head>
    <body>
        <form action="{{url('stripe')}}" method="POST">
            @csrf
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="{{env('STRIPE_KEY')}}"
                data-name="faretrim"
                data-description="www.faretrim.com.au"
                data-image="{{asset('frontEnd/assets/img/faretrim-stripe.png')}}"
                data-locale="auto"
                data-panel-label="Submit"
                data-currency="usd">
            </script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script type="text/javascript">
                $('.stripe-button-el').click();
                $('.stripe-button-el').hide();
            </script>
        </form>
    </body>
</html>

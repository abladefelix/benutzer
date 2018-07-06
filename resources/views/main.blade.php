 <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BenutzerVue Demo</title>

        <!-- css -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

        <!-- fonts awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        
    </head>
    <body>



    	<div id = "app">
    		
    		<!-- Header Component -->
    		<MyHeader></MyHeader>

    		<!--Hello!<i class="fas fa-trash-alt"></i>-->

        <!-- route outlet -->
        <!-- component matched by the route will render here -->
        <router-view></router-view>

    	</div>

    	<!-- app.js -->
        <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>    
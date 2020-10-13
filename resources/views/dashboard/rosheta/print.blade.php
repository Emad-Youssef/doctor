<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body, h1, h2, h3, h4, h5, h6 {
            font-family: 'Cairo', sans-serif !important;
            margin: 0;
            padding: 0
        }

        header,footer{
          position: relative;
          background: #ccc;
        }

        header .right,footer .right{
          padding: 15px 30px;
          text-align: right;
          background: #93a4ea;

        }

        header .left, footer .left{
          padding: 15px 30px;
          text-align: left;
          background: #93a4ea;
        }

        header p{
          white-space: pre-line;
        }
        .icon{
          position: absolute;
          margin-left: 46%;
          z-index: 99;
          line-height: 11;
        }

        .icon img{
          width: 140px;
          height: 130px;
        }

        section{
            position: relative;
            min-height: 400px;
        }

        .layout{
          position: absolute;
          width: 100%;
          height: 100%;
          background-image: url(http://localhost:8000/dashboard/img/breadcumb1.jpg) !important;
          opacity: 0.2;
          background-repeat: no-repeat  !important;
          background-size: auto  !important;
          max-height: 100%  !important;
          background-position: center !important;
         
        }
        .drugs{
          position: relative;
          padding: 20px;
          margin-left: 20px;
          font-size: 18px;
          font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container"> 
        <header>
          <div class="row">
            <div class="col-md-6 left">
              <h5>{{ $setting->translate('en')->sitename??'' }} </h5>
              <p>
                        ophthalmologist
                    M.BBCH, M.Sc Ophtalmology 
                      A member of the Egyptian
                        Ophthalmology society 
              </p>
            </div>

            <div class="icon">
              <img src="{{ asset('dashboard/img/drug.jpg') }}" class="rounded-circle"/>
            </div>

            <div class="col-md-6 right">
            <h5>{{ $setting->translate('ar')->sitename??'' }}</h5>
            <p>
                    اخصائى طب وجراحة العيون
                  بستشفى الميرة للتامين الصحى 
                ماجستير طب جراحة العيون  
              </p>
            </div>
            </div>
            
        </header>

        <section>
            <div class="layout"></div>
            <div class="drugs"> 
              @foreach($roshetaDrugs as $drug)

              <p >{{ $drug->drug_name }}</p>
              @endforeach

            </div>
        </section>
        <footer>  
        <div class="row">
            <div class="col-md-6 left">
              <p> address : {{ $setting->translate('en')->address??'' }}</p>
              <p> phone : {{ $setting->phone_f??'' }}</p>
              <p> phone : {{ $setting->phone_l??'' }}</p>
            </div>
            <div class="col-md-6 right ">
              <p> العنوان : {{ $setting->translate('ar')->address??'' }}</p>
              <p> تليفون : {{ $setting->phone_f??'' }}</p>
              <p> تليفون : {{ $setting->phone_l??'' }}</p>
            </div>
            </div>
        </footer>
      </div>
       




  <!-- jQuery (Necessary for All JavaScript Plugins) -->
  <script src="{{ asset('front/ltr') }}/js/jquery/jquery-2.2.4.min.js"></script>
  <!-- Popper js -->
  <script src="{{ asset('front/ltr') }}/js/popper.min.js"></script>
  <script src="{{ asset('front/ltr') }}/js/bootstrap.min.js"></script>
  <!-- Bootstrap js -->
  <script>window.print()</script>
</body>
</html>



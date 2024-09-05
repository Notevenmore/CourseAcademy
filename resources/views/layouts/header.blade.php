<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title }}</title>
  
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  @auth
    
    @if(Request::routeIs(['admin.index', 'mentor.index', 'mentor.show', 'course.edit','course.create','purchase-data', 'course-data', 'userdata.index', ]))
  
      <link rel="stylesheet" href="{{ asset('css/sb-admin-2.min.css') }}" type="text/css"> 
      <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
      <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
      <link href="{{  asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

      @if(Request::routeIs(['purchase-data', 'userdata.index']))

        <style>
          #wrapper {
              transition: all 0.3s ease-in-out;
          }
        </style>

      @endif  
    
    @elseif(Request::routeIs('langganan.store'))

      <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

    @endif

    @if(Request::routeIs(['add-material', 'learn', 'lainnya.create']))

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    @endif
  
  @endauth

</head>
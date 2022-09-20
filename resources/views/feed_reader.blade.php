<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RSS Feed Reader</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <!-- Styles -->
     <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container-fluid">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h1 > RSS FEED READER</h1>
                </div>

                <div class="col-sm-6" align="center">
                    <br/>

                   <a href="{{url('/feed_reader/store')}}" > <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Update RSS</button></a>
                </div>
            </div>
        </div>
        <div class="table">
            <table id="user_table" class="table table-hover table-striped table-fixed">
                <thead>
                <tr>
                    
                    <th style="width: 20%">Title</th>
                    <th style="width: 25%">Description</th>
                    <th style="width: 15%">Link</th>
                    <th style="width: 15%">Post Date</th>
                    
                </tr>
                </thead>
         @foreach($RssFeeds as $feed)
         <tr>    
            <td>{{$feed->title}}</td>
            <td>{{$feed->description}}</td>
            <td ><a  id='guid' class="popup" data-loadurl='{{$feed->guid}}' >{{$feed->guid}}</a></td> 
            <td>{{$feed->date}}</td> 
         </tr>
         @endforeach
            </table>
        </div>
        <div>
        </div>
    </div>
</div>
</body>
</html>

<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" align='Center'>
                <button type="button" name="ok_button" id="ok_button" class="btn ">View Feed</button>
              </div>
        </div>
    </div>
</div>
<script>
   
   // Redirect to Feed
    $(document).ready(function(){    
        $(document).on('click', '.popup', function(){
            var loadURL= $(this).data('loadurl');
            var keys = {};
            if (event.altKey) {  $('#confirmModal').modal('show'); } 
            $('#ok_button').click(function(){
                 window.location.href =loadURL;
            });
        });  
    });
</script>
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
    <style type="text/css">

    </style>
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
                    <th style="width: 15%">Description</th>
                    <th style="width: 15%">Link</th>
                    <th style="width: 15%">Post Date</th>
                    <th style="width: 10%">Action</th>
                </tr>
                </thead>
         @foreach($RssFeeds as $feed)
         <tr>
       
        <td>{{$feed->title}}</td>
        <td>{{$feed->description}}</td>
        <td ><a  id='guid' >{{$feed->guid}}</a></td> 
        <td>{{$feed->date}}</td> 
        <td id="action['{{$feed->guid}}']"><div class="actionbtn" style="display:none;"><a href="{{$feed->guid}}" target="_blank"><button class="btn btn-success btn-sm" >View</button></a></div></td>    
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
<script>
     // Create Dynamic Button   
     function createButton(context){
        var button = document.createElement("input");
        button.type = "button";
        button.value = "Follow Rss";
        //context.appendChild(button);
    }

    $(document).ready(function(){    
        
        
    // Alt Key event 
    document.onkeydown = keydown;
    function keydown(evt) {
        if (!evt) evt = event;
        if (evt.altKey) {
            document.getElementById("guid").addEventListener("click", urlClicked);
            function urlClicked() {
                var y = document.getElementsByClassName('actionbtn');
             y[0].style.display = 'block';
            }
           
        }else{
            var y = document.getElementsByClassName('actionbtn');
             y[0].style.display = 'none';
        }
    } 
  
    });
</script>

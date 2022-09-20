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

                    <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Update RSS</button>
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
             @foreach($RssFeeds  as $feed)
        
        <tr>
        <td>{{$feed->title}}</td>
        <td>{{$feed->description}}</td>
        <td><a href="#">{{$feed->guid}}</a></td> 
        <td>{{$feed->date}}</td> 
        <td id='action'><a href="{{$feed->guid}}" target="_blank"><button>Article</button></a></td>    
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

<div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Record</h4>
            </div>
            <div class="modal-body">
                <span id="form_result"></span>
                <form method="post" id="feed_reader_form" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-4" >URL : </label>
                        <div class="col-md-8">
                            <input type="text" name="url" id="url" class="form-control" value="http://feeds.bbci.co.uk/news/uk/rss.xml" />
                        </div>
                    </div>
                  
                   
                    <br />
                    <div class="form-group" align="center">
                        <input type="hidden" name="action" id="action" value="Add" />
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Update" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>




@section('content')
 
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
 
<script type="text/javascript">
 
$(document).ready(function() {
    $('#example').DataTable( {
        "ajax": "/jalil/public/data.json"
    } );
} );
 
</script>
 
<style>
        .content {
            text-align: center;h
        }
</style>
 
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
 
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
 
                  Bienvenu  jalil Interface CSV
            </div>
            </div>
        </div>
 
    </div>
</div>
 
<div class="content">
 
      <table id="example" class="display" style="width:100%" border ='1'>
              <thead>
            <tr>
              <th>Host</th>
              <th>file System</th>
              <th>CSV</th>
              <th>Zabbix</th>
              <th>Warning csv</th>
              <th>Warning zabbix</th>
              <th>Critique csv</th>
              <th>Critique zabbix</th>
              <th>Procédure csv</th>
              <th>Procédure zabbix</th>
              <th>Conforme</th>
            </tr>
              </thead>
          </table>
 
</div>
 
 
@endsection
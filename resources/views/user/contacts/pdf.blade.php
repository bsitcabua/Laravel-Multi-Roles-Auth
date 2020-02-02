<style>
table {
  border-collapse: collapse;
  width: 100%;
}
table tr:nth-child(even){background-color: #f2f2f2;}
table, th, td {
    border-bottom: 1px solid #ddd;
    padding-top: 10px;
    padding-bottom: 10px;
    text-align: left;
}
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card h-100 py-2">
                <div class="card-body table-responsive" style="min-height: 350px;">
                    <caption class="float-left">Contacts</caption>
                    <table autosize="1" style="overflow: wrap; ">
                        <thead>
                            <tr style="background-color: #f2f2f2;">
                                <th style="overflow: visible|hidden|wrap">#</th>
                                <th style="overflow: visible|hidden|wrap">First Name</th>
                                <th style="overflow: visible|hidden|wrap">Last Name</th>
                                <th style="overflow: visible|hidden|wrap">Contact No.</th>
                                <th style="overflow: visible|hidden|wrap">Email</th>
                                <th style="overflow: visible|hidden|wrap">Address</th>
                                <th style="overflow: visible|hidden|wrap">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($contacts) > 0)
                                @foreach ($contacts as $key => $contact)
                                    <tr>
                                        <td style="overflow: visible|hidden|wrap">{{ ++$key }}</td>
                                        <td style="overflow: visible|hidden|wrap">{{ $contact->first_name }}</td>
                                        <td style="overflow: visible|hidden|wrap">{{ $contact->last_name }}</td>
                                        <td style="overflow: visible|hidden|wrap">{{ $contact->contact_no }}</td>
                                        <td style="overflow: visible|hidden|wrap">{{ $contact->email }}</td>
                                        <td style="overflow: visible|hidden|wrap">{{ $contact->address }}</td>
                                        <td style="overflow: visible|hidden|wrap">{{ date('d/m/Y', strtotime($contact->created_at)) }}</td>
                                    </tr>
                                @endforeach 
                            @endif                  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->    
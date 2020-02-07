<style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    table tr:nth-child(even){background-color: #f2f2f2;}
    table, th, td {
        border-bottom: 1px solid #ddd;
        padding-top: 5px;
        padding-bottom: 5px;
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
                        <caption class="float-left">@isset($title) {{ $title }} @endisset</caption>
                        <table autosize="1" style="overflow: wrap; ">
                            <thead style="font-size: 15px">
                                <tr style="background-color: #f2f2f2;">
                                    @if(count($header))
                                        {{-- Print order no. # --}}
                                        @isset($colNo)
                                            <th style="overflow: visible|hidden|wrap">{{ $colNo }}</th>
                                        @endisset
                                        {{-- Print dynamic header --}}
                                        @foreach($header as $head)
                                            <th style="overflow: visible|hidden|wrap">{{ $head }}</th>
                                        @endforeach
                                    @endif
                                </tr>
                            </thead>
                            <tbody style="font-size: 14px">
                                @if(count($data) > 0)
                                    @foreach ($data as $key => $each)
                                        <tr>
                                             {{-- Print order no. # --}}
                                            @isset($colNo)
                                                <td style="overflow: visible|hidden|wrap">{{ ++$key }}</td>
                                            @endisset

                                            {{-- Dynamic col name --}}
                                            @foreach($colName as $col)
                                                <td style="overflow: visible|hidden|wrap">{{ $each->$col }}</td>
                                            @endforeach
    
                                            {{-- Date print if set to true --}}
                                            @isset($colDate)
                                                @foreach($colDate as $col)
                                                    <td style="overflow: visible|hidden|wrap">{{ date('d/m/Y', strtotime($each->$col)) }}</td>
                                                @endforeach
                                            @endisset
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
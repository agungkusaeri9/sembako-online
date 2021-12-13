@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $count['transaction'] }}</h3>

            <p>Transaksi</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('admin.transactions.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $count['product'] }}</h3>

            <p>Produk</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{ route('admin.products.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ $count['user'] }}</h3>

            <p>User</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{ route('admin.users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              Transaksi Terbaru
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <tr>
                    <th width=40>#</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Total</th>
                    <th>Status</th>
                  </tr>
                  @foreach ($transactions as $transaction)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $transaction->code }}</td>
                      <td>{{ $transaction->name }}</td>
                      <td>{{ $transaction->email }}</td>
                      <td>Rp. {{ number_format($transaction->transaction_total) }}</td>
                      <td>
                        @if ($transaction->status === 'PENDING')
                        <div class="badge badge-warning">{{ $transaction->status }}</div>
                        @elseif($transaction->status === 'FAILED')
                        <div class="badge badge-danger">{{ $transaction->status }}</div>
                        @else 
                        <div class="badge badge-success">{{ $transaction->status }}</div>
                        @endif
                    </td>
                    </tr>
                  @endforeach
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- /.row (main row) -->
</div>
@endsection
@push('scripts')
<!-- ChartJS -->
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>

@endpush
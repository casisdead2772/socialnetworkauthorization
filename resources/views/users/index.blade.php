@extends('layouts.dashboard')
@section('count')
    <div class="container col-md-5 p-lg-2 mx-auto my-2">
        <h2>There are {{ $countUsers }} users on the site</h2>
    </div>
@endsection

@section('chart')
    <div class="container" style="max-width:800px; vertical-align: middle" >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
        <canvas id="barChart"></canvas>
    <script>
        var data = JSON.parse("{{ $keysUsersSocial }}".replace(/&quot;/g,'"'));
        console.log(data);
        var ctxB = document.getElementById("barChart").getContext('2d');
            var myBarChart = new Chart(ctxB, {
            type: 'bar',
            data: {
                labels: data,
                datasets: [{
                    label: 'Count of Social Networks',
                    data: {{ $valuesUsersSocial }},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    </div>

@endsection

@section('userTable')
    <div class="container" style="vertical-align: middle">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Social</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
        @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{ $user->type }}</td>
                <td>{{ $user->status }}</td>
                <td>
                    <div class="row" style="vertical-align: middle">
                        @if($user->status === 'Blocked')
                        <div class="col-4">
                    <form action="{{ route('unblockUser', $user->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                    <button type="submit" class="btn btn-primary btn-block" {{ method_field('put') }}<i class="fas fa-user-plus"></i></button>
                    </form>
                        </div>
                        @else
                        <div class="col-4">
                    <form action="{{ route('blockUser', $user->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                    <button type="submit" class="btn btn-success btn-block" {{ method_field('put') }}<i class="fas fa-user-slash"></i></button>
                    </form>
                        </div>
                        @endif
                        <div class="col-4">
                    <form action="{{ route('deleteUser', $user->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                    <button type="submit" class="btn btn-danger btn-block" {{ method_field('put') }}<i class="fas fa-user-times"></i></button>
                    </form>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </div>
    {{ $users->links() }}
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <p>Liste des comptes</p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Nouveau
                    </button>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="row">
                        <div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{route('accounts.store')}}">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="ref" class="form-label">Réf.</label>
                                                    <input type="text" class="form-control" id="ref" name="ref" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Nom</label>
                                                    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
                                                    <div id="emailHelp" class="form-text">Donnez un nom a votre compte.</div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div>
                        <ul>
                            {{-- {{dd(Auth::user()->accounts)}} --}}
                                {{-- <li> </a></li> --}}
                        </ul>
                        <ol class="list-group list-group-numbered">
                            @foreach (Auth::user()->accounts as $account)
                            <a href="{{route('accounts.show',$account->id)}}" style="text-decoration: none;">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                    <div class="fw-bold">{{$account->name}}</div>
                                    {{$account->ref}}
                                    </div>
                                    <span class="badge bg-primary rounded-pill">{{$account->motions->sum('amount')}} F CFA</span>
                                </li>
                            </a>
                            @endforeach

                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

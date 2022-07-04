@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    Detail de compte
                </div>
                <div class="card-body">
                    <p>Ref : {{$account->ref}}</p>
                    <p>Name : {{$account->name}}</p>
                    <p>Solde : {{$account->motions->sum('amount')}} F CFA</p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <p>Liste des mouvements</p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Nouveau
                    </button>
                </div>

                <div class="card-body">
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
                                            <form method="post" action="{{route('motions.store')}}">
                                                @csrf
                                                <input type="hidden" name="account_id" value="{{$account->id}}"/>
                                                <div class="mb-3">
                                                    <label for="motion_type" class="form-label">Réf.</label>
                                                    <select class="form-control" name="motion_type">
                                                        <option value="in"> Entrant</option>
                                                        <option value="out">Sortant</option>
                                                    </select>

                                                </div>
                                                <div class="mb-3">
                                                    <label for="amount" class="form-label">Montant</label>
                                                    <input type="text" class="form-control" id="amount" name="amount" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="motive" class="form-label">Motif</label>
                                                    <textarea type="text" class="form-control" id="motive" name="motive" placeholder="Un motif"></textarea>
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

                            {{-- {{dd(Auth::user()->accounts)}} --}}
                            <table class="table table-striped table-success">
                                <thead>
                                    <tr>
                                        <th>Ref</th>
                                        <th>Type</th>
                                        <th>Montant</th>
                                        <th>Motif</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($account->motions as $motion)
                                        <tr>
                                            <td>{{$motion->ref}}</td>
                                            <td>{{$motion->motion_type}}</td>
                                            <td>{{$motion->amount}}</td>
                                            <td>{{$motion->motive}}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

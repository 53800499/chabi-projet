@extends('layouts.app1')
@section('titre')
    equipe sliders
@endsection
@section('contenu')
    <div class="container-fluid px-4 my-4">
        <div class="card mb-4">
            <div class="card-equipe">
                <h3><i class="fas fa-table me-1"></i>
                 information de vos équipié</h3>
                @if (Session::has('status'))
                  <div class="alert alert-success">
                      {{Session::get('status')}}
                  </div>
                  @endif
                  @if (count($errors)>0)
                  <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{$error}}</li>
                      @endforeach
                </ul>
                  </div>
                  @endif
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Nom et prenom de l'équipié</th>
                            <th>Domaine</th>
                            <th>Titre</th>
                            <th>Detail personnel</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($equipe as $equipe)
                        <tr>
                            <td><img src="{{ asset('storage/equipeImages/'.$equipe->equipeImages) }}" alt=""></td>
                            <td>{{ $equipe ->nomPrenom }}</td>
                            <td>{{ $equipe ->domaine }}</td>
                            <td>{{ $equipe ->titre }}</td>
                            <td>{{ $equipe ->detailPersonnel }}</td>
                            <td>
                                <label class="">Activer</label>
                            </td>
                            <td>
                                <button class="btn btn-outline-primary" onclick="window.location='{{url('edits-equipe/'.$equipe ->id)}}'">Edit</button>
                                <a href="{{url('delete-equipe/'.$equipe->id)}}"  id="delete" class="btn btn-outline-danger">Delete</a>
                                @if ($equipe->status==0)
                                <button class="btn btn-outline-warning pl-" onclick="window.location='{{url('desactiver-equipe/'.$equipe->id)}}'">Désactiver</button>      
                                @else
                                <button class="btn btn-outline-success" onclick="window.location='{{url('activer-equipe/'.$equipe->id)}}'">Activer</button> 
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
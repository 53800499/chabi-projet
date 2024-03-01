@extends('layouts.app1')
@section('titre')
    Innovation
@endsection
@section('contenu')
    <div class="container-fluid px-4 my-4">
        <div class="card mb-4">
            <div class="card-innovation">
                <h3><i class="fas fa-table me-1 ml-2"></i>
                 information à propos des innovations</h3>
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
                            <th>Images</th>
                            <th>Nom du projet</th>
                            <th>Nom de l'auteur</th>
                            <th>Prix de revenir</th>
                            <th>Brève description de l'innovation</th>
                            <th>Description complète de l'innovation</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($innovation as $innovation)
                        <tr>
                            <td><img src="{{ asset('storage/innovationImages/'.$innovation->innovationImages) }}" alt=""></td>
                            <td>{{ $innovation ->nomProjet }}</td>
                            <td>{{ $innovation ->nomAuteur }}</td>
                            <td>{{ $innovation ->prixDeRevenir }}</td>
                            <td>{{ $innovation ->breveDescriptionInnov }}</td>
                            <td>{{ $innovation ->completeDescriptionInnov }}</td>
                            <td>
                                <label class="">Activer</label>
                            </td>
                            <td>
                                <button class="btn btn-outline-primary" onclick="window.location='{{url('edits-innovation/'.$innovation ->id)}}'">Edit</button>
                                <a href="{{url('delete-innovation/'.$innovation->id)}}"  id="delete" class="btn btn-outline-danger">Delete</a>
                                @if ($innovation->status==0)
                                <button class="btn btn-outline-warning pl-" onclick="window.location='{{url('desactiver-innovation/'.$innovation->id)}}'">Désactiver</button>      
                                @else
                                <button class="btn btn-outline-success" onclick="window.location='{{url('activer-innovation/'.$innovation->id)}}'">Activer</button> 
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
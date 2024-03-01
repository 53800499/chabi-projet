@extends('layouts.app1')
@section('titre')
    categorie
@endsection
@section('contenu')
    <div class="container-fluid px-4 my-4">
        <div class="card mb-4">
            <div class="card-categorie">
                <h3><i class="fas fa-table me-1 ml-2"></i>
                 information à propos des catégories</h3>
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
                            <th>Nom de la catégories</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($categorie as $categorie)
                        <tr>
                            <td><img src="{{ asset('storage/categorieImages/'.$categorie->categorieImages) }}" alt=""></td>
                            <td>{{ $categorie ->nomCategorie }}</td>
                            <td>
                                <label class="">Activer</label>
                            </td>
                            <td>
                                <button class="btn btn-outline-primary" onclick="window.location='{{url('edits-categorie/'.$categorie ->id)}}'">Edit</button>
                                <a href="{{url('delete-categorie/'.$categorie->id)}}"  id="delete" class="btn btn-outline-danger">Delete</a>
                                @if ($categorie->status==0)
                                <button class="btn btn-outline-warning pl-" onclick="window.location='{{url('desactiver-categorie/'.$categorie->id)}}'">Désactiver</button>      
                                @else
                                <button class="btn btn-outline-success" onclick="window.location='{{url('activer-categorie/'.$categorie->id)}}'">Activer</button> 
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
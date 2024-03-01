@extends('layouts.app1')
@section('titre')
    Sliders
@endsection
@section('contenu')
    <div class="container-fluid px-4 my-4">
        <div class="card mb-4">
            <div class="card-header">
                <h3><i class="fas fa-table me-1"></i>
                Les information de vos sliders</h3>
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
                            <th>Titres</th>
                            <th>Description1</th>
                            <th>Description</th>
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
                        @foreach ($sliders as $sliders)
                        <tr>
                            <td><img src="{{ asset('storage/slidersImages/'.$sliders->slidersImages) }}" alt=""></td>
                            <td>{{ $sliders ->titres }}</td>
                            <td>{{ $sliders ->description1 }}</td>
                            <td>{{ $sliders ->description2 }}</td>
                            <td>
                                <label class="">Activer</label>
                            </td>
                            <td>
                                <button class="btn btn-outline-primary" onclick="window.location='{{url('edits-sliders/'.$sliders ->id)}}'">Edit</button>
                                <a href="{{url('delete-sliders/'.$sliders->id)}}"  id="delete" class="btn btn-outline-danger">Delete</a>
                                @if ($sliders->status==0)
                                <button class="btn btn-outline-warning pl-" onclick="window.location='{{url('desactiver-sliders/'.$sliders->id)}}'">Désactiver</button>      
                                @else
                                <button class="btn btn-outline-success" onclick="window.location='{{url('activer-sliders/'.$sliders->id)}}'">Activer</button> 
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
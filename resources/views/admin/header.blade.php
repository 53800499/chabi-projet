@extends('layouts.app1')
@section('titre')
    Header sliders
@endsection
@section('contenu')
    <div class="container-fluid px-4 my-4">
        <div class="card mb-4">
            <div class="card-header">
                <h3><i class="fas fa-table me-1"></i>
                 information de vos header</h3>
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
                        @foreach ($header as $header)
                        <tr>
                            <td><img src="{{ asset('storage/headerImages/'.$header->headerImages) }}" alt=""></td>
                            <td>{{ $header ->titres }}</td>
                            <td>{{ $header ->description1 }}</td>
                            <td>{{ $header ->description2 }}</td>
                            <td>
                                <label class="">Activer</label>
                            </td>
                            <td>
                                <button class="btn btn-outline-primary" onclick="window.location='{{url('edits-header/'.$header ->id)}}'">Edit</button>
                                <a href="{{url('delete-header/'.$header->id)}}"  id="delete" class="btn btn-outline-danger">Delete</a>
                                @if ($header->status==0)
                                <button class="btn btn-outline-warning pl-" onclick="window.location='{{url('desactiver-header/'.$header->id)}}'">Désactiver</button>      
                                @else
                                <button class="btn btn-outline-success" onclick="window.location='{{url('activer-header/'.$header->id)}}'">Activer</button> 
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
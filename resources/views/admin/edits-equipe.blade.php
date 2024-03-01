@extends('layouts.app1')
@section('titre')
    Modifier les informatios d'un membre dans l'équipe
@endsection
@section('contenu')
    <div class="container-fluid px-4 my-4">
        <div class="form-label px-4 my-4">
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
            <h1 class="my-4">Modifier les informatios d'un membre d'équipe à votre site</h1>
            <form class="row g-3" method="POST" action="{{ url('modifier-equipe/'.$equipe->id ) }}"  enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="col-md-12">
                <label for="validationDefault01" class="form-label">Nom et prenom de l'équipié</label>
                <input type="text" class="form-control" name="nomPrenom" id="validationDefault01" value="{{ $equipe->nomPrenom }}" required>
            </div>
            <div class="col-md-12">
                <label for="validationDefault02" class="form-label">Domaine</label>
                <input type="text" class="form-control" name="domaine" id="validationDefault02" value="{{ $equipe->domaine }}" required>
            </div>
            <div class="col-md-12">
                <label for="validationDefault02" class="form-label">Titre</label>
                <input type="text" class="form-control" name="titre" id="validationDefault02" value="{{ $equipe->titre }}" required>
            </div>
            <div class="col-md-12">
                <label for="validationDefault03" class="form-label">Detail personnel</label>
                <input type="text" class="form-control" name="detailPersonnel" id="validationDefault03" value="{{ $equipe->detailPersonnel }}" required>
            </div>
            <div class="col-md-12">
                <label for="validationDefault03" class="form-label">Images</label>
                <input type="file" class="form-control" name="equipeImages" id="validationDefault03" value="{{ $equipe->equipeImages }}" required>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Ajouter</button>
            </div>
        </form>
        </div>
    </div>
@endsection
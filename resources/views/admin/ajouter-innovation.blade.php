@extends('layouts.app1')
@section('titre')
    Ajouter innovation
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
            <h1 class="my-4">Ajouter d'innovation à votre site</h1>
            <form class="row g-3" method="POST" action="{{ route('save') }}"  enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="col-md-12">
                <label for="validationDefault01" class="form-label">Nom du projet</label>
                <input type="text" class="form-control" name="nomProjet" id="validationDefault01" required>
            </div>
            <div class="col-md-12">
                <label for="validationDefault01" class="form-label">Nom de l'auteur</label>
                <input type="text" class="form-control" name="nomAuteur" id="validationDefault01" required>
            </div>
            <div class="col-md-12">
                <label for="validationDefault02" class="form-label">Prix de revenir</label>
                <input type="text" class="form-control" name="prixDeRevenir" id="validationDefault02" required>
            </div>
            <div class="col-md-12">
                <label for="validationDefault02" class="form-label">Brève description de l'innovation</label>
                <input type="text" class="form-control" name="breveDescriptionInnov" id="validationDefault02" required>
            </div>
            <div class="col-md-12">
                <label for="validationDefault02" class="form-label">Description complète de l'innovation</label>
                <input type="text" class="form-control" name="completeDescriptionInnov" id="validationDefault02" required>
            </div>
            <div class="col-md-12">
                <label for="validationDefault03" class="form-label">Images</label>
                <input type="file" class="form-control" name="innovationImages" id="validationDefault03" required>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Ajouter</button>
            </div>
        </form>
        </div>
    </div>
@endsection
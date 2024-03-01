@extends('layouts.app1')
@section('titre')
    Ajouter header
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
            <h1 class="my-4">Ajouter header à votre site</h1>
            <form class="row g-3" method="POST" action="{{ route('save') }}"  enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="col-md-12">
                <label for="validationDefault01" class="form-label">Titre</label>
                <input type="text" class="form-control" name="titres" id="validationDefault01" required>
            </div>
            <div class="col-md-12">
                <label for="validationDefault02" class="form-label">Description 1</label>
                <input type="text" class="form-control" name="description1" id="validationDefault02" required>
            </div>
            <div class="col-md-12">
                <label for="validationDefault02" class="form-label">Description 2</label>
                <input type="text" class="form-control" name="description2" id="validationDefault02" required>
            </div>
            <div class="col-md-12">
                <label for="validationDefault03" class="form-label">Images</label>
                <input type="file" class="form-control" name="slidersImages" id="validationDefault03" required>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Ajouter</button>
            </div>
        </form>
        </div>
    </div>
@endsection
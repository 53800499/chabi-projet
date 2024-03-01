@extends('layouts.app1')
@section('titre')
    Ajouter un produit dans l'équipe
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
            <h1 class="my-4">Ajouter un produit à votre site</h1>
            <form class="row g-3" method="POST" action="{{ route('save') }}"  enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="col-md-12">
                <label for="validationDefault01" class="form-label">Nom du produit</label>
                <input type="text" class="form-control" name="nomProduit" id="validationDefault01" >
            </div>
            <div class="form-group">
                <label for="cname">Categorie du produit</label>
                <select name="product_category" class="form-control">
                     <option value="" selected null>Select categorie</option>
                    @foreach ($categorie  as $key => $value)
                        <option value="{{ $key }}">{{ $value}}</option>
                    @endforeach
                </select>
              </div> 
            <div class="col-md-12">
                <label for="validationDefault03" class="form-label">Badge produit</label>
                <input type="text" class="form-control" name="badgetProduit" id="validationDefault03" >
            </div>
            <div class="col-md-12">
                <label for="validationDefault03" class="form-label">Caractéristique général</label>
                <input type="text" class="form-control" name="caracteristiqueGeneral" id="validationDefault03" >
            </div>
            <div class="col-md-12">
                <label for="validationDefault03" class="form-label">Caractéristique spécifique</label>
                <input type="text" class="form-control" name="caracteristiqueSpecifique" id="validationDefault03" >
            </div>
            <div class="col-md-12">
                <label for="validationDefault03" class="form-label">Prix du produit</label>
                <input type="text" class="form-control" name="prix" id="validationDefault03" >
            </div>
            <div class="col-md-12">
                <label for="validationDefault03" class="form-label">Images du backgroung</label>
                <input type="file" class="form-control" name="equipeImages" id="validationDefault03" >
            </div>
            <div class="col-md-12">
                <label for="validationDefault03" class="form-label">Images</label>
                <input type="file" class="form-control" name="produitImages" id="validationDefault03" >
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Ajouter</button>
            </div>
        </form>
        </div>
    </div>
@endsection
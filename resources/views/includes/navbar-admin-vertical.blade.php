<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Coree</div>
            <a class="nav-link" href="{{ URL::to('/dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>


            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Création
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ URL::to('/ajouter-sliders') }}">Ajouter sliders</a>
                    <a class="nav-link" href="{{ URL::to('/ajouter-header') }}">Ajouter header</a>
                    <a class="nav-link" href="{{ URL::to('/ajouter-innovation') }}">Ajouter innovation</a>
                    <a class="nav-link" href="{{ URL::to('/ajouter-equipe') }}">Ajouter equipe</a>
                    <a class="nav-link" href="{{ URL::to('/ajouter-actualite') }}">Ajouter actualite</a>
                </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Affichage
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <a class="nav-link" href="{{ URL::to('/sliders') }}">Sliders</a>
                    <a class="nav-link" href="{{ URL::to('/header') }}">Header</a>
                    <a class="nav-link" href="{{ URL::to('/innovation') }}">Innovation</a>
                    <a class="nav-link" href="{{ URL::to('/equipe') }}">Equipe</a>
                    <a class="nav-link" href="{{ URL::to('/actualite') }}">Actualité</a>
                    
                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="login.html">Login</a>
                            <a class="nav-link" href="register.html">Register</a>
                            <a class="nav-link" href="password.html">Forgot Password</a>
                        </nav>
                    </div>
                </nav>
            </div>
            <div class="sb-sidenav-menu-heading">E-commerce</div>
            
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayout" aria-expanded="false" aria-controls="collapseLayout">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Création
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayout" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ URL::to('/ajouter-produit') }}">Ajouter produit</a>
                    <a class="nav-link" href="{{ URL::to('/ajouter-categorie') }}">Ajouter categorie</a>
                </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePage" aria-expanded="false" aria-controls="collapsePage">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Affichage
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePage" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <a class="nav-link" href="{{ URL::to('/produit') }}">Produit</a>
                    <a class="nav-link" href="{{ URL::to('/categorie') }}">Catégorie</a>
                </nav>
            </div>
            


        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
    </div>
</nav>
<div class="vertical-menu">

    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-account-circle-line"></i><span>Manage Fournisseurs</span></a>
                <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('supplier.view') }}">Fournisseur</a></li>
                </ul>
                </li>

                <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-account-circle-line"></i><span>Manage Clients</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('customer.view') }}">Client</a></li>
                </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i> <span>Manage Unités</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('unit.view') }}">Unité</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i><span>Manage Categories</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('category.view') }}">Categorie</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-table-2"></i><span>Manage Produits</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('product.view') }}">Produits</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-table-2"></i><span>Gerer Achat</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('purchase.view') }}">Tous Les Achats</a></li>

                        <li><a href="{{ route('purchase.pending') }}">Approvation achats</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-table-2"></i><span>Manage Factures</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('invoice.all') }}">Tous Les Factures</a></li>

                        <li><a href="{{ route('invoice.pending.list') }}">Approvation Facture</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
